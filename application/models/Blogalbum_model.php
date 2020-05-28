<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Blogalbum_model extends CI_Model
{
    public function getAlbum($tahun, $bulan)
    {
        return $this->db->get_where('albums', ['year(created_at)' => $tahun, 'month(created_at)' => $bulan])->result();
    }

    public function getFoto($tahun, $bulan)
    {
        return $this->db->get_where('photos', ['year(created_at)' => $tahun, 'month(created_at)' => $bulan])->result();
    }

    public function getAlbumById($id)
    {
        return $this->db->get_where('albums', ['id' => $id])->row();
    }

    public function getPhotosByAlbumId($id)
    {
        return $this->db->get_where('photos', ['photo_album_id' => $id])->result();
    }
}
