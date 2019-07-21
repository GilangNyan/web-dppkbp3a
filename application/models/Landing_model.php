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
}
