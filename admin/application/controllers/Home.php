<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/index');
        $this->load->view('templates/footer');
    }
}
