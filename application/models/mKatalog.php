<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
	public function menu()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('promo', 'produk.id_produk = promo.id_produk', 'left');
		$this->db->where('tipe_produk=1');
		return $this->db->get()->result();
	}
	public function menu_promo()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('promo', 'produk.id_produk = promo.id_produk', 'left');
		$this->db->where('tipe_produk=2');
		return $this->db->get()->result();
	}
	public function data_pelanggan()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $this->session->userdata('id'));
		return $this->db->get()->row();
	}
	public function checkout($data)
	{
		$this->db->insert('transaksi', $data);
	}
	public function detail_transaksi($data)
	{
		$this->db->insert('detail_transaksi', $data);
	}
	public function stok($id, $data)
	{
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data);
	}
}

/* End of file mKatalog.php */
