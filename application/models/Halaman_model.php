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
        $this->db->select('
         x1.id_halaman
         , x1.judul
         , x1.isi
         , x1.tanggal
         , x1.slug
         , x1.parent
         , x2.judul AS sub_page
      ');
        $this->db->join('halaman x2', 'x1.parent = x2.id_halaman', 'LEFT');
        return $this->db->get('halaman x1')->result();
    }

    public function addPages($judul, $isi, $slug, $parent)
    {
        $data = array(
            'id_halaman' => uniqid('page-'),
            'judul' => $judul,
            'isi' => $isi,
            'slug' => $slug,
            'parent' => $parent
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

    public function get_parent_pages()
    {
        return $this->db->query("SELECT * FROM halaman WHERE parent = '' OR parent IS NULL");
    }

    public function get_sub_pages($id_halaman = NULL)
    {
        return $this->db
            ->where('parent', $id_halaman)
            ->get('halaman');
    }
}
