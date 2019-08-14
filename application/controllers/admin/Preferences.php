<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Preferences extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Preferensi';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/preferences', $data);
        $this->load->view('templates/footer');
    }
}
