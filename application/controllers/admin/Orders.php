<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->load->model(array('Order_model', 'Customer_model', 'Template_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Orders');
        $data['orders'] = $this->Order_model->all();
        $this->load->view('admin/orders/index', $data);
    }

    public function create()
    {
        $data = $this->admin_data('Tambah Order');
        $data['customers'] = $this->Customer_model->all();
        $data['templates'] = $this->Template_model->all();
        $this->load->view('admin/orders/form', $data);
    }

    public function store()
    {
        $this->Order_model->insert(array(
            'customer_id' => (int) $this->input->post('customer_id'),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'package_name' => trim($this->input->post('package_name', TRUE)),
            'template_id' => (int) $this->input->post('template_id'),
            'payment_status' => trim($this->input->post('payment_status', TRUE)),
            'status' => trim($this->input->post('status', TRUE)),
            'notes' => trim($this->input->post('notes', TRUE)),
            'created_at' => date('Y-m-d H:i:s')
        ));
        redirect('admin/orders');
    }

    public function edit($id)
    {
        $data = $this->admin_data('Edit Order');
        $data['order'] = $this->Order_model->find($id);
        $data['customers'] = $this->Customer_model->all();
        $data['templates'] = $this->Template_model->all();
        $this->load->view('admin/orders/form', $data);
    }

    public function update($id)
    {
        $this->Order_model->update($id, array(
            'customer_id' => (int) $this->input->post('customer_id'),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'package_name' => trim($this->input->post('package_name', TRUE)),
            'template_id' => (int) $this->input->post('template_id'),
            'payment_status' => trim($this->input->post('payment_status', TRUE)),
            'status' => trim($this->input->post('status', TRUE)),
            'notes' => trim($this->input->post('notes', TRUE))
        ));
        redirect('admin/orders');
    }

    public function delete($id)
    {
        $this->Order_model->delete($id);
        redirect('admin/orders');
    }
}
