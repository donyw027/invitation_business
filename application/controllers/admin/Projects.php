<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();
        $this->load->model(array('Project_model', 'Order_model', 'Template_model'));
    }

    public function index()
    {
        $data = $this->admin_data('Projects');
        $data['projects'] = $this->Project_model->all();
        $this->load->view('admin/projects/index', $data);
    }

    public function create()
    {
        $data = $this->admin_data('Tambah Project');
        $data['orders'] = $this->Order_model->all();
        $data['templates'] = $this->Template_model->all();
        $this->load->view('admin/projects/form', $data);
    }

    public function store()
    {
        $title = trim($this->input->post('title', TRUE));
        $slug  = trim($this->input->post('slug', TRUE)) ?: slugify($title);

        $this->Project_model->insert(array(
            'order_id' => (int) $this->input->post('order_id'),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'template_id' => (int) $this->input->post('template_id'),
            'slug' => $slug,
            'title' => $title,
            'subtitle' => trim($this->input->post('subtitle', TRUE)),
            'cover_text' => trim($this->input->post('cover_text', TRUE)),
            'hero_image' => trim($this->input->post('hero_image', TRUE)),
            'music_url' => trim($this->input->post('music_url', TRUE)),
            'event_date' => trim($this->input->post('event_date', TRUE)),
            'event_time' => trim($this->input->post('event_time', TRUE)),
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
            'status' => trim($this->input->post('status', TRUE)),
            'created_at' => date('Y-m-d H:i:s')
        ));
        redirect('admin/projects');
    }

    public function edit($id)
    {
        $data = $this->admin_data('Edit Project');
        $data['project'] = $this->Project_model->find($id);
        $data['orders'] = $this->Order_model->all();
        $data['templates'] = $this->Template_model->all();
        $this->load->view('admin/projects/form', $data);
    }

    public function update($id)
    {
        $title = trim($this->input->post('title', TRUE));
        $slug  = trim($this->input->post('slug', TRUE)) ?: slugify($title);

        $this->Project_model->update($id, array(
            'order_id' => (int) $this->input->post('order_id'),
            'product_type' => trim($this->input->post('product_type', TRUE)),
            'template_id' => (int) $this->input->post('template_id'),
            'slug' => $slug,
            'title' => $title,
            'subtitle' => trim($this->input->post('subtitle', TRUE)),
            'cover_text' => trim($this->input->post('cover_text', TRUE)),
            'hero_image' => trim($this->input->post('hero_image', TRUE)),
            'music_url' => trim($this->input->post('music_url', TRUE)),
            'event_date' => trim($this->input->post('event_date', TRUE)),
            'event_time' => trim($this->input->post('event_time', TRUE)),
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
            'status' => trim($this->input->post('status', TRUE)),
            'updated_at' => date('Y-m-d H:i:s')
        ));
        redirect('admin/projects');
    }

    public function publish($id)
    {
        $this->Project_model->update($id, array('status' => 'published'));
        redirect('admin/projects');
    }

    public function unpublish($id)
    {
        $this->Project_model->update($id, array('status' => 'draft'));
        redirect('admin/projects');
    }

    public function delete($id)
    {
        $this->Project_model->delete($id);
        redirect('admin/projects');
    }
}
