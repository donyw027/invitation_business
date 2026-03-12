<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }

        if ($this->input->method() === 'post') {
            $username = trim($this->input->post('username', TRUE));
            $password = $this->input->post('password');
            $user = $this->User_model->find_by_username($username);

            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata(array(
                    'admin_logged_in' => TRUE,
                    'admin_id' => $user->id,
                    'admin_name' => $user->name
                ));
                redirect('admin/dashboard');
            }

            $data['error'] = 'Username atau password salah.';
        }

        $data['page_title'] = 'Login Admin';
        $this->load->view('admin/auth/login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
