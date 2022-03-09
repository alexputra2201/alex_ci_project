<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    public $table = 'cart';
    public $id = 'cart.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $id = $this->session->userdata('id');
        $this->db->select('k.*,p.nama as nama,p.harga as harga');
        $this->db->from('cart k');
        $this->db->join('barang p', 'k.id_barang = p.id_barang');
        $this->db->where('k.id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_all($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data); 
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function jumlah()
    {
        $id = $this->session->userdata('id');
        $query = $this->db->get($this->table);
        $this->db->where('id_user', $id);
        return $query->num_rows();
    }
}
