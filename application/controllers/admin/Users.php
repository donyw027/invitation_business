<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('users');
        $this->load->model(array('User_model', 'Activity_log_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Admin Users');
        $data['users'] = $this->User_model->all();
        $data['role_options'] = $this->User_model->role_options();
        $this->load->view('admin/users/index', $data);
    }

    public function create()
    {
        $this->require_access('users', 'create');
        $data = $this->admin_data('Tambah Admin User');
        $data['role_options'] = $this->User_model->role_options();
        $this->load->view('admin/users/form', $data);
    }

    public function store()
    {
        $this->require_access('users', 'create');
        $username = trim($this->input->post('username', TRUE));
        if ($this->User_model->find_by_username($username)) {
            $this->set_flash('danger', 'Username sudah digunakan.');
            redirect('admin/users/create');
        }

        $photo = $this->upload_image('photo', 'uploads/users');
        if ($photo === FALSE) {
            redirect('admin/users/create');
        }

        $payload = array(
            'name' => trim($this->input->post('name', TRUE)),
            'username' => $username,
            'email' => trim($this->input->post('email', TRUE)),
            'role' => trim($this->input->post('role', TRUE)),
            'photo' => $photo,
            'is_active' => (int) $this->input->post('is_active'),
            'password' => password_hash((string) $this->input->post('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $user_id = $this->User_model->insert($payload);
        $this->Activity_log_model->insert(array(
            'user_id' => (int) $this->session->userdata('admin_id'),
            'module' => 'users',
            'action' => 'create',
            'description' => 'Membuat admin user #' . $user_id . ' (' . $username . ')',
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Admin user berhasil dibuat.');
        redirect('admin/users');
    }

    public function edit($id)
    {
        $this->require_access('users', 'update');
        $data = $this->admin_data('Edit Admin User');
        $data['row'] = $this->User_model->find($id);
        if (!$data['row']) show_404();
        $data['role_options'] = $this->User_model->role_options();
        $this->load->view('admin/users/form', $data);
    }

    public function update($id)
    {
        $this->require_access('users', 'update');
        $row = $this->User_model->find($id);
        if (!$row) show_404();

        $username = trim($this->input->post('username', TRUE));
        $check = $this->User_model->find_by_username($username);
        if ($check && (int) $check->id !== (int) $id) {
            $this->set_flash('danger', 'Username sudah digunakan.');
            redirect('admin/users/edit/' . $id);
        }

        $photo = $this->upload_image('photo', 'uploads/users', (string) $row->photo);
        if ($photo === FALSE) {
            redirect('admin/users/edit/' . $id);
        }

        $payload = array(
            'name' => trim($this->input->post('name', TRUE)),
            'username' => $username,
            'email' => trim($this->input->post('email', TRUE)),
            'role' => trim($this->input->post('role', TRUE)),
            'photo' => $photo,
            'is_active' => (int) $this->input->post('is_active'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $password = (string) $this->input->post('password');
        if ($password !== '') {
            $payload['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $this->User_model->update($id, $payload);
        $this->Activity_log_model->insert(array(
            'user_id' => (int) $this->session->userdata('admin_id'),
            'module' => 'users',
            'action' => 'update',
            'description' => 'Mengubah admin user #' . $id . ' (' . $username . ')',
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Admin user berhasil diupdate.');
        redirect('admin/users');
    }

    public function delete($id)
    {
        $this->require_access('users', 'delete');
        if ((int) $id === 1) {
            $this->set_flash('danger', 'User utama tidak boleh dihapus.');
            redirect('admin/users');
        }
        $row = $this->User_model->find($id);
        if ($row) {
            if (!empty($row->photo) && strpos($row->photo, 'uploads/users/') === 0) {
                $file = FCPATH . $row->photo;
                if (is_file($file)) @unlink($file);
            }
            $this->User_model->delete($id);
            $this->Activity_log_model->insert(array(
                'user_id' => (int) $this->session->userdata('admin_id'),
                'module' => 'users',
                'action' => 'delete',
                'description' => 'Menghapus admin user #' . $id . ' (' . $row->username . ')',
                'created_at' => date('Y-m-d H:i:s')
            ));
            $this->set_flash('success', 'Admin user berhasil dihapus.');
        }
        redirect('admin/users');
    }
}
