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
            ->where('status', 'approved')
            ->order_by('id', 'DESC')
            ->limit($limit)
            ->get($this->table)
            ->result();
    }

    public function latest($limit = 8)
    {
        return $this->db
            ->select('wishes.*, projects.title as project_title')
            ->join('projects', 'projects.id = wishes.project_id', 'left')
            ->order_by('wishes.id', 'DESC')->limit($limit)->get($this->table)->result();
    }

    public function all()
    {
        return $this->db
            ->select('wishes.*, projects.title as project_title')
            ->join('projects', 'projects.id = wishes.project_id', 'left')
            ->order_by('wishes.id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function count_pending()
    {
        return $this->db->where('status', 'pending')->count_all_results($this->table);
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }
}
