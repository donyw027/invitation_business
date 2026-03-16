<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_timeline_model extends CI_Model
{
    protected $table = 'project_timelines';

    public function by_project($project_id)
    {
        return $this->db->select('project_timelines.*, users.name as user_name, approver.name as approved_by_name')
            ->join('users', 'users.id = project_timelines.user_id', 'left')
            ->join('users as approver', 'approver.id = project_timelines.approved_by', 'left')
            ->where('project_id', (int) $project_id)
            ->order_by('id', 'DESC')
            ->get($this->table)->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', (int) $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }
}
