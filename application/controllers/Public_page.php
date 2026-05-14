<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Project_model', 'Wish_model', 'Rsvp_model', 'Guest_model', 'Template_model', 'Package_model', 'Product_type_model', 'Setting_model', 'Project_gallery_model'));
    }

    // public function home()
    // {
    //     $product_types = $this->Product_type_model->active();
    //     $package_groups = array();
    //     $template_groups = array();
    //     foreach ($product_types as $type) {
    //         $package_groups[$type->code] = $this->Package_model->by_product($type->code);
    //         $template_groups[$type->code] = $this->Template_model->active_by_product($type->code);
    //     }

    //     $data['page_title'] = 'Undangan Digital & Greeting Card';
    //     $data['product_types'] = $product_types;
    //     $data['package_groups'] = $package_groups;
    //     $data['template_groups'] = $template_groups;
    //     $data['wa_number'] = $this->Setting_model->get('wa_number', '6281234567890');
    //     $data['brand_name'] = $this->Setting_model->get('brand_name', 'InviteBiz');
    //     $this->load->view('frontend/home', $data);
    // }




    private function base_data()
    {
        $product_types = $this->Product_type_model->active();
        $package_groups = array();
        $template_groups = array();

        foreach ($product_types as $type) {
            $package_groups[$type->code] = $this->Package_model->by_product($type->code);
            $template_groups[$type->code] = $this->Template_model->active_by_product($type->code);
        }

        return array(
            'product_types'   => $product_types,
            'package_groups'  => $package_groups,
            'template_groups' => $template_groups,
            'wa_number'       => $this->Setting_model->get('wa_number', '6281234567890'),
            'brand_name'      => $this->Setting_model->get('brand_name', 'MySimpleGift x JastipinIndahAja'),
        );
    }

    private function render($view, $data = array())
    {
        $base = $this->base_data();
        $data = array_merge($base, $data);

        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/' . $view, $data);
        $this->load->view('frontend/partials/footer', $data);
    }

    public function home()
    {
        $data['page_title'] = 'Home';
        $this->render('home', $data);
    }

    public function cara_order()
    {
        $data['page_title'] = 'Cara Order';
        $this->render('cara_order', $data);
    }

    public function faq()
    {
        $data['page_title'] = 'FAQ';
        $this->render('faq', $data);
    }

    public function kontak()
    {
        $data['page_title'] = 'Kontak';
        $this->render('kontak', $data);
    }

    public function review()
    {
        $data['page_title'] = 'Review & Gallery';
        $this->render('review', $data);
    }

    public function jastip_malang()
    {
        $data['page_title'] = 'Jastip Malang';
        $data['area'] = 'Malang';
        $this->render('local_area', $data);
    }

    public function jastip_trawas()
    {
        $data['page_title'] = 'Jastip Trawas';
        $data['area'] = 'Trawas';
        $this->render('local_area', $data);
    }


    public function preview($slug)
    {
        // Hanya admin login yang boleh akses preview
        if (!$this->session->userdata('admin_logged_in')) {
            show_404();
        }

        // Optional: cek role apakah punya akses project
        if (!$this->can_access('projects', 'view')) {
            show_404();
        }

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

        if (!$project) {
            show_404();
        }

        if ($project->status !== 'published') {
            $data = [
                'project' => $project,
                'guest_slug' => $guest_slug,
            ];
            $this->load->view('frontend/invitation_not_ready', $data);
            return;
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
            'galleries' => $this->Project_gallery_model->by_project($project->id),
        );
    }

    private function render_project($project, $data)
    {
        $theme = $project->template_folder ?: 'romantic';
        $view = 'themes/' . $theme . '/index';
        if (!file_exists(APPPATH . 'views/' . $view . '.php')) show_error('Theme view not found: ' . $view);
        $this->load->view($view, $data);
    }

    public function store_rsvp()
    {
        $project_id = (int) $this->input->post('project_id');
        $project = $this->Project_model->find($project_id);
        if (!$project) show_404();
        $redirect = project_url($project);
        $guest_slug = trim($this->input->post('guest_slug', TRUE));
        $guest = null;
        if ($guest_slug && $project->product_type !== 'greeting_card') {
            $redirect = site_url('i/' . $project->slug . '/' . $guest_slug);
            $guest = $this->Guest_model->find_by_slug($project_id, $guest_slug);
        }

        $this->Rsvp_model->insert(array('project_id' => $project_id, 'guest_id' => $guest ? (int)$guest->id : NULL, 'guest_name' => trim($this->input->post('guest_name', TRUE)), 'attendance_status' => trim($this->input->post('attendance_status', TRUE)), 'guest_total' => max(1, (int)$this->input->post('guest_total')), 'note' => trim($this->input->post('note', TRUE)), 'created_at' => date('Y-m-d H:i:s')));
        $this->session->set_flashdata('success', 'RSVP berhasil dikirim.');
        redirect($redirect);
    }

    public function store_wish()
    {
        $project_id = (int) $this->input->post('project_id');
        $project = $this->Project_model->find($project_id);
        if (!$project) show_404();
        $redirect = project_url($project);
        $guest_slug = trim($this->input->post('guest_slug', TRUE));
        if ($guest_slug && $project->product_type !== 'greeting_card') {
            $redirect = site_url('i/' . $project->slug . '/' . $guest_slug);
        }
        $default_status = $this->Setting_model->get('auto_approve_wishes', '0') === '1' ? 'approved' : 'pending';
        $this->Wish_model->insert(array('project_id' => $project_id, 'guest_name' => trim($this->input->post('guest_name', TRUE)), 'message' => trim($this->input->post('message', TRUE)), 'status' => $default_status, 'is_approved' => $default_status === 'approved' ? 1 : 0, 'created_at' => date('Y-m-d H:i:s')));
        $msg = $default_status === 'approved' ? 'Ucapan berhasil dikirim.' : 'Ucapan berhasil dikirim dan menunggu approval admin.';
        $this->session->set_flashdata('success', $msg);
        redirect($redirect);
    }
}
