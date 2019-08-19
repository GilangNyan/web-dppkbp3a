<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Artikel_model extends CI_Model
{
    function getAllPost($limit, $start)
    {
        $this->db->select('post.*, user.username, user.nama, user.role');
        $this->db->from('post');
        $this->db->join('user', 'post.author = user.id', 'inner');
        $this->db->where('post.status', 1);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    function published()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('post.status', 1);
        return $this->db->count_all_results();
    }

    function getPostDetail($tahun, $bulan, $slug)
    {
        $this->db->select('post.*, user.username, user.nama, user.role');
        $this->db->from('post');
        $this->db->join('user', 'post.author = user.id', 'inner');
        $where = "YEAR(tanggal) = $tahun AND MONTH(tanggal) = $bulan AND slug = '$slug'";
        $this->db->where($where);
        // $this->db->where('YEAR(tanggal)', $tahun);
        // $this->db->where('MONTH(tanggal)', $bulan);
        // $this->db->where('slug', $slug);
        return $this->db->get()->row();
    }

    public function readmore($slug = NULL)
    {
        return $this->db->get_where('halaman', ['slug' => $slug])->row();
    }

    function countPostViews($tahun, $bulan, $slug)
    {
        $this->db->set('views', 'views+1', false);
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->where('MONTH(tanggal)', $bulan);
        $this->db->where('slug', $slug);
        return $this->db->update('post');
    }
}
