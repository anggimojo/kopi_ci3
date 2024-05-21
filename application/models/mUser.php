<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mUser extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('admin', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('admin');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('admin', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_admin', $id);
        $this->db->delete('admin');
    }
}

/* End of file mUser.php */
