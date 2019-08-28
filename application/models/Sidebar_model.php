<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Sidebar_model extends CI_Model
{
    function archiveYear()
    {
        $this->db->select('year(tanggal) as tahun, count(*) as jumlah');
        $this->db->from('post');
        $this->db->group_by('year(tanggal)');
        return $this->db->get()->result();
    }

    function archiveMonth()
    {
        $this->db->select('month(tanggal) as bulan, count(*) as jumlah');
        $this->db->from('post');
        $this->db->group_by('month(tanggal)');
        return $this->db->get()->result();
    }
}
