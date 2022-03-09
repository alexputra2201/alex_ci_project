<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Supplier_model');
    }
    function index()
    {
        $data['judul'] = "Halaman Supplier";
        $data['supplier'] = $this->Supplier_model->get();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("supplier/vw_supplier", $data);
        $this->load->view("layout/footer", $data);
    }


    function tambah()
    {
        $data['judul'] = "Halaman Tambah Supplier";
        $data['supplier'] = $this->Supplier_model->get();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Wajib diisi',
        ]);
        $this->form_validation->set_rules('nama_barang', 'nama barang ', 'required', [
            'required' => 'Nama Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah Wajib diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("supplier/vw_tambah_supplier", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'BPF-TI' => 'bpfalex'
            ];
            $this->Supplier_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Supplier Berhasil Ditambah!</div>');
            redirect('Supplier');
        }
    }

    function delete($id)
    {
        $this->Supplier_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Supplier tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Supplier Berhasil Dihapus!</div>');
        }
        redirect('Supplier');
    }


    function edit($id)
    {
        $data['judul'] = "Halaman Edit Supplier";
        $data['supplier'] = $this->Supplier_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Supplier', 'required', [
            'required' => 'Nama Supplier Wajib diisi',
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang ', 'required', [
            'required' => 'nama_barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah Wajib diisi',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("supplier/vw_ubah_supplier", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'BPF-TI' => 'bpfalex',
                'id' => $this->input->post('id'),
            ];
            $this->Supplier_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Supplier Berhasil DiUbah!</div>');
            redirect('Supplier');
        }
    }
}
