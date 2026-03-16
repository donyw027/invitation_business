<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_log_model extends CI_Model
{
    protected $table = 'activity_logs';

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function latest($limit = 10)
    {
        return $this->db
            ->select('activity_logs.*, users.name as actor_name')
            ->join('users', 'users.id = activity_logs.user_id', 'left')
            ->order_by('activity_logs.id', 'DESC')->limit($limit)->get($this->table)->result();
    }
}
