<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    protected $table = 'orders';

    public function all()
    {
        return $this->db
            ->select('orders.*, customers.name as customer_name, templates.name as template_name, users.name as assigned_user_name')
            ->join('customers', 'customers.id = orders.customer_id', 'left')
            ->join('templates', 'templates.id = orders.template_id', 'left')
            ->join('users', 'users.id = orders.assigned_user_id', 'left')
            ->order_by('orders.id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function find($id)
    {
        return $this->db
            ->select('orders.*, customers.name as customer_name, customers.phone as customer_phone, customers.email as customer_email, customers.address as customer_address, templates.name as template_name, users.name as assigned_user_name')
            ->join('customers', 'customers.id = orders.customer_id', 'left')
            ->join('templates', 'templates.id = orders.template_id', 'left')
            ->join('users', 'users.id = orders.assigned_user_id', 'left')
            ->where('orders.id', $id)
            ->get($this->table)
            ->row();
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

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function sum_revenue()
    {
        return (float) ($this->db->select_sum('final_price')->where('payment_status', 'paid')->get($this->table)->row()->final_price ?? 0);
    }

    public function sum_paid_amount()
    {
        return (float) ($this->db->select_sum('paid_amount')->get($this->table)->row()->paid_amount ?? 0);
    }

    public function count_by_status($status)
    {
        return $this->db->where('status', $status)->count_all_results($this->table);
    }

    public function next_order_no()
    {
        $prefix = 'ORD-' . date('Ymd') . '-';
        $row = $this->db->like('order_no', $prefix, 'after')->order_by('id', 'DESC')->get($this->table)->row();
        $last = 0;
        if ($row && preg_match('/(\d+)$/', $row->order_no, $m)) {
            $last = (int) $m[1];
        }
        return $prefix . str_pad((string) ($last + 1), 4, '0', STR_PAD_LEFT);
    }

    public function monthly_summary($limit = 6)
    {
        $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') as period, COUNT(*) as total_orders, COALESCE(SUM(final_price),0) as total_revenue FROM {$this->table} GROUP BY DATE_FORMAT(created_at, '%Y-%m') ORDER BY period DESC LIMIT " . (int) $limit;
        return array_reverse($this->db->query($sql)->result());
    }

}
