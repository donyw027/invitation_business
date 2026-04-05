<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

        $guests = $this->Guest_model->by_project($project_id);

        $data = $this->admin_data('Guests - ' . $project->title);
        $data['project'] = $project;
        $data['guests'] = $guests;
        $data['wa_bulk_message'] = $this->build_bulk_wa_message($project, $guests);

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

        if ($name === '') {
            $this->session->set_flashdata('error', 'Nama tamu wajib diisi.');
            redirect('admin/guests/index/' . $project_id);
        }

        $slug = $this->Guest_model->make_unique_slug($project_id, $name);

        $this->Guest_model->insert(array(
            'project_id'  => $project_id,
            'guest_name'  => $name,
            'phone'       => $phone,
            'category'    => $category,
            'slug'        => $slug,
            'created_at'  => date('Y-m-d H:i:s')
        ));

        $this->session->set_flashdata('success', 'Guest berhasil ditambahkan.');
        redirect('admin/guests/index/' . $project_id);
    }

    public function export_csv($project_id)
    {
        $this->require_access('guests', 'export');

        $project = $this->Project_model->find($project_id);
        if (!$project) {
            show_404();
        }

        $rows = $this->Guest_model->by_project($project_id);

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="guest-list-' . $project_id . '.csv"');

        $out = fopen('php://output', 'w');
        fputcsv($out, array('guest_name', 'phone', 'category', 'status_opened', 'opened_at', 'link_personal'));

        foreach ($rows as $row) {
            fputcsv($out, array(
                $row->guest_name,
                isset($row->phone) ? $row->phone : '',
                isset($row->category) ? $row->category : '',
                !empty($row->is_opened) ? 'opened' : 'not_opened',
                isset($row->opened_at) ? $row->opened_at : '',
                $this->guest_project_url_safe($project, $row)
            ));
        }

        fclose($out);
        exit;
    }

    public function export_xlsx($project_id)
    {
        $this->require_access('guests', 'export');

        $project = $this->Project_model->find($project_id);
        if (!$project) {
            show_404();
        }

        $rows = $this->Guest_model->by_project($project_id);

        $data = array();

        // header row
        $data[] = array(
            'guest_name',
            'phone',
            'category',
            'status_opened',
            'opened_at',
            'link_personal'
        );

        foreach ($rows as $row) {
            $data[] = array(
                $row->guest_name,
                isset($row->phone) ? $row->phone : '',
                isset($row->category) ? $row->category : '',
                !empty($row->is_opened) ? 'opened' : 'not_opened',
                isset($row->opened_at) ? $row->opened_at : '',
                $this->guest_project_url_safe($project, $row)
            );
        }

        $filename = 'guest-list-' . $project_id . '.xlsx';
        $sheetName = 'Guests';

        $this->simple_xlsx_writer->download($filename, $sheetName, $data);
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

        $this->session->set_flashdata('success', 'Guest berhasil dihapus.');
        redirect('admin/guests/index/' . $project_id);
    }

    public function import_template($project_id)
    {
        $this->require_access('guests', 'export');

        $filename = 'guest-import-template-project-' . (int) $project_id . '.csv';

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        echo "nama_tamu,phone,kategori\n";
        echo "Albert,6281234567890,Keluarga\n";
        echo "Bapak Ahmad,,VIP\n";
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

        $uploadDir = FCPATH . 'uploads/';
        if (!is_dir($uploadDir)) {
            @mkdir($uploadDir, 0777, TRUE);
        }

        $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName);
        $workFile = $uploadDir . 'import_' . time() . '_' . $safeName;

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
                    'project_id'  => $project_id,
                    'guest_name'  => $name,
                    'phone'       => $phone,
                    'category'    => $category,
                    'slug'        => $slug,
                    'created_at'  => date('Y-m-d H:i:s')
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

    private function build_bulk_wa_message($project, $guests = array())
    {
        if (empty($guests)) {
            return '';
        }

        $lines = array();

        foreach ($guests as $guest) {
            $name = isset($guest->guest_name) && $guest->guest_name !== '' ? $guest->guest_name : 'Tamu';
            $link = $this->guest_project_url_safe($project, $guest);

            $message = "Halo " . $name . ",\n";
            $message .= "Kami mengundang Anda untuk melihat undangan berikut:\n";
            $message .= $link;

            $lines[] = $message;
        }

        return implode("\n\n====================\n\n", $lines);
    }



    private function guest_project_url_safe($project, $guest)
    {
        if (function_exists('guest_project_url')) {
            return guest_project_url($project, $guest);
        }

        $projectSlug = isset($project->slug) ? $project->slug : '';
        $guestSlug = isset($guest->slug) ? $guest->slug : '';

        return rtrim(base_url(), '/') . '/i/' . $projectSlug . '/' . $guestSlug;
    }
}
