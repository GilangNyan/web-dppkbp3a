<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Videos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('videos_model');
        $this->load->model('halaman_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['video'] = $this->videos_model->getVideo();
        $data['pagename'] = 'Video';
        $data['notifications'] = $this->user_model->notifications();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/videos', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules($this->videos_model->addVideoRules());

        if ($this->form_validation->run() == false) {
            $data['parent_pages'] = $this->halaman_model->get_parent_pages();
            $data['user'] = $this->user_model->get_current_user();
            $data['pagename'] = 'Tambah Video';
            $data['notifications'] = $this->user_model->notifications();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/addvideo', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->videos_model->addvideo() != false) {
                $this->session->set_flashdata('message', 'Berhasil mengupload video');
                redirect('admin/videos');
            } else {
                $this->session->set_flashdata('message', 'Upload video gagal');
                redirect('admin/videos');
            }
        }
    }

    public function update($id = null)
    {
        if (!isset($id)) {
            redirect('admin/videos');
        }

        $this->form_validation->set_rules($this->videos_model->addVideoRules());

        if ($this->form_validation->run() == false) {
            $data['parent_pages'] = $this->halaman_model->get_parent_pages();
            $data['user'] = $this->user_model->get_current_user();
            $data['video'] = $this->videos_model->getVideoById($id);
            $data['pagename'] = 'Tambah Video';
            $data['notifications'] = $this->user_model->notifications();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/editvideo', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->videos_model->editVideo() == true) {
                $this->session->set_flashdata('message', 'Edit berhasil');
                redirect('admin/videos');
            } else {
                $this->session->set_flashdata('message', 'Edit gagal');
                redirect('admin/videos');
            }
        }
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

        if ($this->videos_model->deleteVideo($id)) {
            $this->session->set_flashdata('message', 'Video berhasil dihapus!');
            redirect('admin/videos');
        }
    }
}
