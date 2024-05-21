<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDiskon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDiskon');
        $this->load->model('mProduk');
    }

    public function index()
    {
        $this->protect->protect_admin();
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('nama', 'Nama Diskon', 'required');
        $this->form_validation->set_rules('besar', 'Besar Diskon', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->mProduk->select(),
                'promo' => $this->mDiskon->select()
            );
            $this->load->view('Admin/Layouts/head');
            $this->load->view('Admin/diskon/diskon', $data);
            $this->load->view('Admin/Layouts/footer');
        } else {
            $id = $this->input->post('produk');
            $data = array(
                'nama_promo' => $this->input->post('nama'),
                'besar' => $this->input->post('besar'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai')
            );
            $this->mDiskon->update($id, $data);
            $this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan!');
            redirect('admin/cdiskon');
        }
    }
    public function update($id)
    {
        $data = array(
            'nama_promo' => $this->input->post('nama'),
            'besar' => $this->input->post('besar'),
            'tgl_selesai' => $this->input->post('tgl_selesai')
        );
        $this->mDiskon->update($id, $data);
        $this->session->set_flashdata('success', 'Data Diskon Berhasil Diperbahrui!');
        redirect('admin/cdiskon');
    }
    public function delete($id)
    {
        $data = array(
            'nama_promo' => '0',
            'besar' => '0',
            'tgl_mulai' => '0',
            'tgl_selesai' => '0'
        );
        $this->mDiskon->update($id, $data);
        $this->session->set_flashdata('success', 'Data Diskon Berhasil Dihapus!');
        redirect('admin/cdiskon');
    }
}

/* End of file cDiskon.php */
