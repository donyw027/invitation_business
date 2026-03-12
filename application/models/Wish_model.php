<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wish_model extends CI_Model
{
    protected $table = 'wishes';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function approved_by_project($project_id, $limit = 20)
    {
        return $this->db
            ->where('project_id', $project_id)
            ->where('is_approved', 1)
            ->order_by('id', 'DESC')
            ->limit($limit)
            ->get($this->table)
            ->result();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function latest($limit = 8)
    {
        return $this->db->order_by('id', 'DESC')->limit($limit)->get($this->table)->result();
    }
}
