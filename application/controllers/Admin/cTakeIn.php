<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTakeIn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
    }

    public function index()
    {
        $data = array(
            'status' => $this->mTransaksi->status_order_takein()
        );
        $this->protect->protect_admin();
        $this->load->view('Admin/Layouts/head');
        $this->load->view('Admin/transaksi/take_in', $data);
        $this->load->view('Admin/Layouts/footer');
    }
    public function detail_pesanan($id)
    {
        $this->protect->protect_admin();
        $data = array(
            'detail' => $this->mTransaksi->detail_pesanan_takein($id)
        );
        $this->load->view('Admin/Layouts/head');
        $this->load->view('Admin/transaksi/detail_pesanan_takein', $data);
        $this->load->view('Admin/Layouts/footer');
    }

    //transaksi takein
    public function konfirmasi_takein($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->mTransaksi->status_transaksi($id, $data);
        redirect('Admin/cTakeIn');
    }
    public function selesai($id)
    {
        $data = array(
            'status_order' => '4'
        );
        $this->mTransaksi->status_transaksi($id, $data);
        redirect('Admin/cTakeIn');
    }
}

/* End of file cTakeIn.php */
