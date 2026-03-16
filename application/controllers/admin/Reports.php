<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('reports');
        $this->load->model(array('Order_model', 'Project_model', 'Guest_model', 'Rsvp_model', 'Wish_model'));
        $this->load->library('simple_xlsx_writer');
    }

    public function index()
    {
        $data = $this->admin_data('Laporan Ringkas');
        $data['orders'] = $this->Order_model->all();
        $data['projects'] = $this->Project_model->all();
        $data['guest_total'] = $this->Guest_model->count_all();
        $data['guest_opened'] = $this->Guest_model->count_opened();
        $data['rsvp_total'] = $this->Rsvp_model->count_all();
        $data['attendee_total'] = $this->Rsvp_model->total_attendees();
        $data['wish_total'] = $this->Wish_model->count_all();
        $data['wish_pending'] = $this->Wish_model->count_pending();
        $this->load->view('admin/reports/index', $data);
    }

    public function export_orders()
    {
        $this->require_access('reports', 'export');
        $rows = $this->Order_model->all();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="orders-report.csv"');
        $out = fopen('php://output', 'w');
        fputcsv($out, array('order_no','customer','product_type','status','payment_status','final_price','paid_amount','deadline_date'));
        foreach ($rows as $row) {
            fputcsv($out, array($row->order_no, $row->customer_name, $row->product_type, $row->status, $row->payment_status, $row->final_price, $row->paid_amount, $row->deadline_date));
        }
        fclose($out);
        exit;
    }

    public function export_projects()
    {
        $this->require_access('reports', 'export');
        $rows = $this->Project_model->all();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="projects-report.csv"');
        $out = fopen('php://output', 'w');
        fputcsv($out, array('title','customer','template','status','event_date','deadline_date','slug'));
        foreach ($rows as $row) {
            fputcsv($out, array($row->title, $row->customer_name, $row->template_name, $row->status, $row->event_date, $row->deadline_date, $row->slug));
        }
        fclose($out);
        exit;
    }


    public function export_orders_xlsx()
    {
        $this->require_access('reports', 'export');
        $rows = $this->Order_model->all();
        $sheet = array(array('order_no','customer','product_type','status','payment_status','final_price','paid_amount','deadline_date'));
        foreach ($rows as $row) {
            $sheet[] = array($row->order_no, $row->customer_name, $row->product_type, $row->status, $row->payment_status, $row->final_price, $row->paid_amount, $row->deadline_date);
        }
        $this->simple_xlsx_writer->download('orders-report.xlsx', 'Orders', $sheet);
    }

    public function export_projects_xlsx()
    {
        $this->require_access('reports', 'export');
        $rows = $this->Project_model->all();
        $sheet = array(array('title','customer','template','status','event_date','deadline_date','slug'));
        foreach ($rows as $row) {
            $sheet[] = array($row->title, $row->customer_name, $row->template_name, $row->status, $row->event_date, $row->deadline_date, $row->slug);
        }
        $this->simple_xlsx_writer->download('projects-report.xlsx', 'Projects', $sheet);
    }
}
