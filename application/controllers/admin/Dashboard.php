<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->load->model(array('Order_model', 'Project_model', 'Rsvp_model', 'Wish_model', 'Guest_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Dashboard');
        $data['order_count'] = $this->Order_model->count_all();
        $data['project_count'] = $this->Project_model->count_all();
        $data['published_count'] = $this->Project_model->count_published();
        $data['rsvp_count'] = $this->Rsvp_model->count_all();
        $data['wish_count'] = $this->Wish_model->count_all();
        $data['guest_total'] = $this->Guest_model->count_all();
        $data['latest_rsvps'] = $this->Rsvp_model->latest();
        $data['latest_wishes'] = $this->Wish_model->latest();
        $this->load->view('admin/dashboard/index', $data);
    }
}
