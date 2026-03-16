<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller
{
    private $status_options = array('new', 'waiting_payment', 'paid', 'in_progress', 'completed', 'cancelled');
    private $payment_options = array('unpaid', 'dp', 'paid');
    private $payment_methods = array('bank_transfer', 'cash', 'qris', 'ewallet');

    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('orders');
        $this->load->model(array('Order_model', 'Customer_model', 'Template_model', 'Product_type_model', 'User_model', 'Activity_log_model'));
        $this->load->library(array('simple_pdf'));
    }

    private function parse_money($value)
    {
        return (float) preg_replace('/[^0-9]/', '', (string) $value);
    }

    private function order_payload($current = null)
    {
        $price = $this->parse_money($this->input->post('price'));
        $discount = $this->parse_money($this->input->post('discount'));
        $dp_amount = $this->parse_money($this->input->post('dp_amount'));
        $paid_amount = $this->parse_money($this->input->post('paid_amount'));
        $final_price = $this->parse_money($this->input->post('final_price'));
        if ($final_price <= 0) {
            $final_price = max(0, $price - $discount);
        }
        $payment_proof = $this->upload_image('payment_proof_file', 'uploads/payments', $current ? (string) $current->payment_proof : '', 'jpg|jpeg|png|webp|gif|pdf');
        if ($payment_proof === FALSE) {
            return FALSE;
        }
        $payment_proof = $payment_proof ?: trim($this->input->post('payment_proof', TRUE));
        return array(
            'customer_id' => (int) $this->input->post('customer_id'),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'package_name' => trim($this->input->post('package_name', TRUE)),
            'template_id' => (int) $this->input->post('template_id'),
            'assigned_user_id' => (int) $this->input->post('assigned_user_id'),
            'payment_status' => trim($this->input->post('payment_status', TRUE)),
            'status' => trim($this->input->post('status', TRUE)),
            'price' => $price,
            'discount' => $discount,
            'final_price' => $final_price,
            'dp_amount' => $dp_amount,
            'paid_amount' => $paid_amount,
            'payment_method' => trim($this->input->post('payment_method', TRUE)),
            'payment_date' => trim($this->input->post('payment_date', TRUE)) ?: NULL,
            'deadline_date' => trim($this->input->post('deadline_date', TRUE)) ?: NULL,
            'payment_proof' => $payment_proof,
            'notes' => trim($this->input->post('notes', TRUE)),
        );
    }

    public function index()
    {
        $data = $this->admin_data('Orders');
        $data['orders'] = $this->Order_model->all();
        $this->load->view('admin/orders/index', $data);
    }

    public function create()
    {
        $this->require_access('orders', 'create');
        $data = $this->admin_data('Tambah Order');
        $data['customers'] = $this->Customer_model->all();
        $data['templates'] = $this->Template_model->all();
        $data['product_types'] = $this->Product_type_model->active();
        $data['users'] = $this->User_model->active_all();
        $data['status_options'] = $this->status_options;
        $data['payment_options'] = $this->payment_options;
        $data['payment_methods'] = $this->payment_methods;
        $data['next_order_no'] = $this->Order_model->next_order_no();
        $this->load->view('admin/orders/form', $data);
    }

    public function store()
    {
        $this->require_access('orders', 'create');
        $payload = $this->order_payload();
        if ($payload === FALSE) redirect('admin/orders/create');
        $payload['order_no'] = trim($this->input->post('order_no', TRUE)) ?: $this->Order_model->next_order_no();
        $payload['created_at'] = date('Y-m-d H:i:s');
        $id = $this->Order_model->insert($payload);
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'orders','action' => 'create','description' => 'Membuat order #' . $id . ' (' . $payload['order_no'] . ')','created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Order berhasil ditambahkan.');
        redirect('admin/orders');
    }

    public function edit($id)
    {
        $this->require_access('orders', 'update');
        $data = $this->admin_data('Edit Order');
        $data['order'] = $this->Order_model->find($id);
        if (!$data['order']) show_404();
        $data['customers'] = $this->Customer_model->all();
        $data['templates'] = $this->Template_model->all();
        $data['product_types'] = $this->Product_type_model->active();
        $data['users'] = $this->User_model->active_all();
        $data['status_options'] = $this->status_options;
        $data['payment_options'] = $this->payment_options;
        $data['payment_methods'] = $this->payment_methods;
        $this->load->view('admin/orders/form', $data);
    }

    public function update($id)
    {
        $this->require_access('orders', 'update');
        $current = $this->Order_model->find($id);
        if (!$current) show_404();
        $payload = $this->order_payload($current);
        if ($payload === FALSE) redirect('admin/orders/edit/' . $id);
        $payload['order_no'] = trim($this->input->post('order_no', TRUE));
        $this->Order_model->update($id, $payload);
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'orders','action' => 'update','description' => 'Mengubah order #' . (int)$id . ' (' . $payload['order_no'] . ')','created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Order berhasil diupdate.');
        redirect('admin/orders');
    }

    public function invoice($id)
    {
        $data = $this->admin_data('Invoice Order');
        $data['order'] = $this->Order_model->find($id);
        if (!$data['order']) show_404();
        $this->load->view('admin/orders/invoice', $data);
    }


    public function invoice_pdf($id)
    {
        $data = $this->Order_model->find($id);
        if (!$data) show_404();
        $cleanNotes = trim(preg_replace('/\s+/', ' ', strip_tags((string) $data->notes)));
        $lines = array(
            'INVOICE ORDER ' . ($data->order_no ?: ('#' . $data->id)),
            'Customer: ' . $data->customer_name,
            'Product Type: ' . status_label($data->product_type),
            'Template: ' . ($data->template_name ?: '-'),
            'Status: ' . status_label($data->status),
            'Payment Status: ' . strtoupper($data->payment_status),
            'Payment Method: ' . status_label($data->payment_method),
            'Tanggal Bayar: ' . ($data->payment_date ?: '-'),
            'Deadline: ' . ($data->deadline_date ?: '-'),
            'Price: ' . rupiah($data->price),
            'Discount: ' . rupiah($data->discount),
            'Final Price: ' . rupiah($data->final_price),
            'DP Amount: ' . rupiah($data->dp_amount),
            'Paid Amount: ' . rupiah($data->paid_amount),
            'Notes: ' . ($cleanNotes ?: '-'),
        );
        $this->simple_pdf->download('invoice-' . ($data->order_no ?: $data->id) . '.pdf', $lines);
    }

    public function delete($id)
    {
        $this->require_access('orders', 'delete');
        $current = $this->Order_model->find($id);
        if ($current && !empty($current->payment_proof) && strpos($current->payment_proof, 'uploads/payments/') === 0) {
            $file = FCPATH . $current->payment_proof;
            if (is_file($file)) @unlink($file);
        }
        $this->Order_model->delete($id);
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'orders','action' => 'delete','description' => 'Menghapus order #' . (int)$id,'created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Order berhasil dihapus.');
        redirect('admin/orders');
    }
}
