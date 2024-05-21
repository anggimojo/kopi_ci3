<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan_Produk extends CI_Controller
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
            'grafik_produk' => $this->mLaporan->grafik_produk()
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/laporanProduk/lapProduk');
        $this->load->view('Pemilik/Layouts/footer', $data);
    }
    public function lap_harian_produk()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_harian_produk($tanggal, $bulan, $tahun)
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/Laporanproduk/harian', $data);
        $this->load->view('Pemilik/Layouts/footer');
    }
    public function lap_bulanan_produk()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_bulanan_produk($bulan, $tahun)
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/Laporanproduk/bulanan', $data);
        $this->load->view('Pemilik/Layouts/footer');
    }
    public function lap_tahunan_produk()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_tahunan_produk($tahun)
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/LaporanProduk/tahunan', $data);
        $this->load->view('Pemilik/Layouts/footer');
    }
}

/* End of file cLaporan_Produk.php */
