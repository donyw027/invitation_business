<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model
{
    protected $table = 'projects';

    public function all()
    {
        return $this->db
            ->select('projects.*, customers.name as customer_name, templates.name as template_name')
            ->join('orders', 'orders.id = projects.order_id', 'left')
            ->join('customers', 'customers.id = orders.customer_id', 'left')
            ->join('templates', 'templates.id = projects.template_id', 'left')
            ->order_by('projects.id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function find_by_slug($slug)
    {
        return $this->db->get_where($this->table, array('slug' => $slug))->row();
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

    public function count_published()
    {
        return $this->db->where('status', 'published')->count_all_results($this->table);
    }
}
