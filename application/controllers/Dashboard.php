<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		is_logged_in();
        $this->load->model('Barang_model');
        $this->load->model('Supplier_model');
        $this->load->model('Penjualan_model');
        $this->load->model('User_model');
        $this->load->model('Detail_model');
    }
    public function index()
    {	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Barang_model->tbarang();
        $data['supplier'] = $this->Supplier_model->tacc();
        $data['penjualan'] = $this->Penjualan_model->tpenjualan();
		$data['totalb'] = $this->Detail_model->charts();
        $data['us'] = $this->User_model->tuser();
        $this->load->view("layout/header", $data);
        $this->load->view("auth/dashboard", $data);
        $this->load->view("layout/footer");

    }
}
