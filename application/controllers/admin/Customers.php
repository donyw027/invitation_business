<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->load->model('Customer_model');
    }

    public function index()
    {
        $data = $this->admin_data('Customers');
        $data['customers'] = $this->Customer_model->all();
        $this->load->view('admin/customers/index', $data);
    }

    public function create()
    {
        $data = $this->admin_data('Tambah Customer');
        $this->load->view('admin/customers/form', $data);
    }

    public function store()
    {
        $this->Customer_model->insert(array(
            'name' => trim($this->input->post('name', TRUE)),
            'phone' => trim($this->input->post('phone', TRUE)),
            'notes' => trim($this->input->post('notes', TRUE)),
            'created_at' => date('Y-m-d H:i:s')
        ));
        redirect('admin/customers');
    }

    public function edit($id)
    {
        $data = $this->admin_data('Edit Customer');
        $data['customer'] = $this->Customer_model->find($id);
        $this->load->view('admin/customers/form', $data);
    }

    public function update($id)
    {
        $this->Customer_model->update($id, array(
            'name' => trim($this->input->post('name', TRUE)),
            'phone' => trim($this->input->post('phone', TRUE)),
            'notes' => trim($this->input->post('notes', TRUE))
        ));
        redirect('admin/customers');
    }

    public function delete($id)
    {
        $this->Customer_model->delete($id);
        redirect('admin/customers');
    }
}
