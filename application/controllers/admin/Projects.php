<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends MY_Controller
{
    private $status_options = array('draft', 'waiting_content', 'designing', 'revision', 'approved', 'published', 'archived');

    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->require_access('projects');
        $this->load->model(array('Project_model', 'Order_model', 'Template_model', 'Product_type_model', 'Activity_log_model', 'User_model', 'Project_gallery_model', 'Project_timeline_model'));
    }

    private function build_unique_slug($slug, $ignore_id = 0)
    {
        $slug = $slug ?: 'project';
        $base = slugify($slug);
        $final = $base;
        $i = 1;
        while ($this->Project_model->slug_exists($final, $ignore_id)) {
            $final = $base . '-' . $i;
            $i++;
        }
        return $final;
    }

    private function payload($current = null)
    {
        $title = trim($this->input->post('title', TRUE));
        $slug  = $this->build_unique_slug(trim($this->input->post('slug', TRUE)) ?: slugify($title), $current ? (int)$current->id : 0);
        $hero = $this->upload_image('hero_image_file', 'uploads/projects', $current ? (string) $current->hero_image : '');
        if ($hero === FALSE) return FALSE;
        $hero = $hero ?: trim($this->input->post('hero_image', TRUE));
        return array(
            'order_id' => (int) $this->input->post('order_id'),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'template_id' => (int) $this->input->post('template_id'),
            'assigned_user_id' => (int) $this->input->post('assigned_user_id'),
            'slug' => $slug,
            'title' => $title,
            'subtitle' => trim($this->input->post('subtitle', TRUE)),
            'cover_text' => trim($this->input->post('cover_text', TRUE)),
            'hero_image' => $hero,
            'music_url' => trim($this->input->post('music_url', TRUE)),
            'event_date' => trim($this->input->post('event_date', TRUE)) ?: NULL,
            'event_time' => trim($this->input->post('event_time', TRUE)),
            'deadline_date' => trim($this->input->post('deadline_date', TRUE)) ?: NULL,
            'location_name' => trim($this->input->post('location_name', TRUE)),
            'location_address' => trim($this->input->post('location_address', TRUE)),
            'map_embed' => trim($this->input->post('map_embed', TRUE)),
            'description' => trim($this->input->post('description', TRUE)),
            'sender_name' => trim($this->input->post('sender_name', TRUE)),
            'receiver_name' => trim($this->input->post('receiver_name', TRUE)),
            'message_title' => trim($this->input->post('message_title', TRUE)),
            'message_body' => trim($this->input->post('message_body', TRUE)),
            'rsvp_enabled' => (int) $this->input->post('rsvp_enabled'),
            'wish_enabled' => (int) $this->input->post('wish_enabled'),
            'gift_enabled' => (int) $this->input->post('gift_enabled'),
            'gift_info' => trim($this->input->post('gift_info', TRUE)),
            'revision_notes' => trim($this->input->post('revision_notes', TRUE)),
            'status' => trim($this->input->post('status', TRUE)),
        );
    }

    public function index()
    {
        $data = $this->admin_data('Projects');
        $data['projects'] = $this->Project_model->all();
        $this->load->view('admin/projects/index', $data);
    }

    public function create()
    {
        $this->require_access('projects', 'create');
        $data = $this->admin_data('Tambah Project');
        $data['orders'] = $this->Order_model->all();
        $data['templates'] = $this->Template_model->all();
        $data['product_types'] = $this->Product_type_model->active();
        $data['users'] = $this->User_model->active_all();
        $data['status_options'] = $this->status_options;
        $this->load->view('admin/projects/form', $data);
    }

    public function store()
    {
        $this->require_access('projects', 'create');
        $payload = $this->payload();
        if ($payload === FALSE) redirect('admin/projects/create');
        $payload['created_at'] = date('Y-m-d H:i:s');
        $project_id = $this->Project_model->insert($payload);
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'projects','action' => 'create','description' => 'Membuat project #' . $project_id . ' (' . $payload['slug'] . ')','created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Project berhasil ditambahkan.');
        redirect('admin/projects/edit/' . $project_id);
    }

    public function edit($id)
    {
        $this->require_access('projects', 'update');
        $data = $this->admin_data('Edit Project');
        $data['project'] = $this->Project_model->find($id);
        if (!$data['project']) show_404();
        $data['orders'] = $this->Order_model->all();
        $data['templates'] = $this->Template_model->all();
        $data['product_types'] = $this->Product_type_model->active();
        $data['users'] = $this->User_model->active_all();
        $data['status_options'] = $this->status_options;
        $data['galleries'] = $this->Project_gallery_model->by_project($id);
        $data['timelines'] = $this->Project_timeline_model->by_project($id);
        $this->load->view('admin/projects/form', $data);
    }

    public function update($id)
    {
        $this->require_access('projects', 'update');
        $row = $this->Project_model->find($id);
        if (!$row) show_404();
        $payload = $this->payload($row);
        if ($payload === FALSE) redirect('admin/projects/edit/' . $id);
        $payload['updated_at'] = date('Y-m-d H:i:s');
        $this->Project_model->update($id, $payload);
        $this->Activity_log_model->insert(array('user_id' => (int)$this->session->userdata('admin_id'),'module' => 'projects','action' => 'update','description' => 'Mengubah project #' . $id . ' (' . $payload['slug'] . ')','created_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Project berhasil diupdate.');
        redirect('admin/projects/edit/' . $id);
    }

    public function add_gallery($project_id)
    {
        $this->require_access('projects', 'update');
        $project = $this->Project_model->find($project_id);
        if (!$project) show_404();
        $image = $this->upload_image('gallery_image', 'uploads/projects/gallery');
        if ($image === FALSE) redirect('admin/projects/edit/' . $project_id);
        if (!$image) {
            $this->set_flash('danger', 'Pilih file gallery terlebih dahulu.');
            redirect('admin/projects/edit/' . $project_id);
        }
        $this->Project_gallery_model->insert(array(
            'project_id' => $project_id,
            'image_path' => $image,
            'caption' => trim($this->input->post('caption', TRUE)),
            'sort_order' => (int) $this->input->post('sort_order'),
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Gallery berhasil ditambahkan.');
        redirect('admin/projects/edit/' . $project_id);
    }

    public function delete_gallery($id)
    {
        $this->require_access('projects', 'update');
        $gallery = $this->Project_gallery_model->find($id);
        if (!$gallery) show_404();
        $project_id = $gallery->project_id;
        if (!empty($gallery->image_path) && strpos($gallery->image_path, 'uploads/projects/gallery/') === 0) {
            $file = FCPATH . $gallery->image_path;
            if (is_file($file)) @unlink($file);
        }
        $this->Project_gallery_model->delete($id);
        $this->set_flash('success', 'Gallery berhasil dihapus.');
        redirect('admin/projects/edit/' . $project_id);
    }

    public function add_timeline($project_id)
    {
        $this->require_access('projects', 'update');
        $project = $this->Project_model->find($project_id);
        if (!$project) show_404();
        $note = trim($this->input->post('note', TRUE));
        if ($note === '') {
            $this->set_flash('danger', 'Catatan timeline tidak boleh kosong.');
            redirect('admin/projects/edit/' . $project_id);
        }
        $this->Project_timeline_model->insert(array(
            'project_id' => $project_id,
            'user_id' => (int) $this->session->userdata('admin_id'),
            'status_label' => trim($this->input->post('status_label', TRUE)),
            'note' => $note,
            'approval_status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Timeline project berhasil ditambahkan.');
        redirect('admin/projects/edit/' . $project_id);
    }

    public function delete_timeline($id)
    {
        $this->require_access('projects', 'update');
        $row = $this->Project_timeline_model->find($id);
        if (!$row) show_404();
        $project_id = $row->project_id;
        $this->Project_timeline_model->delete($id);
        $this->set_flash('success', 'Timeline project dihapus.');
        redirect('admin/projects/edit/' . $project_id);
    }


    public function approve_timeline($id)
    {
        $this->require_access('projects', 'update');
        $row = $this->Project_timeline_model->find($id);
        if (!$row) show_404();
        $this->Project_timeline_model->update($id, array(
            'approval_status' => 'approved',
            'approved_by' => (int) $this->session->userdata('admin_id'),
            'approved_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Timeline berhasil di-approve.');
        redirect('admin/projects/edit/' . $row->project_id);
    }

    public function reject_timeline($id)
    {
        $this->require_access('projects', 'update');
        $row = $this->Project_timeline_model->find($id);
        if (!$row) show_404();
        $this->Project_timeline_model->update($id, array(
            'approval_status' => 'rejected',
            'approved_by' => (int) $this->session->userdata('admin_id'),
            'approved_at' => date('Y-m-d H:i:s')
        ));
        $this->set_flash('success', 'Timeline ditandai rejected.');
        redirect('admin/projects/edit/' . $row->project_id);
    }

    public function publish($id)
    {
        $this->require_access('projects', 'publish');
        $this->Project_model->update($id, array('status' => 'published', 'updated_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Project berhasil dipublish.');
        redirect('admin/projects');
    }

    public function unpublish($id)
    {
        $this->require_access('projects', 'publish');
        $this->Project_model->update($id, array('status' => 'draft', 'updated_at' => date('Y-m-d H:i:s')));
        $this->set_flash('success', 'Project dikembalikan ke draft.');
        redirect('admin/projects');
    }

    public function delete($id)
    {
        $this->require_access('projects', 'delete');
        $row = $this->Project_model->find($id);
        if ($row && !empty($row->hero_image) && strpos($row->hero_image, 'uploads/projects/') === 0) {
            $file = FCPATH . $row->hero_image;
            if (is_file($file)) @unlink($file);
        }
        foreach ($this->Project_gallery_model->by_project($id) as $gallery) {
            if (!empty($gallery->image_path) && strpos($gallery->image_path, 'uploads/projects/gallery/') === 0) {
                $file = FCPATH . $gallery->image_path;
                if (is_file($file)) @unlink($file);
            }
            $this->Project_gallery_model->delete($gallery->id);
        }
        $this->Project_model->delete($id);
        $this->set_flash('success', 'Project berhasil dihapus.');
        redirect('admin/projects');
    }
}
