<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('packages');
        $this->load->model(array('Package_model', 'Product_type_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Packages');
        $data['rows'] = $this->Package_model->all();
        $this->load->view('admin/packages/index', $data);
    }

    public function create()
    {
        $data = $this->admin_data('Tambah Package');
        $data['product_types'] = $this->Product_type_model->active();
        $this->load->view('admin/packages/form', $data);
    }

    public function store()
    {
        $this->Package_model->insert(array(
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'name' => trim($this->input->post('name', TRUE)),
            'price' => (int) $this->input->post('price'),
            'old_price' => (int) $this->input->post('old_price'),
            'description' => trim($this->input->post('description', TRUE)),
            'features' => trim($this->input->post('features', TRUE)),
            'button_text' => trim($this->input->post('button_text', TRUE)) ?: 'Pilih Paket',
            'is_featured' => (int) $this->input->post('is_featured'),
            'is_active' => (int) $this->input->post('is_active'),
            'sort_order' => (int) $this->input->post('sort_order'),
            'created_at' => date('Y-m-d H:i:s')
        ));
        redirect('admin/packages');
    }

    public function edit($id)
    {
        $data = $this->admin_data('Edit Package');
        $data['row'] = $this->Package_model->find($id);
        $data['product_types'] = $this->Product_type_model->active();
        $this->load->view('admin/packages/form', $data);
    }

    public function update($id)
    {
        $this->Package_model->update($id, array(
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'name' => trim($this->input->post('name', TRUE)),
            'price' => (int) $this->input->post('price'),
            'old_price' => (int) $this->input->post('old_price'),
            'description' => trim($this->input->post('description', TRUE)),
            'features' => trim($this->input->post('features', TRUE)),
            'button_text' => trim($this->input->post('button_text', TRUE)) ?: 'Pilih Paket',
            'is_featured' => (int) $this->input->post('is_featured'),
            'is_active' => (int) $this->input->post('is_active'),
            'sort_order' => (int) $this->input->post('sort_order')
        ));
        redirect('admin/packages');
    }

    public function delete($id)
    {
        $this->Package_model->delete($id);
        redirect('admin/packages');
    }
}
