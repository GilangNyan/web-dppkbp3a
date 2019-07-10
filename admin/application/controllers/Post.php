<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');

        if ($this->session->userdata('username') == null) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Semua Post';
        $data['posting'] = $this->post_model->getAllPost();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/posting', $data);
        $this->load->view('templates/footer');
    }

    public function published()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Post Diterbitkan';
        $data['posting'] = $this->post_model->getPublishedPost();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/posting', $data);
        $this->load->view('templates/footer');
    }

    public function savePost()
    {
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
            $this->session->set_flashdata('message', 'Artikel berhasil disimpan!');
            redirect('post');
        } else if ($status == 1) {
            $this->session->set_flashdata('message', 'Artikel berhasil diterbitkan!');
            redirect('post');
        }
    }
}
