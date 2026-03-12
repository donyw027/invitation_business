<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    protected $table = 'orders';

    public function all()
    {
        return $this->db
            ->select('orders.*, customers.name as customer_name, templates.name as template_name')
            ->join('customers', 'customers.id = orders.customer_id', 'left')
            ->join('templates', 'templates.id = orders.template_id', 'left')
            ->order_by('orders.id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
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
}
