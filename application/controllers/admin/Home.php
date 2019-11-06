<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('halaman_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Beranda';
        $data['notifications'] = $this->user_model->notifications();
        $data['todayvisitor'] = $this->home_model->getTodayVisitor();
        $data['onlinevisitor'] = $this->home_model->getOnlineVisitor();
        $data['totalvisitor'] = $this->home_model->getTotalVisitor();
        $data['totalpages'] = $this->home_model->getTotalPost();
        $data['totalcomments'] = $this->home_model->getTotalComments();
        $data['totalmessages'] = $this->home_model->getTotalMessages();
        $data['postperf'] = $this->home_model->postPerformance();
        $data['profil'] = $this->home_model->profil();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function getChartData()
    {
        $query = $this->home_model->chartBrowser();
        echo json_encode($query);
    }
}
