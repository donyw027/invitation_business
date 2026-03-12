<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_model extends CI_Model
{
    protected $table = 'guests';

    public function all()
    {
        return $this->db
            ->select('guests.*, projects.title as project_title, projects.slug as project_slug, projects.product_type')
            ->join('projects', 'projects.id = guests.project_id', 'left')
            ->order_by('guests.id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function by_project($project_id)
    {
        return $this->db->where('project_id', $project_id)->order_by('guest_name', 'ASC')->get($this->table)->result();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function find_by_slug($project_id, $slug)
    {
        return $this->db->get_where($this->table, array('project_id' => $project_id, 'slug' => $slug))->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function exists_slug($project_id, $slug, $ignore_id = 0)
    {
        $this->db->where('project_id', $project_id)->where('slug', $slug);
        if ($ignore_id) {
            $this->db->where('id !=', $ignore_id);
        }
        return $this->db->count_all_results($this->table) > 0;
    }

    public function make_unique_slug($project_id, $guest_name, $ignore_id = 0)
    {
        $base = slugify($guest_name ?: 'guest');
        $slug = $base;
        $i = 2;
        while ($this->exists_slug($project_id, $slug, $ignore_id)) {
            $slug = $base . '-' . $i;
            $i++;
        }
        return $slug;
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

    public function touch_opened($id)
    {
        return $this->db->where('id', $id)->update($this->table, array(
            'is_opened' => 1,
            'opened_at' => date('Y-m-d H:i:s')
        ));
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
}
