<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mChatting extends CI_Model
{
    public function send_pelanggan($data)
    {
        $this->db->insert('chatting', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('admin', 'chatting.id_admin = admin.id_admin', 'left');

        $this->db->where('pelanggan.id_pelanggan', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function insert_saran($data)
    {
        $this->db->insert('kritik_saran', $data);
    }
    public function select_kritik()
    {
        $this->db->select('*');
        $this->db->from('kritik_saran');
        $this->db->join('pelanggan', 'kritik_saran.id_pelanggan = pelanggan.id_pelanggan', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mChatting.php */
