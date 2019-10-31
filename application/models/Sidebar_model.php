<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Sidebar_model extends CI_Model
{
    // Arsip
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

    // Photos
    function photosYear()
    {
        $this->db->select('year(created_at) as tahun, count(*) as jumlah');
        $this->db->from('photos');
        $this->db->group_by('year(created_at)');
        return $this->db->get()->result();
    }

    function photosMonth()
    {
        $this->db->select('month(created_at) as bulan, count(*) as jumlah');
        $this->db->from('photos');
        $this->db->group_by('month(created_at)');
        return $this->db->get()->result();
    }

    // Videos
    function videosYear()
    {
        $this->db->select('year(tanggal) as tahun, count(*) as jumlah');
        $this->db->from('video');
        $this->db->group_by('year(tanggal)');
        return $this->db->get()->result();
    }

    function videosMonth()
    {
        $this->db->select('month(tanggal) as bulan, count(*) as jumlah');
        $this->db->from('video');
        $this->db->group_by('month(tanggal)');
        return $this->db->get()->result();
    }
}
