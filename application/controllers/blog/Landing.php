<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('landing_model');
    }

    public function index()
    {
        $data['carousel'] = $this->landing_model->getRecentPost();
        $this->landing_model->countVisitor();
        $this->load->view('pages/blog/home', $data);
    }
}
