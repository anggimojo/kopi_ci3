<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProduk extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('produk', $data);
	}
	public function insert_diskon($data)
	{
		$this->db->insert('promo', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('tipe_produk=1');
		return $this->db->get()->result();
	}
	public function select_promo()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('tipe_produk=2');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('produk');
	}
	public function delete_diskon($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('promo');
	}
}

/* End of file mProduk.php */
