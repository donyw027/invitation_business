<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_types extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('product_types');
        $this->load->model('Product_type_model');
    }

    public function index()
    {
        $data = $this->admin_data('Product Types');
        $data['rows'] = $this->Product_type_model->all();
        $this->load->view('admin/product_types/index', $data);
    }

    public function create()
    {
        $data = $this->admin_data('Tambah Product Type');
        $this->load->view('admin/product_types/form', $data);
    }

    public function store()
    {
        $this->Product_type_model->insert(array(
            'name' => trim($this->input->post('name', TRUE)),
            'code' => trim($this->input->post('code', TRUE)) ?: slugify($this->input->post('name', TRUE)),
            'description' => trim($this->input->post('description', TRUE)),
            'is_active' => (int) $this->input->post('is_active'),
            'sort_order' => (int) $this->input->post('sort_order'),
            'created_at' => date('Y-m-d H:i:s')
        ));
        redirect('admin/product-types');
    }

    public function edit($id)
    {
        $data = $this->admin_data('Edit Product Type');
        $data['row'] = $this->Product_type_model->find($id);
        $this->load->view('admin/product_types/form', $data);
    }

    public function update($id)
    {
        $this->Product_type_model->update($id, array(
            'name' => trim($this->input->post('name', TRUE)),
            'code' => trim($this->input->post('code', TRUE)) ?: slugify($this->input->post('name', TRUE)),
            'description' => trim($this->input->post('description', TRUE)),
            'is_active' => (int) $this->input->post('is_active'),
            'sort_order' => (int) $this->input->post('sort_order')
        ));
        redirect('admin/product-types');
    }

    public function delete($id)
    {
        $this->Product_type_model->delete($id);
        redirect('admin/product-types');
    }
}
