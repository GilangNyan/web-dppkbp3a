<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Home_model extends CI_Model
{
    public function get_current_user()
    {
        $username = $this->session->userdata('username');

        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function getTodayVisitor()
    {
        $tanggal = date('Ymd');

        $this->db->select('SUM(hits) as total');
        $this->db->from('visitor');
        $this->db->where('tanggal', $tanggal);
        $hasil = $this->db->get()->result();
        foreach ($hasil as $row) {
            return $row->total;
        }
    }

    public function getOnlineVisitor()
    {
        $bataswaktu = time() - 300;
        $this->db->select('*');
        $this->db->from('visitor');
        $this->db->where('online >', $bataswaktu);
        return $this->db->count_all_results();
    }

    public function getTotalVisitor()
    {
        $this->db->select('SUM(hits) as total');
        $this->db->from('visitor');
        $hasil = $this->db->get()->result();
        foreach ($hasil as $row) {
            return $row->total;
        }
    }

    public function getTotalPost()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('status', 1);
        return $this->db->count_all_results();
    }

    public function postPerformance()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->order_by('views', 'DESC');
        $this->db->limit(5, 0);
        return $this->db->get()->result();
    }

    public function chartBrowser()
    {
        $this->db->select('browser, SUM(hits) as jumlah');
        $this->db->from('visitor');
        $this->db->group_by('browser');
        return $this->db->get()->result();
    }
}
