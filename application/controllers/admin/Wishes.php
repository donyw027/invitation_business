<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('wishes');
        $this->load->model(array('Wish_model', 'Activity_log_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Moderasi Ucapan');
        $data['wishes'] = $this->Wish_model->all();
        $this->load->view('admin/wishes/index', $data);
    }

    public function approve($id)
    {
        $this->require_access('wishes', 'approve');
        $this->Wish_model->update($id, array('status' => 'approved', 'is_approved' => 1));
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'wishes','action' => 'approve','description' => 'Approve wish #' . (int)$id,'created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Ucapan berhasil di-approve.');
        redirect('admin/wishes');
    }

    public function reject($id)
    {
        $this->require_access('wishes', 'reject');
        $this->Wish_model->update($id, array('status' => 'rejected', 'is_approved' => 0));
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'wishes','action' => 'reject','description' => 'Reject wish #' . (int)$id,'created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Ucapan berhasil ditolak.');
        redirect('admin/wishes');
    }

    public function pending($id)
    {
        $this->require_access('wishes', 'approve');
        $this->Wish_model->update($id, array('status' => 'pending', 'is_approved' => 0));
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'wishes','action' => 'pending','description' => 'Set pending wish #' . (int)$id,'created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Ucapan dikembalikan ke pending.');
        redirect('admin/wishes');
    }
}
