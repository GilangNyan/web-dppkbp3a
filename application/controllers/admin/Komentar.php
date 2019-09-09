<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('halaman_model');
        $this->load->model('komentar_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Komentar';
        $data['komentar'] = $this->komentar_model->getAllKomentar();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/komentar', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

        if ($this->komentar_model->deleteKomentar($id)) {
            $this->session->set_flashdata('message', 'Komentar berhasil dihapus!');
            redirect('admin/komentar');
        }
    }
}
