<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        // $this->home_model->countVisitor();
        $data['user'] = $this->home_model->get_current_user();
        $data['pagename'] = 'Dashboard';
        $data['todayvisitor'] = $this->home_model->getTodayVisitor();
        $data['onlinevisitor'] = $this->home_model->getOnlineVisitor();
        $data['totalvisitor'] = $this->home_model->getTotalVisitor();
        $data['totalpages'] = $this->home_model->getTotalPost();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
