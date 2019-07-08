<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Post_model extends CI_Model
{
    function simpanPost($judul, $isi, $slug, $image, $status)
    {
        $author = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'id' => uniqid('post-'),
            'judul' => $judul,
            'isi' => $isi,
            'slug' => $slug,
            'image' => $image,
            'author' => $author['id'],
            'status' => $status
        );
        $this->db->insert('post', $data);
    }

    function getAllPost()
    {
        $query = $this->db->get('post');
        return $query->result();
    }

    function getSpecificPost($postId)
    {
        return $this->db->get_where('post', ['id' => $postId])->row_array();
    }

    function getPublishedPost()
    {
        return $this->db->get_where('post', ['status' => 1])->result();
    }

    function updatePost($postId)
    {
        //
    }

    function deletePost($postId)
    {
        $this->db->delete('post', ['id' => $postId]);
    }
}
