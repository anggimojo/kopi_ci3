<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan_Pelanggan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
    }

    public function index()
    {
        $this->protect->protect_admin();
        $data = array(
            'grafik_pelanggan' => $this->mLaporan->grafik_pelanggan()
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/laporanPelanggan/lappelanggan');
        $this->load->view('Pemilik/Layouts/footer', $data);
    }
    public function laporan()
    {
        $jk = $this->input->post('jk');
        $member =  $this->input->post('member');
        $data = array(
            'jk' => $jk,
            'member' => $member,
            'laporan' => $this->mLaporan->pelanggan($jk, $member)
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/laporanPelanggan/laporan', $data);
        $this->load->view('Pemilik/Layouts/footer');
    }
}

/* End of file cLaporan_Pelanggan.php */
