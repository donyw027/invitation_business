<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends CI_Model
{
    protected $table = 'templates';

    public function all()
    {
        return $this->db->order_by('product_type ASC, id ASC')->get($this->table)->result();
    }

    public function active_by_product($product_type)
    {
        return $this->db
            ->where('is_active', 1)
            ->group_start()
                ->where('product_type', $product_type)
                ->or_where('product_type', 'all')
            ->group_end()
            ->order_by('id', 'ASC')
            ->get($this->table)
            ->result();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }
}
