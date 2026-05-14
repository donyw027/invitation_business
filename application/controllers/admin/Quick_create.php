<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quick_create extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_guard();

        // akses cukup ikut orders + projects
        $this->require_access('orders', 'create');

        $this->load->model([
            'Customer_model',
            'Order_model',
            'Project_model',
            'Template_model',
            'Product_type_model',
            'User_model',
            'Activity_log_model'
        ]);
    }

    public function index()
    {
        redirect('admin/quick-create/customer');
    }

    public function reset()
    {
        $this->session->unset_userdata('quick_customer_id');
        $this->session->unset_userdata('quick_order_id');
        $this->session->unset_userdata('quick_project_id');

        redirect('admin/quick-create/customer');
    }

    public function customer()
    {
        $data = $this->admin_data('Quick Create - Customer');
        $data['customers'] = $this->Customer_model->all();

        if ($this->input->method() === 'post') {
            $mode = $this->input->post('customer_mode', TRUE);

            if ($mode === 'existing') {
                $customer_id = (int) $this->input->post('customer_id');

                if ($customer_id <= 0) {
                    $this->set_flash('danger', 'Pilih customer terlebih dahulu.');
                    redirect('admin/quick-create/customer');
                }
            } else {
                $customer_id = $this->Customer_model->insert([
                    'name'       => trim($this->input->post('name', TRUE)),
                    'phone'      => trim($this->input->post('phone', TRUE)),
                    'email'      => trim($this->input->post('email', TRUE)),
                    'source'     => trim($this->input->post('source', TRUE)),
                    'address'    => trim($this->input->post('address', TRUE)),
                    'notes'      => trim($this->input->post('notes', TRUE)),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }

            $this->session->set_userdata('quick_customer_id', $customer_id);
            redirect('admin/quick-create/order');
        }

        $this->load->view('admin/quick_create/customer', $data);
    }

    public function order()
    {
        $customer_id = (int) $this->session->userdata('quick_customer_id');
        if (!$customer_id) redirect('admin/quick-create/customer');

        $data = $this->admin_data('Quick Create - Order');
        $data['customer'] = $this->Customer_model->find($customer_id);
        $data['templates'] = $this->Template_model->all();
        $data['product_types'] = $this->Product_type_model->active();
        $data['users'] = $this->User_model->active_all();
        $data['next_order_no'] = $this->Order_model->next_order_no();

        if ($this->input->method() === 'post') {
            $price = (float) $this->input->post('price');
            $discount = (float) $this->input->post('discount');
            $final_price = (float) $this->input->post('final_price');

            if ($final_price <= 0) {
                $final_price = max(0, $price - $discount);
            }

            $order_id = $this->Order_model->insert([
                'order_no'         => trim($this->input->post('order_no', TRUE)),
                'customer_id'      => $customer_id,
                'product_type'     => trim($this->input->post('product_type', TRUE)),
                'package_name'     => trim($this->input->post('package_name', TRUE)),
                'template_id'      => (int) $this->input->post('template_id'),
                'assigned_user_id' => (int) $this->input->post('assigned_user_id'),
                'payment_status'   => trim($this->input->post('payment_status', TRUE)),
                'status'           => trim($this->input->post('status', TRUE)),
                'price'            => $price,
                'discount'         => $discount,
                'final_price'      => $final_price,
                'dp_amount'        => (float) $this->input->post('dp_amount'),
                'paid_amount'      => (float) $this->input->post('paid_amount'),
                'payment_method'   => trim($this->input->post('payment_method', TRUE)),
                'payment_date'     => trim($this->input->post('payment_date', TRUE)) ?: NULL,
                'deadline_date'    => trim($this->input->post('deadline_date', TRUE)) ?: NULL,
                'notes'            => trim($this->input->post('notes', TRUE)),
                'created_at'       => date('Y-m-d H:i:s')
            ]);

            $this->session->set_userdata('quick_order_id', $order_id);
            redirect('admin/quick-create/project');
        }

        $this->load->view('admin/quick_create/order', $data);
    }

    public function project()
    {
        $order_id = (int) $this->session->userdata('quick_order_id');
        if (!$order_id) redirect('admin/quick-create/order');

        $order = $this->Order_model->find($order_id);
        if (!$order) show_404();

        $existing_project = $this->Project_model->get_by_order_id($order_id);

        if ($existing_project) {
            $this->set_flash('info', 'Project dari order ini sudah ada. Kamu diarahkan ke project existing.');
            redirect('admin/projects/edit/' . $existing_project->id);
        }

        $data = $this->admin_data('Quick Create - Project');
        $data['order'] = $order;
        $data['templates'] = $this->Template_model->all();
        $data['product_types'] = $this->Product_type_model->active();
        $data['users'] = $this->User_model->active_all();

        if ($this->input->method() === 'post') {
            $slug = trim($this->input->post('slug', TRUE));
            if ($slug === '') {
                $slug = slugify($this->input->post('title', TRUE) . '-' . $order->order_no);
            }

            $base_slug = $slug;
            $i = 1;
            while ($this->Project_model->slug_exists($slug)) {
                $slug = $base_slug . '-' . $i++;
            }

            $project_id = $this->Project_model->insert([
                'order_id'          => $order_id,
                'source'            => 'quick_create',
                'product_type'      => trim($this->input->post('product_type', TRUE)),
                'template_id'       => (int) $this->input->post('template_id'),
                'assigned_user_id'  => (int) $this->input->post('assigned_user_id'),
                'slug'              => $slug,
                'title'             => trim($this->input->post('title', TRUE)),
                'subtitle'          => trim($this->input->post('subtitle', TRUE)),
                'cover_text'        => trim($this->input->post('cover_text', TRUE)),
                'event_date'        => trim($this->input->post('event_date', TRUE)) ?: NULL,
                'event_time'        => trim($this->input->post('event_time', TRUE)),
                'deadline_date'     => trim($this->input->post('deadline_date', TRUE)) ?: NULL,
                'location_name'     => trim($this->input->post('location_name', TRUE)),
                'location_address'  => trim($this->input->post('location_address', TRUE)),
                'description'       => trim($this->input->post('description', TRUE)),
                'sender_name'       => trim($this->input->post('sender_name', TRUE)),
                'receiver_name'     => trim($this->input->post('receiver_name', TRUE)),
                'message_title'     => trim($this->input->post('message_title', TRUE)),
                'message_body'      => trim($this->input->post('message_body', TRUE)),
                'rsvp_enabled'      => (int) $this->input->post('rsvp_enabled'),
                'wish_enabled'      => (int) $this->input->post('wish_enabled'),
                'gift_enabled'      => (int) $this->input->post('gift_enabled'),
                'gift_info'         => trim($this->input->post('gift_info', TRUE)),
                'revision_notes'    => trim($this->input->post('revision_notes', TRUE)),
                'status'            => trim($this->input->post('status', TRUE)),
                'created_at'        => date('Y-m-d H:i:s')
            ]);

            $this->session->set_userdata('quick_project_id', $project_id);
            $this->set_flash('success', 'Quick Create selesai. Project berhasil dibuat.');

            redirect('admin/projects/edit/' . $project_id);
        }

        $this->load->view('admin/quick_create/project', $data);
    }
}
