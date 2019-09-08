<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Videos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('halaman_model');
        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Video';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/albums', $data);
        $this->load->view('templates/footer');
    }
}
