<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $current_admin = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'app'));
        $this->load->library('session');
        if ($this->session->userdata('admin_id')) {
            $this->load->model('User_model');
            $this->current_admin = $this->User_model->find((int) $this->session->userdata('admin_id'));
        }
    }

    protected function admin_guard()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }

    protected function can_access($module, $action = 'view')
    {
        return role_can((string) $this->session->userdata('admin_role'), $module, $action);
    }

    protected function require_access($module, $action = 'view')
    {
        if (!$this->can_access($module, $action)) {
            $this->set_flash('danger', 'Akses untuk aksi tersebut tidak diizinkan pada role Anda.');
            redirect('admin/dashboard');
        }
    }

    protected function admin_data($title = 'Admin Panel')
    {
        return array(
            'page_title' => $title,
            'admin_name' => $this->session->userdata('admin_name'),
            'current_admin' => $this->current_admin,
            'can_access' => array(
                'dashboard' => $this->can_access('dashboard'),
                'reports' => $this->can_access('reports'),
                'customers' => $this->can_access('customers'),
                'orders' => $this->can_access('orders'),
                'projects' => $this->can_access('projects'),
                'guests' => $this->can_access('guests'),
                'wishes' => $this->can_access('wishes'),
                'product_types' => $this->can_access('product_types'),
                'packages' => $this->can_access('packages'),
                'templates' => $this->can_access('templates'),
                'users' => $this->can_access('users'),
                'settings' => $this->can_access('settings'),
            ),
            'can_do' => array(
                'users_create' => $this->can_access('users', 'create'),
                'users_update' => $this->can_access('users', 'update'),
                'users_delete' => $this->can_access('users', 'delete'),
                'templates_create' => $this->can_access('templates', 'create'),
                'templates_update' => $this->can_access('templates', 'update'),
                'templates_delete' => $this->can_access('templates', 'delete'),
                'templates_clone' => $this->can_access('templates', 'clone'),
                'orders_create' => $this->can_access('orders', 'create'),
                'orders_update' => $this->can_access('orders', 'update'),
                'orders_delete' => $this->can_access('orders', 'delete'),
                'projects_create' => $this->can_access('projects', 'create'),
                'projects_update' => $this->can_access('projects', 'update'),
                'projects_publish' => $this->can_access('projects', 'publish'),
                'projects_delete' => $this->can_access('projects', 'delete'),
                'guests_import' => $this->can_access('guests', 'import'),
                'guests_export' => $this->can_access('guests', 'export'),
                'guests_delete' => $this->can_access('guests', 'delete'),
                'wishes_approve' => $this->can_access('wishes', 'approve'),
                'reports_export' => $this->can_access('reports', 'export'),
                'settings_update' => $this->can_access('settings', 'update'),
            ),
        );
    }

    protected function set_flash($type, $message)
    {
        $this->session->set_flashdata('flash_type', $type);
        $this->session->set_flashdata('flash_message', $message);
    }

    protected function upload_image($field_name, $target_folder, $old_path = '', $allowed = 'jpg|jpeg|png|webp|gif|pdf')
    {
        if (empty($_FILES[$field_name]['name'])) {
            return $old_path;
        }

        $upload_dir = FCPATH . trim($target_folder, '/') . '/';
        if (!is_dir($upload_dir)) {
            @mkdir($upload_dir, 0777, TRUE);
        }

        $config = array(
            'upload_path' => $upload_dir,
            'allowed_types' => $allowed,
            'max_size' => 4096,
            'encrypt_name' => TRUE,
        );

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field_name)) {
            $this->set_flash('danger', strip_tags($this->upload->display_errors('', '')));
            return FALSE;
        }

        $data = $this->upload->data();
        $new_path = trim($target_folder, '/') . '/' . $data['file_name'];

        if ($old_path && strpos($old_path, trim($target_folder, '/').'/') === 0) {
            $old_file = FCPATH . ltrim($old_path, '/');
            if (is_file($old_file)) {
                @unlink($old_file);
            }
        }

        return $new_path;
    }
}
