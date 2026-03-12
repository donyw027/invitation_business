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
        return $this->db->order_by('id', 'DESC')->limit($limit)->get($this->table)->result();
    }
}
