<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Halaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Halaman';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/halaman', $data);
        $this->load->view('templates/footer');
    }

    public function menu()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Menu';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/menu', $data);
        $this->load->view('templates/footer');
    }
}
