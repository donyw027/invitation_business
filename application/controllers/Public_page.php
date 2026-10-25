<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Project_model', 'Wish_model', 'Rsvp_model', 'Guest_model', 'Template_model', 'Package_model', 'Product_type_model', 'Setting_model', 'Project_gallery_model'));
    }





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


    /** SEO metadata untuk halaman marketing; tidak mengubah routing undangan dan transaksi. */
    private function seo_for_view($view, $data)
    {
        $settings = array(
            'home' => array(
                'title' => 'MySimpleGift | Buket Murah Malang, Jastip & Undangan Digital',
                'description' => 'Cari buket murah di Malang yang bisa custom sesuai budget? MySimpleGift juga melayani jastip Malang–Trawas, undangan digital, spreadsheet, dan website custom.'
            ),
            'mysimplegift' => array(
                'title' => 'Buket Murah Malang & Custom Sesuai Budget | MySimpleGift',
                'description' => 'Pesan buket murah di Malang untuk wisuda, ulang tahun, Hari Ibu, dan segala acara. Bisa custom warna, model dan budget, dengan pengiriman area Kota Malang sesuai kesepakatan.'
            ),
            'jastipindahaja' => array(
                'title' => 'Jastip Murah Malang & Trawas, Event dan Promo | Jastip Indah Aja',
                'description' => 'Jastip murah dan bersahabat dari Malang & Trawas. Titip skincare, fashion, makanan viral, event belanja, promo diskon, atau request pribadi. Bisa kirim ke berbagai daerah.'
            ),
            'spreadsheet' => array(
                'title' => 'Jasa Spreadsheet & Template Custom Malang | MySimpleGift',
                'description' => 'Butuh template Excel atau Google Sheets? Konsultasikan spreadsheet custom untuk order, stok, keuangan, dashboard, laporan, dan kebutuhan usaha maupun pribadi.'
            ),
            'web_development' => array(
                'title' => 'Jasa Pembuatan Website & Sistem Web Malang | MySimpleGift',
                'description' => 'Jasa pembuatan website company profile, landing page, dashboard, inventory, dan sistem berbasis web custom untuk usaha maupun operasional bisnis. Konsultasi kebutuhanmu.'
            ),
            'review' => array(
                'title' => 'Galeri Buket Malang, Jastip & Preview Digital | MySimpleGift',
                'description' => 'Lihat contoh buket custom, galeri jastip Malang dan Trawas, preview undangan digital, spreadsheet, serta website dan sistem berbasis web dari MySimpleGift.'
            ),
            'cara_order' => array(
                'title' => 'Cara Order & Kontak | MySimpleGift Malang',
                'description' => 'Cara pesan buket custom Malang, jastip Malang–Trawas, undangan digital, spreadsheet, dan jasa website. Konsultasi melalui WhatsApp atau DM Instagram.'
            ),
            'kontak' => array(
                'title' => 'Kontak MySimpleGift & Jastip Indah Aja Malang',
                'description' => 'Hubungi admin MySimpleGift untuk buket Malang, jastip Malang dan Trawas, undangan digital, spreadsheet, maupun website custom.'
            ),
            'faq' => array(
                'title' => 'FAQ Pemesanan Buket, Jastip & Digital | MySimpleGift',
                'description' => 'Pertanyaan umum tentang pemesanan buket custom, jastip, undangan digital, dan layanan MySimpleGift di Malang.'
            ),
            'local_area' => array(
                'title' => 'Jastip Murah ' . (isset($data['area']) ? $data['area'] : 'Malang') . ' | Jastip Indah Aja',
                'description' => 'Jasa titip harga bersahabat di ' . (isset($data['area']) ? $data['area'] : 'Malang') . ' untuk makanan, oleh-oleh, promo, skincare, dan beragam request belanja sesuai jadwal.'
            ),
        );
        $seo = isset($settings[$view]) ? $settings[$view] : array(
            'title' => (isset($data['page_title']) ? $data['page_title'] : 'MySimpleGift') . ' | MySimpleGift',
            'description' => 'Buket custom Malang, jastip Malang–Trawas, undangan digital, template spreadsheet dan jasa website sesuai kebutuhan.'
        );
        $data['seo_title'] = $seo['title'];
        $data['seo_description'] = $seo['description'];
        $data['seo_canonical'] = current_url();
        $data['seo_robots'] = 'index, follow';
        $data['seo_brand'] = $view === 'jastipindahaja' || $view === 'local_area' ? 'Jastip Indah Aja' : 'MySimpleGift';
        if ($view === 'jastipindahaja' || $view === 'local_area') {
            $data['seo_image'] = is_file(FCPATH . 'assets/img/logojastip.jpg') ? base_url('assets/img/logojastip.jpg') : '';
        } elseif ($view === 'mysimplegift' || $view === 'home') {
            $data['seo_image'] = is_file(FCPATH . 'assets/img/buket1.jpg') ? base_url('assets/img/buket1.jpg') : '';
        }
        return $data;
    }

    private function render($view, $data = array())
    {
        $base = $this->base_data();
        $data = $this->seo_for_view($view, array_merge($base, $data));

        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/' . $view, $data);
        $this->load->view('frontend/partials/footer', $data);
    }

    public function home()
    {
        $data['page_title'] = 'Home';
        $this->render('home', $data);
    }

    // Brand/service landing pages; invitation system methods remain unchanged.
    public function mysimplegift()
    {
        $this->render('mysimplegift', array('page_title' => 'MySimpleGift', 'page_brand' => 'mysimplegift'));
    }

    public function jastipindahaja()
    {
        $this->render('jastipindahaja', array('page_title' => 'Jastip Indah Aja', 'page_brand' => 'jastip'));
    }

    public function spreadsheet()
    {
        $this->render('spreadsheet', array('page_title' => 'Spreadsheet & Template', 'page_brand' => 'spreadsheet'));
    }

    public function web_development()
    {
        $this->render('web_development', array('page_title' => 'Jasa Website & Sistem', 'page_brand' => 'web'));
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
