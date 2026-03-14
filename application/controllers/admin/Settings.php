<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->load->model('Setting_model');
    }

    public function index()
    {
        if ($this->input->method() === 'post') {
            $this->Setting_model->set('brand_name', trim($this->input->post('brand_name', TRUE)));
            $this->Setting_model->set('wa_number', trim($this->input->post('wa_number', TRUE)));
            redirect('admin/settings');
        }
        $data = $this->admin_data('Settings');
        $data['brand_name'] = $this->Setting_model->get('brand_name', 'InviteBiz');
        $data['wa_number'] = $this->Setting_model->get('wa_number', '6281234567890');
        $this->load->view('admin/settings/index', $data);
    }
}
