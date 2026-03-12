<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'users';

    public function find_by_username($username)
    {
        return $this->db->get_where($this->table, array('username' => $username))->row();
    }
}
