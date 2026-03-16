<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('customers');
        $this->load->model(array('Customer_model', 'Activity_log_model'));
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
        $id = $this->Customer_model->insert(array(
            'name' => trim($this->input->post('name', TRUE)),
            'phone' => trim($this->input->post('phone', TRUE)),
            'email' => trim($this->input->post('email', TRUE)),
            'source' => trim($this->input->post('source', TRUE)),
            'address' => trim($this->input->post('address', TRUE)),
            'notes' => trim($this->input->post('notes', TRUE)),
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'customers','action' => 'create','description' => 'Membuat customer #' . $id,'created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Customer berhasil ditambahkan.');
        redirect('admin/customers');
    }

    public function edit($id)
    {
        $data = $this->admin_data('Edit Customer');
        $data['customer'] = $this->Customer_model->find($id);
        if (!$data['customer']) show_404();
        $this->load->view('admin/customers/form', $data);
    }

    public function update($id)
    {
        $this->Customer_model->update($id, array(
            'name' => trim($this->input->post('name', TRUE)),
            'phone' => trim($this->input->post('phone', TRUE)),
            'email' => trim($this->input->post('email', TRUE)),
            'source' => trim($this->input->post('source', TRUE)),
            'address' => trim($this->input->post('address', TRUE)),
            'notes' => trim($this->input->post('notes', TRUE))
        ));
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'customers','action' => 'update','description' => 'Mengubah customer #' . (int)$id,'created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Customer berhasil diupdate.');
        redirect('admin/customers');
    }

    public function delete($id)
    {
        $this->Customer_model->delete($id);
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'customers','action' => 'delete','description' => 'Menghapus customer #' . (int)$id,'created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Customer berhasil dihapus.');
        redirect('admin/customers');
    }
}
