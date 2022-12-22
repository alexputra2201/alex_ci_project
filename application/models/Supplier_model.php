<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Supplier_model extends CI_Model
{
    public $table = 'supplier';
    public $id = 'supplier.id';
    private $_client;
    public function __construct()
    {
        parent::__construct();
        // $this->_client = new Client([
        //     'auth' => ['admin', '1234', 'alex' => 'alex']
        // ]);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $query = $this->db->get();
        return $query->result_array();
        // $response = $this->_client->request('GET', 'supplier', [
        //     'query' => [
        //         'BPF-TI' => 'bpfalex'
        //     ]
        // ]);
        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['data'];
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
        // $response = $this->_client->request('GET', 'supplier', [
        //     'query' => [
        //         'id' => $id,
        //         'BPF-TI' => 'bpfalex'
        //     ]
        // ]);
        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['data'][0];
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
        // $response = $this->_client->request('PUT', 'supplier', [
        //     'form_params' => $data
        // ]);
        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result;
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
        // $response = $this->_client->request('POST', 'supplier', [
        //     'form_params' => $data
        // ]);
        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result;
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
        // $response = $this->_client->request('DELETE', 'supplier', [
        //     'form_params' => [
        //         'id' => $id,
        //         'BPF-TI' => 'bpfalex'
        //     ]
        // ]);
        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['data'];
    }

    public function tacc()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
