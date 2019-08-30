<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');

        if ($this->session->userdata('username') != null) {
            redirect('admin');
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
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $this->auth_model->login($user);
                    $this->session->set_flashdata('message', 'Login berhasil. Selamat datang!');
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', 'Password tidak cocok!');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', 'User tidak ditemukan!');
                redirect('login');
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
            redirect('login');
        }
    }

    public function forget()
    {
        $rules = [
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email'
            ]
        ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgotpassword');
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userinfo = $this->auth_model->getUserInfoByEmail($clean);

            if (!$userinfo) {
                $this->session->set_flashdata('message', 'Email tidak ditemukan!');
                redirect('forget', 'refresh');
            }

            $token = $this->auth_model->insertToken($userinfo->id);
            $qstring = $this->base64url_encode($token);
            $url = base_url('admin/auth/reset/') . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';
            $data['link'] = $link;

            $message = '';
            $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui password anda.</strong><br>';
            $message .= '<strong>Silahkan klik link ini: </strong>' . $link;
            $messagehtml = $this->load->view('emailpemulihan', $data, TRUE);

            $config['mailtype'] = 'html';
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.mailtrap.io';
            $config['smtp_user'] = '8866148ddd2a30';
            $config['smtp_pass'] = 'f07ae3f322554d';
            $config['smtp_port'] = 2525;
            $config['newline'] = "\r\n";

            $this->email->initialize($config);
            $this->email->from('noreply@dppkbp3a.com', 'Admin DPPKBP3A');
            $this->email->to($clean);
            $this->email->subject('Reset password akun DPPKBP3A untuk akun ' . $userinfo->nama);
            $this->email->message($messagehtml);
            $this->email->set_alt_message($message);

            // echo $message;
            // exit;

            if (!$this->email->send()) {
                $this->session->set_flashdata('message', 'Email pemulihan gagal dikirim.');
                redirect('login');
                echo $this->email->print_debugger();
            } else {
                $this->session->set_flashdata('message', 'Email pemulihan berhasil dikirim.');
                redirect('login');
            }
        }
    }

    public function reset()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $userinfo = $this->auth_model->isTokenValid($cleanToken);

        if (!$userinfo) {
            $this->session->set_flashdata('message', 'Token tidak valid atau kadaluarsa!');
            redirect('login', 'refresh');
        }

        $rules = [
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
            $data['nama'] = $userinfo->nama;
            $data['email'] = $userinfo->email;
            $data['token'] = $this->base64url_encode($token);
            $this->load->view('auth/resetpassword', $data);
        } else {
            $post = $this->input->post(null, true);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = password_hash($cleanPost['password'], PASSWORD_DEFAULT);
            $cleanPost['password'] = $hashed;
            $cleanPost['id'] = $userinfo->id;
            unset($cleanPost['passconf']);
            if (!$this->auth_model->updatePassword($cleanPost)) {
                $this->session->set_flashdata('message', 'Update password gagal.');
            } else {
                $this->session->set_flashdata('message', 'Password diperbarui.');
            }
            redirect('login');
        }
    }

    private function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
