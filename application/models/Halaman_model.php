<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Halaman_model extends CI_Model
{
    public function getMenu()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->order_by('posisi');
        return $this->db->get()->result();
    }

    public function addMenu($nama)
    {
        $data = array(
            'id_menu' => uniqid('menu-'),
            'nama_menu' => $nama,
            'posisi' => 0
        );
        $this->db->insert('menu', $data);
    }
}
