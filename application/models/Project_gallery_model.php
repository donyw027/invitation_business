<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_gallery_model extends CI_Model
{
    protected $table = 'project_galleries';

    public function by_project($project_id)
    {
        return $this->db->where('project_id', $project_id)->order_by('sort_order', 'ASC')->order_by('id', 'ASC')->get($this->table)->result();
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
