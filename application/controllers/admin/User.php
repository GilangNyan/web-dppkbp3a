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
            $data['parent_pages'] = $this->halaman_model->get_parent_pages();
            $data['user'] = $this->user_model->get_current_user();
            $data['listuser'] = $this->user_model->getUser();
            $data['pagename'] = 'Kelola Pengguna';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/adduser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user_model->addUser();
            $this->session->set_flashdata('message', 'User berhasil dibuat!');
            redirect('admin/user');
        }
    }

    public function edit($id)
    {
        if (!isset($id)) redirect('admin/user');
        $this->form_validation->set_rules($this->user_model->editUserRules($id));

        if ($this->form_validation->run() == false) {
            $data['parent_pages'] = $this->halaman_model->get_parent_pages();
            $data['user'] = $this->user_model->get_current_user();
            $data['listuser'] = $this->user_model->getUser();
            $data['pagename'] = 'Kelola Pengguna';
            $data['edituser'] = $this->user_model->getUserById($id);
            if (!$data['edituser']) show_404();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/edituser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user_model->editUser($id);
            $this->session->set_flashdata('message', 'User berhasil diubah!');
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

    public function setelan($id)
    {
        $this->form_validation->set_rules($this->user_model->editUserRules($id));
        if ($this->input->post('formname') == 'setelanuser') {
            $this->form_validation->set_rules($this->user_model->editUserRules($id));
        } else if ($this->input->post('formname') == 'setelanpassword') {
            $this->form_validation->set_rules($this->user_model->editPasswordRules());
        } else if ($this->input->post('formname') == 'setelanfoto') {
            $this->form_validation->set_rules($this->user_model->editFotoRules());
        }

        if ($this->form_validation->run() == false) {
            $data['parent_pages'] = $this->halaman_model->get_parent_pages();
            $data['user'] = $this->user_model->get_current_user();
            $data['pagename'] = 'Setelan Akun';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/setelan', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('formname') == 'setelanuser') {
                $this->user_model->editDataDiri($id);
                $this->session->set_flashdata('message', 'Data diri berhasil diubah!');
                redirect('admin/setelan/' . $id);
            } else if ($this->input->post('formname') == 'setelanpassword') {
                $datauser = $this->user_model->get_current_user();
                $password = $datauser->password;
                if (password_verify($this->input->post('oldpassword'), $password)) {
                    $this->user_model->editPassword($id);
                    $this->session->set_flashdata('message', 'Password berhasil diubah!');
                    redirect('admin/setelan/' . $id);
                } else {
                    $this->session->set_flashdata('message', 'Password lama tidak cocok!');
                    redirect('admin/setelan/' . $id);
                }
            } else if ($this->input->post('formname') == 'setelanfoto') {
                $this->user_model->editFoto($id);
                $this->session->set_flashdata('message', 'Foto berhasil diubah!');
                redirect('admin/setelan/' . $id);
            }
        }
    }

    public function editFoto($id)
    {
        $this->user_model->editFoto($id);
        $this->session->set_flashdata('message', 'Foto berhasil diubah!');
        redirect('admin/setelan/' . $id);
    }
}
