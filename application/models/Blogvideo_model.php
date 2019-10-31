<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Blogvideo_model extends CI_Model
{
    function getVideo($tahun, $bulan)
    {
        return $this->db->get_where('video', ['year(tanggal)' => $tahun, 'month(tanggal)' => $bulan])->result();
    }

    function getVideoById($id)
    {
        return $this->db->get_where('video', ['id' => $id])->row();
    }
}
