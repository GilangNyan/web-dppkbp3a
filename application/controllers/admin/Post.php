<?php

use function GuzzleHttp\json_encode;

defined('BASEPATH') or exit('No direct script access allowed.');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('halaman_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Semua Tulisan';
        $data['posting'] = $this->post_model->getAllPost();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/posting', $data);
        $this->load->view('templates/footer');
    }

    public function published()
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Tulisan Diterbitkan';
        $data['posting'] = $this->post_model->getPublishedPost();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/posting', $data);
        $this->load->view('templates/footer');
    }

    function getSpecificPost()
    {
        $id = $this->input->post('id');
        $query = $this->post_model->getSpecificPost($id);
        json_encode($query);
    }

    public function addPost()
    {
        $this->form_validation->set_rules($this->post_model->addUserRules());

        if ($this->form_validation->run() == false) {
            $data['parent_pages'] = $this->halaman_model->get_parent_pages();
            $data['user'] = $this->user_model->get_current_user();
            $data['pagename'] = 'Tambah Tulisan';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/tambahPost', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            //Membuat slug
            $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $pre_slug . '.html';
            $status = $this->input->post('status');

            $this->post_model->simpanPost($judul, $isi, $slug, $status);
            if ($status == 0) {
                $this->session->set_flashdata('message', 'Tulisan berhasil disimpan!');
                redirect('admin/post');
            } else if ($status == 1) {
                $this->session->set_flashdata('message', 'Tulisan berhasil diterbitkan!');
                redirect('admin/post');
            }
        }
    }

    public function updatePost($postId = null)
    {
        if (!isset($postId)) {
            redirect('admin/post');
        }

        $this->form_validation->set_rules($this->post_model->editUserRules());

        if ($this->form_validation->run() == false) {
            $data['parent_pages'] = $this->halaman_model->get_parent_pages();
            $data['user'] = $this->user_model->get_current_user();
            $data['pagename'] = 'Edit Tulisan';
            $data['posting'] = $this->post_model->getSpecificPost($postId);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/editPost', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul');
            //Membuat slug
            $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $pre_slug . '.html';

            $this->post_model->updatePost($postId, $slug);
            $this->session->set_flashdata('message', 'Tulisan berhasil diedit!');
            redirect('admin/post');
        }
    }

    public function deletePost($id)
    {
        if (!isset($id)) show_404();

        if ($this->post_model->deletePost($id)) {
            $this->session->set_flashdata('message', 'Tulisan berhasil dihapus!');
            redirect('admin/post');
        }
    }
}
