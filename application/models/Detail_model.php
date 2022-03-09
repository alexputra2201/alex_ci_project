<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_model extends CI_Model
{
    public $table = 'detail_penjualan';
    public $id = 'detail_penjualan.no_penjualan';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->select('k.*, p.nama as nama, p.harga as harga');
        $this->db->from('cart k');
        $this->db->join('barang p', 'k.id_barang = p.id_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id)
    {
        $this->db->select('d.*, r.nama as nama, b.nama as barang');
        $this->db->from('detail_penjualan d');
        $this->db->join('user r ', 'd.id_user = r.id');
        $this->db->join('barang b', 'd.id_barang = b.id_barang');
        $this->db->where('d.no_penjualan', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByUser($id)
    {
        $idu = $this->session->userdata('id');
        $this->db->select('d.*, b.nama as nama_barang');
        $this->db->from('detail_penjualan d');
        $this->db->join('barang b', 'd.id_barang = b.id_barang');
        $this->db->where('d.no_penjualan', $id, 'AND d.id_user=' . $idu);
        $this->db->where('d.id_user=' . $idu);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function insert($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    function charts()
    {
        $this->db->select('d.*, b.nama as barang, sum(d.jumlah) as jum');
        $this->db->from('detail_penjualan d');
        $this->db->join('barang b', 'd.id_barang = b.id_barang');
        $this->db->group_by('d.id_barang');
        $query = $this->db->get();
        return $query->result_array();
    }
}
