<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guests extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('guests');
        $this->load->model(array('Guest_model', 'Project_model'));
        $this->load->library(array('simple_excel_reader', 'simple_xlsx_writer'));
    }

    public function index($project_id = null)
    {
        if (!$project_id) {
            redirect('admin/projects');
        }

        $project = $this->Project_model->find($project_id);
        if (!$project) {
            show_404();
        }

        $data = $this->admin_data('Guests - ' . $project->title);
        $data['project'] = $project;
        $data['guests'] = $this->Guest_model->by_project($project_id);
        $data['wa_bulk_message'] = $this->build_bulk_wa_message($project, $data['guests']);
        $this->load->view('admin/guests/index', $data);
    }

    public function store($project_id)
    {
        $this->require_access('guests', 'create');
        $project = $this->Project_model->find($project_id);
        if (!$project) {
            show_404();
        }

        $name = trim($this->input->post('guest_name', TRUE));
        $phone = trim($this->input->post('phone', TRUE));
        $category = trim($this->input->post('category', TRUE));
        if ($name !== '') {
            $slug = $this->Guest_model->make_unique_slug($project_id, $name);
            $this->Guest_model->insert(array(
                'project_id' => $project_id,
                'guest_name' => $name,
                'phone' => $phone,
                'category' => $category,
                'slug' => $slug,
                'created_at' => date('Y-m-d H:i:s')
            ));
        }
        redirect('admin/guests/index/' . $project_id);
    }

    public function export_csv($project_id)
    {
        $this->require_access('guests', 'export');
        $project = $this->Project_model->find($project_id);
        if (!$project) show_404();
        $rows = $this->Guest_model->by_project($project_id);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="guest-list-' . $project_id . '.csv"');
        $out = fopen('php://output', 'w');
        fputcsv($out, array('guest_name','phone','category','status_opened','opened_at','link_personal'));
        foreach ($rows as $row) {
            fputcsv($out, array($row->guest_name, $row->phone, $row->category, $row->is_opened ? 'opened' : 'not_opened', $row->opened_at, guest_project_url($project, $row)));
        }
        fclose($out);
        exit;
    }

    public function delete($id)
    {
        $this->require_access('guests', 'delete');
        $guest = $this->Guest_model->find($id);
        if (!$guest) {
            show_404();
        }
        $project_id = $guest->project_id;
        $this->Guest_model->delete($id);
        redirect('admin/guests/index/' . $project_id);
    }

    public function import_template($project_id)
    {
        $this->require_access('guests', 'export');
        $filename = 'guest-import-template-project-' . (int) $project_id . '.csv';
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo "nama_tamu,phone,kategori
";
        echo "Albert,6281234567890,Keluarga
";
        echo "Bapak Ahmad,,VIP
";
        exit;
    }

    public function import($project_id)
    {
        $this->require_access('guests', 'import');
        $project = $this->Project_model->find($project_id);
        if (!$project) {
            show_404();
        }

        if (empty($_FILES['import_file']['name'])) {
            $this->session->set_flashdata('error', 'Silakan pilih file CSV atau XLSX.');
            redirect('admin/guests/index/' . $project_id);
        }

        $tmpPath = $_FILES['import_file']['tmp_name'];
        $originalName = $_FILES['import_file']['name'];
        $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        if (!in_array($ext, array('csv', 'xlsx'))) {
            $this->session->set_flashdata('error', 'Format file harus CSV atau XLSX.');
            redirect('admin/guests/index/' . $project_id);
        }

        $workFile = FCPATH . 'uploads/import_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName);
        if (!@move_uploaded_file($tmpPath, $workFile)) {
            $workFile = $tmpPath;
        }

        try {
            $rows = $this->simple_excel_reader->rows($workFile);
            $imported = 0;
            foreach ($rows as $index => $row) {
                $name = isset($row[0]) ? trim($row[0]) : '';
                $phone = isset($row[1]) ? trim($row[1]) : '';
                $category = isset($row[2]) ? trim($row[2]) : '';

                if ($index === 0 && in_array(strtolower($name), array('nama_tamu', 'guest_name', 'nama guest'))) {
                    continue;
                }
                if ($name === '') {
                    continue;
                }

                $slug = $this->Guest_model->make_unique_slug($project_id, $name);
                $this->Guest_model->insert(array(
                    'project_id' => $project_id,
                    'guest_name' => $name,
                    'phone' => $phone,
                    'category' => $category,
                    'slug' => $slug,
                    'created_at' => date('Y-m-d H:i:s')
                ));
                $imported++;
            }
            if ($workFile !== $tmpPath && file_exists($workFile)) {
                @unlink($workFile);
            }
            $this->session->set_flashdata('success', 'Import selesai. Total guest masuk: ' . $imported);
        } catch (Exception $e) {
            if ($workFile !== $tmpPath && file_exists($workFile)) {
                @unlink($workFile);
            }
            $this->session->set_flashdata('error', 'Import gagal: ' . $e->getMessage());
        }

        redirect('admin/guests/index/' . $project_id);
    }
}
