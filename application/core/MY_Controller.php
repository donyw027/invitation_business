<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected function admin_guard()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }

    protected function admin_data($title = 'Admin Panel')
    {
        return array(
            'page_title' => $title,
            'admin_name' => $this->session->userdata('admin_name')
        );
    }
}
