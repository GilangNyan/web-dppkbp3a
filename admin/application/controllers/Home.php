<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');

        if ($this->session->userdata('username') == null) {
            redirect('auth');
        }
    }

    function index()
    {
        $data['user'] = $this->home_model->get_current_user();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/dashboard');
        $this->load->view('templates/footer');
    }
}
