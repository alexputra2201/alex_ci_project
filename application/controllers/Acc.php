<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Acc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Acc_model');
    }
    function index()
    {
        $data['judul'] = "Halaman Accessories";
        $data['acc'] = $this->Acc_model->get();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("acc/vw_acc", $data);
        $this->load->view("layout/footer", $data);
    }


    function tambah()
    {
        $data['judul'] = "Halaman Tambah Accessories";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Acc', 'required', [
            'required' => 'Nama Acc Wajib diisi',
        ]);
        $this->form_validation->set_rules('merk', 'merk', 'required', [
            'required' => 'merk Acc Wajib diisi',
        ]);
        $this->form_validation->set_rules('stok', 'stok Acc', 'required', [
            'required' => 'stok Acc Wajib diisi',
        ]);
        $this->form_validation->set_rules('harga', 'harga Acc', 'required', [
            'required' => 'harga Acc Wajib diisi',
        ]);
        $this->form_validation->set_rules('description', 'Description Acc', 'required', [
            'required' => 'Description Acc Wajib diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("acc/vw_tambah_acc", $data);
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
                $config['upload_path'] = './assets/img/Acc/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Acc_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Accessories Berhasil Ditambah!</div>');
            redirect('Acc');
        }
    }

    function delete($id)
    {
        $this->Acc_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Accessories tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Accessories Berhasil Dihapus!</div>');
        }
        redirect('Acc');
    }


    function edit($id)
    {
        $data['judul'] = "Halaman Edit Accessories";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['acc'] = $this->Acc_model->getById($id);

        $this->form_validation->set_rules('nama', 'Nama Acc', 'required', [
            'required' => 'Nama Acc Wajib diisi',
        ]);
        $this->form_validation->set_rules('merk', 'merk', 'required', [
            'required' => 'merk Acc Wajib diisi',
        ]);
        $this->form_validation->set_rules('stok', 'stok Acc', 'required', [
            'required' => 'stok Acc Wajib diisi',
        ]);
        $this->form_validation->set_rules('harga', 'harga Acc', 'required', [
            'required' => 'harga Acc Wajib diisi',
        ]);
        $this->form_validation->set_rules('description', 'Description Acc', 'required', [
            'required' => 'Description Acc Wajib diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("acc/vw_ubah_acc", $data);
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
                $config['upload_path'] = './assets/img/Acc/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['acc']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/Acc/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id = $this->input->post('id');
            $this->Acc_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Acc Berhasil DiUbah!</div>');
            redirect('Acc');
        }
    }
    function detail($id)
    {
        $data['judul'] = "Halaman Detail Acc";
        $data['acc'] = $this->Acc_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("acc/vw_detail_acc", $data);
        $this->load->view("layout/footer", $data);
    }
}
