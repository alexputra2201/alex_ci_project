<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
        $this->load->model('User_model');
        $this->load->model('Barang_model');
        $this->load->model('Keranjang_model');
        $this->load->model('Penjualan_model');
        $this->load->model('Detail_model');
        $this->load->model('Acc_model');
    }
    function index()
    {
        $data['title'] = "Profil";
        $data['user'] = $this->User_model->getBy();
        $data['keranjang'] = $this->Keranjang_model->get();
        $data['jlh'] = $this->Keranjang_model->jumlah();
        $this->load->view("layout/header.php", $data);
        $this->load->view("profil/vw_profil", $data);
        $this->load->view("layout/footer.php", $data);
    }

    public function barang()
    {
        $data['judul'] = "List Barang";
        $data['user'] = $this->User_model->getBy();
        $data['barang'] = $this->Barang_model->get();
        $this->load->view("layout/header.php", $data);
        $this->load->view("profil/vw_p_user", $data);
        $this->load->view("layout/footer.php", $data);
    }

    public function acc()
    {
        $data['judul'] = "List Barang";
        $data['user'] = $this->User_model->getBy();
        $data['acc'] = $this->Acc_model->get();
        $this->load->view("layout/header.php", $data);
        $this->load->view("profil/vw_p_useracc", $data);
        $this->load->view("layout/footer.php", $data);
    }

    public function keranjang($id)
    {
        $data['keranjang'] = $this->Keranjang_model->get();
        $data['judul'] = "Detail Barang";
        $data['user'] = $this->User_model->getBy();
        $data['barang'] = $this->Barang_model->getById($id);
        $this->form_validation->set_rules('jumlah', 'Jumlah ', 'required', [
            'required' => 'Jumlah Wajib diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("profil/vw_keranjang", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_user' => $this->session->userdata('id'),
                'id_barang' => $this->input->post('id_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'total' => $this->input->post('total'),
                'tanggal' => $this->input->post('tanggal'),
            ];
            $this->Keranjang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang Berhasil Ditambah ke keranjang!</div>');
            redirect('Profil/detail');
        }
    }
    
    public function detail()
    {
        $data['judul'] = "Detail Keranjang";
        $data['user'] = $this->User_model->getBy();
        $data['barang'] = $this->Barang_model->get();
        $data['keranjang'] = $this->Keranjang_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("profil/vw_detail_keranjang", $data);
        $this->load->view("layout/footer", $data);
    }

    public function delkeranjang($id)
    {
        $this->Keranjang_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus dari keranjang</div>');
        redirect('Profil/detail');
    }

    public function pesanan()
    {
        $jumlah_beli = count($this->input->post('barang'));
        $data_p = [
            'no_penjualan' => $this->input->post('no_penjualan'),
            'id_user' => $this->session->userdata('id'),
            'tanggal' => $this->input->post('tanggal'),
            'total_bayar' => $this->input->post('bayar'),
            'alamat' => $this->input->post('alamat'),
            'pembayaran' => $this->input->post('pembayaran'),
            'keterangan' => $this->input->post('keterangan'),


        ];
        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/Pembayaran/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data_detail = [];
        for ($i = 0; $i < $jumlah_beli; $i++) {
            array_push($data_detail, ['id_barang' => $this->input->post('barang')[$i]]);
            $data_detail[$i]['no_penjualan'] = $this->input->post('no_penjualan');
            $data_detail[$i]['id_user'] = $this->session->userdata('id');
            $data_detail[$i]['jumlah'] = $this->input->post('jumlah_p')[$i];
            $data_detail[$i]['total'] = $this->input->post('total_p')[$i];
        }

        if ($this->Penjualan_model->insert($data_p, $upload_image) && $this->Detail_model->insert($data_detail)) {
            for ($i = 0; $i < $jumlah_beli; $i++) {
                $this->Barang_model->min_stok($data_detail[$i]['jumlah'], $data_detail[$i]['id_barang']) or die('gagal min stok');
            }
            $id_us = $this->session->userdata('id');
            $this->Keranjang_model->delete_all($id_us);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil dibuat!</div>');
            redirect('Profil/barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Gagal dibuat!</div>');
            redirect('Profil/barang');
        }
    }

    public function pembelian()
    {
        $data['judul'] = "Data Pembelian";
        $data['user'] = $this->User_model->getBy();
        $data['pembelian'] = $this->Penjualan_model->getByUser();
        $data['jlh'] = $this->Keranjang_model->jumlah();
        $this->load->view("layout/header", $data);
        $this->load->view("profil/pembelian_user", $data);
        $this->load->view("layout/footer", $data);
    }

    public function statusbeli($id)
    {
        $data['judul'] = "Ubah Data Pembelian";
        $data['user'] = $this->User_model->getBy();
        $data['pembelian'] = $this->Penjualan_model->getByUser2($id);
        $data['detailbeli'] = $this->Detail_model->getByUser($id);
        $data['jlh'] = $this->Keranjang_model->jumlah();
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("profil/detail_beli", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $status = $this->input->post('status');
            $nojual = $this->input->post('no_penjualan');

            $this->Penjualan_model->updatestatus($status, $nojual);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Berhasil DiUbah!</div>');
            redirect('Profil/pembelian');
        }
    }
}
