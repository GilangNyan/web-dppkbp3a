<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Landing_model');
    }

    public function index()
    {
        $this->Landing_model->countVisitor();
        $this->load->view('pages/blog/home');
    }
}
