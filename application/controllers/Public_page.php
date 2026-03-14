<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Project_model', 'Wish_model', 'Rsvp_model', 'Guest_model', 'Template_model', 'Package_model', 'Product_type_model', 'Setting_model'));
    }

    public function home()
    {
        $product_types = $this->Product_type_model->active();
        $package_groups = array();
        $template_groups = array();
        foreach ($product_types as $type) {
            $package_groups[$type->code] = $this->Package_model->by_product($type->code);
            $template_groups[$type->code] = $this->Template_model->active_by_product($type->code);
        }

        $data['page_title'] = 'Undangan Digital & Greeting Card';
        $data['product_types'] = $product_types;
        $data['package_groups'] = $package_groups;
        $data['template_groups'] = $template_groups;
        $data['wa_number'] = $this->Setting_model->get('wa_number', '6281234567890');
        $data['brand_name'] = $this->Setting_model->get('brand_name', 'InviteBiz');
        $this->load->view('frontend/home', $data);
    }

    public function preview($slug)
    {
        $project = $this->Project_model->detail_by_slug($slug);
        if (!$project) {
            show_404();
        }

        $data = $this->build_project_data($project, TRUE, null);
        $this->render_project($project, $data);
    }

    public function view($slug, $guest_slug = null)
    {
        $project = $this->Project_model->detail_by_slug($slug);
        if (!$project || $project->status !== 'published') {
            show_404();
        }

        $guest = null;
        if ($guest_slug && $project->product_type !== 'greeting_card') {
            $guest = $this->Guest_model->find_by_slug($project->id, $guest_slug);
            if ($guest) {
                $this->Guest_model->touch_opened($guest->id);
            }
        }

        $data = $this->build_project_data($project, FALSE, $guest);
        $this->render_project($project, $data);
    }

    private function build_project_data($project, $is_preview = FALSE, $guest = null)
    {
        return array(
            'page_title' => $project->title,
            'project' => $project,
            'guest' => $guest,
            'guest_name' => $guest ? $guest->guest_name : '',
            'is_preview' => $is_preview,
            'wishes' => $this->Wish_model->approved_by_project($project->id),
        );
    }

    private function render_project($project, $data)
    {
        $theme = $project->template_folder ?: 'romantic';
        $view = 'themes/' . $theme . '/index';
        if (!file_exists(APPPATH . 'views/' . $view . '.php')) {
            show_error('Theme view not found: ' . $view);
        }
        $this->load->view($view, $data);
    }

    public function store_rsvp()
    {
        $project_id = (int) $this->input->post('project_id');
        $project = $this->Project_model->find($project_id);
        if (!$project) {
            show_404();
        }

        $redirect = project_url($project);
        $guest_slug = trim($this->input->post('guest_slug', TRUE));
        if ($guest_slug && $project->product_type !== 'greeting_card') {
            $redirect = site_url('i/' . $project->slug . '/' . $guest_slug);
        }

        $data = array(
            'project_id' => $project_id,
            'guest_name' => trim($this->input->post('guest_name', TRUE)),
            'attendance_status' => trim($this->input->post('attendance_status', TRUE)),
            'guest_total' => (int) $this->input->post('guest_total'),
            'note' => trim($this->input->post('note', TRUE)),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->Rsvp_model->insert($data);

        $this->session->set_flashdata('success', 'RSVP berhasil dikirim.');
        redirect($redirect);
    }

    public function store_wish()
    {
        $project_id = (int) $this->input->post('project_id');
        $project = $this->Project_model->find($project_id);
        if (!$project) {
            show_404();
        }

        $redirect = project_url($project);
        $guest_slug = trim($this->input->post('guest_slug', TRUE));
        if ($guest_slug && $project->product_type !== 'greeting_card') {
            $redirect = site_url('i/' . $project->slug . '/' . $guest_slug);
        }

        $data = array(
            'project_id' => $project_id,
            'guest_name' => trim($this->input->post('guest_name', TRUE)),
            'message' => trim($this->input->post('message', TRUE)),
            'is_approved' => 1,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->Wish_model->insert($data);

        $this->session->set_flashdata('success', 'Ucapan berhasil dikirim.');
        redirect($redirect);
    }
}
