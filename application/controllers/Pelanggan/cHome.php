<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKatalog');
		$this->load->model('mChatting');
	}
	public function index()
	{
		$data = array(
			'menu' => $this->mKatalog->menu(),
			'menu_promo' => $this->mKatalog->menu_promo(),
			'kritik' => $this->mChatting->select_kritik()
		);
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/home', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function detail_produk()
	{
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/detail_produk');
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function cart()
	{
		$this->protect->protect();
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty'),
			'stok' => $this->input->post('stok'),
			'picture' => $this->input->post('picture')
		);
		$this->cart->insert($data);
		redirect('pelanggan/chome');
	}
	public function update_cart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'  => $items['rowid'],
				'qty'    => $this->input->post($i . '[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('pelanggan/chome/view_cart');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('pelanggan/chome/view_cart');
	}
	public function view_cart()
	{
		$this->protect->protect();
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/cart');
		$this->load->view('Pelanggan/Layouts/footer');
	}


	public function pengiriman()
	{
		$data = array(
			'pelanggan' => $this->mKatalog->data_pelanggan()
		);
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/pengiriman', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}

	public function checkout()
	{
		$this->form_validation->set_rules('pembayaran', 'Metode Pembayaran', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->protect->protect();
			$data = array(
				'pelanggan' => $this->mKatalog->data_pelanggan()
			);
			$this->load->view('Pelanggan/layouts/header');
			$this->load->view('Pelanggan/layouts/aside');
			$this->load->view('Pelanggan/checkout', $data);
			$this->load->view('Pelanggan/Layouts/footer');
		} else {

			$metode = $this->input->post('pembayaran');
			if ($metode == '1') {
				$status_order = '1';
			} else {
				$status_order = '0';
			}
			$data = array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'id_pelanggan' => $this->session->userdata('id'),
				'tgl_transaksi' => date('Y-m-d'),
				'total_bayar' => $this->input->post('total'),
				'status_order' => $status_order,
				'pembayaran' => $this->input->post('pembayaran'),
				'bukti_pembayaran' => '0',
				'status_pesan' => '1'
			);
			$this->mKatalog->checkout($data);

			//mengurangi jumlah stok
			$kstok = 0;
			foreach ($this->cart->contents() as $key => $value) {
				$id = $value['id'];
				$kstok = $value['stok'] - $value['qty'];
				$data = array(
					'stok' => $kstok
				);
				$this->mKatalog->stok($id, $data);
			}


			//menyimpan pesanan ke detail transaksi
			$i = 1;
			foreach ($this->cart->contents() as $item) {
				$data_rinci = array(
					'id_transaksi' => $this->input->post('id_transaksi'),
					'id_produk' => $item['id'],
					'qty' => $this->input->post('qty' . $i++)
				);
				$this->mKatalog->detail_transaksi($data_rinci);
			}
			$this->cart->destroy();
			$this->session->set_flashdata('success', 'Pesanan Anda Berhasil Dikirim!');
			redirect('pelanggan/cpesanansaya');
		}
	}
	public function checkout_deliv()
	{
		$this->form_validation->set_rules('pembayaran', 'Metode Pembayaran', 'required');
		$this->form_validation->set_rules('kota', 'Kota/Kabupaten', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('rt', 'RT', 'required');
		$this->form_validation->set_rules('rw', 'RW', 'required');
		$this->form_validation->set_rules('expedisi', 'Expedisi', 'required');
		$this->form_validation->set_rules('paket', 'Paket', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->protect->protect();
			$data = array(
				'pelanggan' => $this->mKatalog->data_pelanggan()
			);
			$this->load->view('Pelanggan/layouts/header');
			$this->load->view('Pelanggan/layouts/aside');
			$this->load->view('Pelanggan/checkout_delivery', $data);
		} else {

			$metode = $this->input->post('pembayaran');
			$total = $this->input->post('total');
			if ($metode === '2') {
				$total_bayar = $total - ((5 / 100) * $total);
			} else {
				$total_bayar = $total;
			}
			$data = array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'id_pelanggan' => $this->session->userdata('id'),
				'tgl_transaksi' => date('Y-m-d'),
				'total_bayar' => $total_bayar,
				'status_order' => '0',
				'pembayaran' => $this->input->post('pembayaran'),
				'bukti_pembayaran' => '0',
				'status_pesan' => '2'
			);
			$this->mKatalog->checkout($data);

			$pengiriman = array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'alamat' => $this->input->post('alamat'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
				'kota' => $this->input->post('kota'),
				'ongkir' => $this->input->post('ongkir'),
			);
			$this->db->insert('pengiriman', $pengiriman);


			//mengurangi jumlah stok
			$kstok = 0;
			foreach ($this->cart->contents() as $key => $value) {
				$id = $value['id'];
				$kstok = $value['stok'] - $value['qty'];
				$data = array(
					'stok' => $kstok
				);
				$this->mKatalog->stok($id, $data);
			}


			//menyimpan pesanan ke detail transaksi
			$i = 1;
			foreach ($this->cart->contents() as $item) {
				$data_rinci = array(
					'id_transaksi' => $this->input->post('id_transaksi'),
					'id_produk' => $item['id'],
					'qty' => $this->input->post('qty' . $i++)
				);
				$this->mKatalog->detail_transaksi($data_rinci);
			}
			$this->cart->destroy();
			$this->session->set_flashdata('success', 'Pesanan Anda Berhasil Dikirim!');
			redirect('pelanggan/cpesanansaya');
		}
	}
}

/* End of file cHome.php */
