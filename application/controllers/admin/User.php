<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('halaman_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
      $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['listuser'] = $this->user_model->getUser();
        $data['pagename'] = 'Kelola Pengguna';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/user', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules($this->user_model->addUserRules());

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/user');
        } else {
            $this->user_model->addUser();
            $this->session->set_flashdata('message', 'User berhasil dibuat!');
            redirect('admin/user');
        }
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

        if ($this->user_model->deleteUser($id)) {
            $this->session->set_flashdata('message', 'User berhasil dihapus!');
            redirect('admin/user');
        }
    }
}
