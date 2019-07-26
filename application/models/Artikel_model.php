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
}
