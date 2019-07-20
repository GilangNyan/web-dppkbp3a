<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Home_model extends CI_Model
{
    public function get_current_user()
    {
        $username = $this->session->userdata('username');

        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

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
            $this->db->update('visitor');
        }
    }

    public function getTodayVisitor()
    {
        $tanggal = date('Ymd');

        $this->db->select('*');
        $this->db->from('visitor');
        $this->db->where('tanggal', $tanggal);
        return $this->db->count_all_results();
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
        $this->db->select('*');
        $this->db->from('visitor');
        return $this->db->count_all_results();
    }

    public function getTotalPost()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('status', 1);
        return $this->db->count_all_results();
    }
}
