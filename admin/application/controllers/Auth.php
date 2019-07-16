<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');

        if ($this->session->userdata('username') != null) {
            redirect('home');
        }
    }

    public function index()
    {
        $rules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ]
        ];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->auth_model->get_user($username);
            var_dump('user');
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $this->auth_model->login($user);
                    $this->session->set_flashdata('message', 'Login berhasil. Selamat datang!');
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', 'Password tidak cocok!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', 'User tidak ditemukan!');
                redirect('auth');
            }
        }
    }

    public function register()
    {
        $rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[12]|is_unique[user.username]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|valid_email|is_unique[user.email]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]'
            ],
            [
                'field' => 'passconf',
                'label' => 'Konfirmasi Password',
                'rules' => 'trim|required|matches[password]'
            ],
        ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $this->auth_model->register();
            $this->session->set_flashdata('message', 'User berhasil didaftarkan!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'Berhasil logout!');
        redirect('auth');
    }
}
