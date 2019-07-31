<?php

defined('BASEPATH') or exit('No direct script access allowed.');

class Index extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Index_model');
    }

    public function index(){
        $this->load->view('pages/index', $data);
    }
}
?>