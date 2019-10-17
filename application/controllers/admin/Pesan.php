<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('halaman_model');
        $this->load->model('pesan_model');
        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Pesan Masuk';
        $data['notifications'] = $this->user_model->notifications();
        $data['pesan'] = $this->pesan_model->getPesan();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/pesan', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        if (!isset($id)) show_404();
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Pesan Masuk';
        $data['notifications'] = $this->user_model->notifications();
        $data['pesan'] = $this->pesan_model->getPesanById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/detailpesan', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

        if ($this->pesan_model->delete($id)) {
            $this->session->set_flashdata('message', 'Pesan berhasil dihapus!');
            redirect('admin/pesan');
        }
    }
}
