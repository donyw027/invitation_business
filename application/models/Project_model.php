<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model
{
    protected $table = 'projects';

    public function all()
    {
        return $this->db
            ->select('projects.*, customers.name as customer_name, templates.name as template_name, users.name as assigned_user_name, orders.order_no as order_no')
            ->join('orders', 'orders.id = projects.order_id', 'left')
            ->join('customers', 'customers.id = orders.customer_id', 'left')
            ->join('templates', 'templates.id = projects.template_id', 'left')
            ->join('users', 'users.id = projects.assigned_user_id', 'left')
            ->order_by('projects.id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }


    public function find_by_order($order_id)
    {
        return $this->db->get_where($this->table, array('order_id' => (int) $order_id))->row();
    }

    public function exists_by_order($order_id)
    {
        return $this->db->where('order_id', (int) $order_id)->count_all_results($this->table) > 0;
    }

    public function detail_by_slug($slug)
    {
        return $this->db
            ->select('projects.*, templates.folder as template_folder, templates.name as template_name, customers.name as customer_name, customers.phone as customer_phone')
            ->join('orders', 'orders.id = projects.order_id', 'left')
            ->join('customers', 'customers.id = orders.customer_id', 'left')
            ->join('templates', 'templates.id = projects.template_id', 'left')
            ->where('projects.slug', $slug)
            ->get($this->table)
            ->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function get_by_order_id($order_id)
    {
        return $this->db
            ->where('order_id', $order_id)
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->row();
    }

    public function count_published()
    {
        return $this->db->where('status', 'published')->count_all_results($this->table);
    }

    public function count_by_status($status)
    {
        return $this->db->where('status', $status)->count_all_results($this->table);
    }

    public function slug_exists($slug, $ignore_id = 0)
    {
        $this->db->where('slug', $slug);
        if ($ignore_id) {
            $this->db->where('id !=', (int) $ignore_id);
        }
        return $this->db->count_all_results($this->table) > 0;
    }

    public function status_summary()
    {
        return $this->db->select('status, COUNT(*) as total')->group_by('status')->get($this->table)->result();
    }
}
