<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Landing_model extends CI_Model
{
    public function countVisitor()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $tanggal = date('Ymd');
        $waktu = time();
        $browser = $this->agent->browser();
        $platform = $this->agent->platform();

        $this->db->select('*');
        $this->db->from('visitor');
        $this->db->where('ip', $ip);
        $this->db->where('tanggal', $tanggal);
        $this->db->where('browser', $browser);
        $this->db->where('platform', $platform);
        $s = $this->db->count_all_results();

        if ($s == 0) {
            $data = array(
                'ip' => $ip,
                'tanggal' => $tanggal,
                'hits' => 1,
                'online' => $waktu,
                'browser' => $browser,
                'platform' => $platform
            );
            $this->db->insert('visitor', $data);
        } else {
            $this->db->set('hits', 'hits+1', false);
            $this->db->set('online', $waktu);
            $this->db->set('browser', $browser);
            $this->db->set('platform', $platform);
            $this->db->where('ip', $ip);
            $this->db->where('tanggal', $tanggal);
            $this->db->where('browser', $browser);
            $this->db->where('platform', $platform);
            $this->db->update('visitor');
        }
    }

    public function countPostViews($slug)
    {
        $this->db->set('views', 'views+1', false);
        $this->db->where('slug', $slug);
        $this->db->update('post');
    }

    // Pagination Post
    function getAllPost($limit, $start)
    {
        $this->db->select('post.*, user.username, user.nama, user.role');
        $this->db->from('post');
        $this->db->join('user', 'post.author = user.id', 'LEFT');
        $this->db->where('post.status', 1);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit, $start + 5  );
        return $this->db->get()->result();
    }

    function published()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('post.status', 1);
        return $this->db->count_all_results();
    }
    // End Pagination Post

    public function getRecentPost()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('status', 1);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(5, 0);
        return $this->db->get()->result();
    }

    public function getMenu()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->order_by('posisi', 'asc');
        return $this->db->get()->result();
    }

    public function getSubMenu()
    {
        $this->db->select('*');
        $this->db->from('halaman');
        return $this->db->get()->result();
    }

    public function getKepala()
    {
        $this->db->select('*');
        $this->db->from('kepala_dinas');
        return $this->db->get()->result();
    }
}
