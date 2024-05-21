<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

    public function index()
    {
        $this->protect->protect_admin();
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/dashboard');
        $this->load->view('Pemilik/Layouts/footer');
    }
}

/* End of file cDashboard.php */
