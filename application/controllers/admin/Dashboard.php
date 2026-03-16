<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('dashboard');
        $this->load->model(array('Order_model', 'Project_model', 'Rsvp_model', 'Wish_model', 'Guest_model', 'Activity_log_model', 'Customer_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Dashboard Operasional');
        $data['order_count'] = $this->Order_model->count_all();
        $data['project_count'] = $this->Project_model->count_all();
        $data['published_count'] = $this->Project_model->count_published();
        $data['rsvp_count'] = $this->Rsvp_model->count_all();
        $data['wish_count'] = $this->Wish_model->count_all();
        $data['guest_total'] = $this->Guest_model->count_all();
        $data['guest_opened'] = $this->Guest_model->count_opened();
        $data['pending_wishes'] = $this->Wish_model->count_pending();
        $data['customer_count'] = $this->Customer_model->count_all();
        $data['paid_revenue'] = $this->Order_model->sum_revenue();
        $data['paid_amount'] = $this->Order_model->sum_paid_amount();
        $data['total_attendees'] = $this->Rsvp_model->total_attendees();
        $data['waiting_payment'] = $this->Order_model->count_by_status('waiting_payment');
        $data['in_progress'] = $this->Order_model->count_by_status('in_progress');
        $data['latest_rsvps'] = $this->Rsvp_model->latest(5);
        $data['latest_wishes'] = $this->Wish_model->latest(5);
        $data['latest_activities'] = $this->Activity_log_model->latest(8);
        $data['monthly_orders'] = $this->Order_model->monthly_summary(6);
        $data['project_status_summary'] = $this->Project_model->status_summary();
        $this->load->view('admin/dashboard/index', $data);
    }
}
