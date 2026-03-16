<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends CI_Model
{
    protected $table = 'templates';

    public function all()
    {
        return $this->db->order_by('sort_order', 'ASC')->order_by('id', 'ASC')->get($this->table)->result();
    }

    public function active()
    {
        return $this->db->where('is_active', 1)->order_by('sort_order', 'ASC')->order_by('id', 'ASC')->get($this->table)->result();
    }

    public function active_by_product($product_type)
    {
        return $this->db
            ->where('is_active', 1)
            ->group_start()
                ->where('product_type', $product_type)
                ->or_where('product_type', 'all')
            ->group_end()
            ->order_by('sort_order', 'ASC')
            ->order_by('id', 'ASC')
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

    public function clone_from($id)
    {
        $row = $this->find($id);
        if (!$row) {
            return 0;
        }
        $data = (array) $row;
        unset($data['id']);
        $data['name'] = $row->name . ' Copy';
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
