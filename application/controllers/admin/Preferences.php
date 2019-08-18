<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Preferences extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('preferences_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['fotokepala'] = $this->preferences_model->getFotoKepala();
        $data['kepala'] = $this->preferences_model->getKepala();
        $data['sambutan'] = $this->preferences_model->getSambutan();
        $data['pagename'] = 'Preferensi';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/preferences', $data);
        $this->load->view('templates/footer');
    }

    public function editNama()
    {
        $nama = $this->input->post('nama');
        $this->preferences_model->editNama($nama);
        redirect('admin/preferences');
    }

    public function editJabatan()
    {
        $jabatan = $this->input->post('jabatan');
        $this->preferences_model->editJabatan($jabatan);
        redirect('admin/preferences');
    }

    public function editSambutan()
    {
        $sambutan = $this->input->post('sambutan');
        $this->preferences_model->editSambutan($sambutan);
        redirect('admin/preferences');
    }

    public function updateFoto()
    {
        $id = '123456';
        $foto = $this->input->post('foto');
        $this->preferences_model->updateFoto($id);
        redirect('admin/preferences');
    }
}
