<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Preferences extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('preferences_model');
        $this->load->model('halaman_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['user'] = $this->user_model->get_current_user();
        $data['fotokepala'] = $this->preferences_model->getFotoKepala();
        $data['kepala'] = $this->preferences_model->getKepala();
        $data['sambutan'] = $this->preferences_model->getSambutan();
        $data['pagename'] = 'Kepala Dinas';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/kepaladinas', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $this->form_validation->set_rules($this->preferences_model->profilRules());

        if ($this->form_validation->run() == false) {
            $data['parent_pages'] = $this->halaman_model->get_parent_pages();
            $data['user'] = $this->user_model->get_current_user();
            $data['fotokepala'] = $this->preferences_model->getFotoKepala();
            $data['kepala'] = $this->preferences_model->getKepala();
            $data['sambutan'] = $this->preferences_model->getSambutan();
            $data['provinsi'] = $this->preferences_model->getProvinsi();
            $data['profil'] = $this->preferences_model->getProfil();
            $data['pagename'] = 'Profil Dinas';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/profil', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->preferences_model->updateProfil() == true) {
                $this->session->set_flashdata('message', 'Berhasil mengupdate profil');
                redirect('admin/profil');
            } else {
                $this->session->set_flashdata('message', 'Update profil gagal');
                redirect('admin/profil');
            }
        }
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
        $id = '1';
        $foto = $this->input->post('foto');
        $this->preferences_model->updateFoto($id);
        redirect('admin/preferences');
    }

    public function getKabupaten()
    {
        $idprov = $this->input->post('idprov');
        $kabupaten = $this->preferences_model->getKabupaten($idprov);
        $result = "";

        foreach ($kabupaten->kabupatens as $kab) {
            $result .= '<option value="' . $kab->id . '">' . $kab->nama . '</option>';
        }
        echo $result;
    }

    public function getKecamatan()
    {
        $idkab = $this->input->post('idkab');
        $kecamatan = $this->preferences_model->getKecamatan($idkab);
        $result = "";

        foreach ($kecamatan->kecamatans as $kec) {
            $result .= '<option value="' . $kec->id . '">' . $kec->nama . '</option>';
        }
        echo $result;
    }

    public function getDesa()
    {
        $idkec = $this->input->post('idkec');
        $desa = $this->preferences_model->getDesa($idkec);
        $result = "";

        foreach ($desa->desas as $des) {
            $result .= '<option value="' . $des->id . '">' . $des->nama . '</option>';
        }
        echo $result;
    }
}
