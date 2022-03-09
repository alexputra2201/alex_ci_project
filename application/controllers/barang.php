<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Barang_model');
    }
    function index()
    {
        $data['judul'] = "Halaman Barang";
        $data['barang'] = $this->Barang_model->get();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("barang/vw_barang", $data);
        $this->load->view("layout/footer", $data);
    }


    function tambah()
    {
        $data['judul'] = "Halaman Tambah Barang";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Barang', 'required', [
            'required' => 'Nama Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('merk', 'merk ', 'required', [
            'required' => 'merk Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('stok', 'stok Barang', 'required', [
            'required' => 'stok Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('harga', 'harga Barang', 'required', [
            'required' => 'harga Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('description', 'Description Barang', 'required', [
            'required' => 'Description Barang Wajib diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("barang/vw_tambah_barang", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'merk' => $this->input->post('merk'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
                'description' => $this->input->post('description'),

            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/Barang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Barang_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambah!</div>');
            redirect('Barang');
        }
    }

    function delete($id)
    {
        $this->Barang_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Barang tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Barang Berhasil Dihapus!</div>');
        }
        redirect('Barang');
    }


    function edit($id)
    {
        $data['judul'] = "Halaman Edit Barang";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Barang_model->getById($id);

        $this->form_validation->set_rules('nama', 'Nama Barang', 'required', [
            'required' => 'Nama Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('merk', 'merk', 'required', [
            'required' => 'merk Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('stok', 'stok Barang', 'required', [
            'required' => 'stok Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('harga', 'harga Barang', 'required', [
            'required' => 'harga Barang Wajib diisi',
        ]);
        $this->form_validation->set_rules('description', 'Description Barang', 'required', [
            'required' => 'Description Barang Wajib diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("barang/vw_ubah_barang", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'merk' => $this->input->post('merk'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
                'description' => $this->input->post('description'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/Barang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['barang']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/Barang/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id = $this->input->post('id_barang');
            $this->Barang_model->update(['id_barang' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Barang Berhasil DiUbah!</div>');
            redirect('Barang');
        }
    }
    function detail($id)
    {
        $data['judul'] = "Halaman Detail Barang";
        $data['barang'] = $this->Barang_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("barang/vw_detail_barang", $data);
        $this->load->view("layout/footer", $data);
    }
}
