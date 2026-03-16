<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('User_model', 'Activity_log_model'));
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

            if ($user && (int) $user->is_active === 1 && password_verify($password, $user->password)) {
                $this->session->set_userdata(array(
                    'admin_logged_in' => TRUE,
                    'admin_id' => $user->id,
                    'admin_name' => $user->name,
                    'admin_role' => $user->role,
                    'admin_photo' => $user->photo,
                ));
                $this->User_model->update($user->id, array('last_login_at' => date('Y-m-d H:i:s')));
                $this->Activity_log_model->insert(array(
                    'user_id' => $user->id,
                    'module' => 'auth',
                    'action' => 'login',
                    'description' => 'User login ke admin panel',
                    'created_at' => date('Y-m-d H:i:s')
                ));
                redirect('admin/dashboard');
            }

            $data['error'] = 'Username atau password salah / user nonaktif.';
        }

        $data['page_title'] = 'Login Admin';
        $this->load->view('admin/auth/login', $data);
    }

    public function logout()
    {
        if ($this->session->userdata('admin_id')) {
            $this->Activity_log_model->insert(array(
                'user_id' => (int) $this->session->userdata('admin_id'),
                'module' => 'auth',
                'action' => 'logout',
                'description' => 'User logout dari admin panel',
                'created_at' => date('Y-m-d H:i:s')
            ));
        }
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
