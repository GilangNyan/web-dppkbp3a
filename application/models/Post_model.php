<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Post_model extends CI_Model
{
    function simpanPost($judul, $isi, $slug, $status)
    {
        $author = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id = uniqid('post-');
        $data = array(
            'id' => $id,
            'judul' => $judul,
            'isi' => $isi,
            'slug' => $slug,
            'image' => $this->_uploadImage($id),
            'author' => $author['id'],
            'status' => $status
        );
        $this->db->insert('post', $data);
    }

    function getAllPost()
    {
        // $query = $this->db->get('post');
        $this->db->select('post.*, user.username, user.nama, user.role');
        $this->db->from('post');
        $this->db->join('user', 'post.author = user.id', 'LEFT');
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }

    function getSpecificPost($postId)
    {
        return $this->db->get_where('post', ['id' => $postId])->row();
    }

    function getPublishedPost()
    {
        $this->db->select('post.*, user.username, user.nama, user.role');
        $this->db->from('post');
        $this->db->join('user', 'post.author = user.id', 'inner');
        $this->db->where('post.status', 1);
        return $this->db->get()->result();
    }

    function updatePost($postId, $slug)
    {
        if (!empty($_FILES['gambar']['name'])) {
            $image = $this->_uploadImage($postId);
        } else {
            $image = $this->input->post('gambarlama');
        }

        $author = $author = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi2'),
            'slug' => $slug,
            'image' => $image,
            'author' => $author['id'],
            'status' => $this->input->post('status')
        );

        $this->db->update('post', $data, ['id' => $postId]);
    }

    function deletePost($postId)
    {
        $this->_deleteImage($postId);
        return $this->db->delete('post', ['id' => $postId]);
    }

    private function _uploadImage($id)
    {
        $config['upload_path'] = './assets/img/'; //'./assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $id;
        $config['overwrite'] = true;
        $config['max_size']  = '2048000';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        } else {
            $error = $this->upload->display_errors();
            echo $error;
            // print_r($_POST);
            // print_r($this->upload->data());
            // exit();
            return "post_default.jpg";
        }
    }

    private function _deleteImage($id)
    {
        $post = $this->getSpecificPost($id);
        if ($post->image != "post_default.jpg") {
            $filename = explode(".", $post->image)[0];
            return array_map('unlink', glob(FCPATH . "assets/img/$filename.*"));
        }
    }

    function addUserRules()
    {
        $rules = [
            [
                'field' => 'judul',
                'label' => 'Judul Artikel',
                'rules' => 'trim|required|max_length[150]'
            ],
            [
                'field' => 'isi',
                'label' => 'Isi Artikel',
                'rules' => 'trim|required'
            ]
        ];

        return $rules;
    }

    function editUserRules()
    {
        $rules = [
            [
                'field' => 'judul',
                'label' => 'Judul Artikel',
                'rules' => 'trim|required|max_length[150]'
            ],
            [
                'field' => 'isi2',
                'label' => 'Isi Artikel',
                'rules' => 'trim|required'
            ]
        ];

        return $rules;
    }
}
