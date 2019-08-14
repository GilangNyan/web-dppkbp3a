<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['listuser'] = $this->user_model->getUser();
        $data['pagename'] = 'Kelola Pengguna';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/user', $data);
        $this->load->view('templates/footer');
    }
}
