<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('templates');
        $this->load->model(array('Template_model', 'Product_type_model', 'Activity_log_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Templates');
        $data['templates'] = $this->Template_model->all();
        $this->load->view('admin/templates/index', $data);
    }

    public function create()
    {
        $this->require_access('templates', 'create');
        $data = $this->admin_data('Tambah Template');
        $data['product_types'] = $this->Product_type_model->active();
        $this->load->view('admin/templates/form', $data);
    }

    public function store()
    {
        $this->require_access('templates', 'create');
        $thumb = $this->upload_image('thumbnail_file', 'uploads/templates');
        if ($thumb === FALSE) {
            redirect('admin/templates/create');
        }
        $thumb = $thumb ?: trim($this->input->post('thumbnail', TRUE));
        $preview_mobile = $this->upload_image('preview_mobile_file', 'uploads/templates');
        if ($preview_mobile === FALSE) redirect('admin/templates/create');
        $preview_mobile = $preview_mobile ?: trim($this->input->post('preview_mobile', TRUE));
        $preview_desktop = $this->upload_image('preview_desktop_file', 'uploads/templates');
        if ($preview_desktop === FALSE) redirect('admin/templates/create');
        $preview_desktop = $preview_desktop ?: trim($this->input->post('preview_desktop', TRUE));
        $template_id = $this->Template_model->insert(array(
            'name' => trim($this->input->post('name', TRUE)),
            'folder' => trim($this->input->post('folder', TRUE)),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'thumbnail' => $thumb,
            'description' => trim($this->input->post('description', TRUE)),
            'preview_mobile' => $preview_mobile,
            'preview_desktop' => $preview_desktop,
            'preview_mobile' => $preview_mobile,
            'preview_desktop' => $preview_desktop,
            'demo_url' => trim($this->input->post('demo_url', TRUE)),
            'sort_order' => (int) $this->input->post('sort_order'),
            'is_active' => (int) $this->input->post('is_active'),
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->Activity_log_model->insert(array(
            'user_id' => (int) $this->session->userdata('admin_id'),
            'module' => 'templates',
            'action' => 'create',
            'description' => 'Membuat template #' . $template_id,
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Template berhasil ditambahkan.');
        redirect('admin/templates');
    }

    public function edit($id)
    {
        $this->require_access('templates', 'update');
        $data = $this->admin_data('Edit Template');
        $data['row'] = $this->Template_model->find($id);
        if (!$data['row']) show_404();
        $data['product_types'] = $this->Product_type_model->active();
        $this->load->view('admin/templates/form', $data);
    }

    public function update($id)
    {
        $this->require_access('templates', 'update');
        $row = $this->Template_model->find($id);
        if (!$row) show_404();
        $thumb = $this->upload_image('thumbnail_file', 'uploads/templates', (string) $row->thumbnail);
        if ($thumb === FALSE) {
            redirect('admin/templates/edit/' . $id);
        }
        $thumb = $thumb ?: trim($this->input->post('thumbnail', TRUE));
        $preview_mobile = $this->upload_image('preview_mobile_file', 'uploads/templates', (string) $row->preview_mobile);
        if ($preview_mobile === FALSE) redirect('admin/templates/edit/' . $id);
        $preview_mobile = $preview_mobile ?: trim($this->input->post('preview_mobile', TRUE));
        $preview_desktop = $this->upload_image('preview_desktop_file', 'uploads/templates', (string) $row->preview_desktop);
        if ($preview_desktop === FALSE) redirect('admin/templates/edit/' . $id);
        $preview_desktop = $preview_desktop ?: trim($this->input->post('preview_desktop', TRUE));
        $this->Template_model->update($id, array(
            'name' => trim($this->input->post('name', TRUE)),
            'folder' => trim($this->input->post('folder', TRUE)),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'thumbnail' => $thumb,
            'description' => trim($this->input->post('description', TRUE)),
            'preview_mobile' => $preview_mobile,
            'preview_desktop' => $preview_desktop,
            'preview_mobile' => $preview_mobile,
            'preview_desktop' => $preview_desktop,
            'demo_url' => trim($this->input->post('demo_url', TRUE)),
            'sort_order' => (int) $this->input->post('sort_order'),
            'is_active' => (int) $this->input->post('is_active')
        ));
        $this->Activity_log_model->insert(array(
            'user_id' => (int) $this->session->userdata('admin_id'),
            'module' => 'templates',
            'action' => 'update',
            'description' => 'Mengubah template #' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Template berhasil diupdate.');
        redirect('admin/templates');
    }

    public function clone_item($id)
    {
        $this->require_access('templates', 'clone');
        $new_id = $this->Template_model->clone_from($id);
        if ($new_id) {
            $this->Activity_log_model->insert(array(
                'user_id' => (int) $this->session->userdata('admin_id'),
                'module' => 'templates',
                'action' => 'clone',
                'description' => 'Clone template #' . $id . ' menjadi #' . $new_id,
                'created_at' => date('Y-m-d H:i:s')
            ));
            $this->set_flash('success', 'Template berhasil di-clone.');
        }
        redirect('admin/templates');
    }

    public function delete($id)
    {
        $this->require_access('templates', 'delete');
        $row = $this->Template_model->find($id);
        if ($row && !empty($row->thumbnail) && strpos($row->thumbnail, 'uploads/templates/') === 0) {
            $file = FCPATH . $row->thumbnail;
            if (is_file($file)) @unlink($file);
        }
        $this->Template_model->delete($id);
        $this->Activity_log_model->insert(array(
            'user_id' => (int) $this->session->userdata('admin_id'),
            'module' => 'templates',
            'action' => 'delete',
            'description' => 'Menghapus template #' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Template berhasil dihapus.');
        redirect('admin/templates');
    }
}
