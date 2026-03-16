<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rsvp_model extends CI_Model
{
    protected $table = 'rsvps';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function latest($limit = 8)
    {
        return $this->db
            ->select('rsvps.*, projects.title as project_title')
            ->join('projects', 'projects.id = rsvps.project_id', 'left')
            ->order_by('rsvps.id', 'DESC')->limit($limit)->get($this->table)->result();
    }

    public function total_attendees()
    {
        return (int) ($this->db->select_sum('guest_total')->get($this->table)->row()->guest_total ?? 0);
    }
}
