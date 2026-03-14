<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_model extends CI_Model
{
    protected $table = 'packages';

    public function all()
    {
        return $this->db->order_by('sort_order', 'ASC')->order_by('id', 'ASC')->get($this->table)->result();
    }

    public function active()
    {
        return $this->db->where('is_active', 1)->order_by('sort_order', 'ASC')->order_by('id', 'ASC')->get($this->table)->result();
    }

    public function by_product($product_type)
    {
        return $this->db->where('is_active', 1)->where('product_type', $product_type)->order_by('sort_order', 'ASC')->get($this->table)->result();
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
}
