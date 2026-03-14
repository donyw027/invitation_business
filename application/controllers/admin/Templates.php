<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->load->model(array('Template_model', 'Product_type_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Templates');
        $data['templates'] = $this->Template_model->all();
        $this->load->view('admin/templates/index', $data);
    }

    public function create()
    {
        $data = $this->admin_data('Tambah Template');
        $data['product_types'] = $this->Product_type_model->active();
        $this->load->view('admin/templates/form', $data);
    }

    public function store()
    {
        $this->Template_model->insert(array(
            'name' => trim($this->input->post('name', TRUE)),
            'folder' => trim($this->input->post('folder', TRUE)),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'thumbnail' => trim($this->input->post('thumbnail', TRUE)),
            'description' => trim($this->input->post('description', TRUE)),
            'demo_url' => trim($this->input->post('demo_url', TRUE)),
            'sort_order' => (int) $this->input->post('sort_order'),
            'is_active' => (int) $this->input->post('is_active'),
            'created_at' => date('Y-m-d H:i:s')
        ));
        redirect('admin/templates');
    }

    public function edit($id)
    {
        $data = $this->admin_data('Edit Template');
        $data['row'] = $this->Template_model->find($id);
        $data['product_types'] = $this->Product_type_model->active();
        $this->load->view('admin/templates/form', $data);
    }

    public function update($id)
    {
        $this->Template_model->update($id, array(
            'name' => trim($this->input->post('name', TRUE)),
            'folder' => trim($this->input->post('folder', TRUE)),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'thumbnail' => trim($this->input->post('thumbnail', TRUE)),
            'description' => trim($this->input->post('description', TRUE)),
            'demo_url' => trim($this->input->post('demo_url', TRUE)),
            'sort_order' => (int) $this->input->post('sort_order'),
            'is_active' => (int) $this->input->post('is_active')
        ));
        redirect('admin/templates');
    }

    public function delete($id)
    {
        $this->Template_model->delete($id);
        redirect('admin/templates');
    }
}
