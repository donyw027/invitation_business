<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->load->model('Template_model');
    }

    public function index()
    {
        $data = $this->admin_data('Templates');
        $data['templates'] = $this->Template_model->all();
        $this->load->view('admin/templates/index', $data);
    }
}
