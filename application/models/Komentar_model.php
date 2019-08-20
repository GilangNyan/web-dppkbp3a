<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Komentar_model extends CI_Model
{
    public function getAllKomentar()
    {
        $this->db->select('komentar.*, post.judul');
        $this->db->from('komentar');
        $this->db->join('post', 'komentar.id_post = post.id', 'inner');
        return $this->db->get()->result();
    }
}
