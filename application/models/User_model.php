<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'users';

    public function all()
    {
        return $this->db->order_by('id', 'DESC')->get($this->table)->result();
    }

    public function active_all()
    {
        return $this->db->where('is_active', 1)->order_by('name', 'ASC')->get($this->table)->result();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function find_by_username($username)
    {
        return $this->db->get_where($this->table, array('username' => $username))->row();
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

    public function role_options()
    {
        return array(
            'super_admin' => 'Super Admin',
            'admin' => 'Admin',
            'designer' => 'Designer',
            'operator' => 'Operator',
            'cs' => 'Customer Service',
        );
    }
}
