<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Halaman_model extends CI_Model
{
    public function getMenu()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->order_by('posisi');
        return $this->db->get()->result();
    }

    public function addMenu($nama)
    {
        $data = array(
            'id_menu' => uniqid('menu-'),
            'nama_menu' => $nama,
            'posisi' => 0
        );
        $this->db->insert('menu', $data);
    }

    public function editMenu($id, $nama)
    {
        $data = array(
            'nama_menu' => $nama
        );

        return $this->db->update('menu', $data, ['id_menu' => $id]);
    }

    public function deleteMenu($id)
    {
        return $this->db->delete('menu', ['id_menu' => $id]);
    }

    public function getHalaman()
    {
        $this->db->select('halaman.*, menu.*');
        $this->db->from('halaman');
        $this->db->join('menu', 'halaman.parent = menu.id_menu', 'inner');
        return $this->db->get()->result();
    }

    public function addPages($judul, $isi, $slug, $menu)
    {
        $data = array(
            'id_halaman' => uniqid('page-'),
            'judul' => $judul,
            'isi' => $isi,
            'slug' => $slug,
            'parent' => $menu
        );
        return $this->db->insert('halaman', $data);
    }

    public function editPages($id, $judul, $isi, $slug, $parent)
    {
        $data = array(
            'judul' => $judul,
            'isi' => $isi,
            'slug' => $slug,
            'parent' => $parent
        );

        return $this->db->update('halaman', $data, ['id_halaman' => $id]);
    }

    public function deletePage($postId)
    {
        return $this->db->delete('halaman', ['id_halaman' => $postId]);
    }
}
