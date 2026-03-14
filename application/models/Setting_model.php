<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    protected $table = 'settings';

    public function get($key, $default = '')
    {
        $row = $this->db->get_where($this->table, array('setting_key' => $key))->row();
        return $row ? $row->setting_value : $default;
    }

    public function set($key, $value)
    {
        $exists = $this->db->get_where($this->table, array('setting_key' => $key))->row();
        if ($exists) {
            return $this->db->where('setting_key', $key)->update($this->table, array('setting_value' => $value));
        }
        return $this->db->insert($this->table, array('setting_key' => $key, 'setting_value' => $value));
    }
}
