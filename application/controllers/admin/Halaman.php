<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Halaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('halaman_model');
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['pagename'] = 'Halaman';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/halaman', $data);
        $this->load->view('templates/footer');
    }

    public function menu()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['menu'] = $this->halaman_model->getMenu();
        $data['pagename'] = 'Menu';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/menu', $data);
        $this->load->view('templates/footer');
    }

    public function simpanMenu()
    {
        $namamenu = $this->input->post('nama');
        $this->halaman_model->addMenu($namamenu);
        $this->session->set_flashdata('message', 'Menu berhasil disimpan!');
        redirect('admin/menu');
    }

    public function updatePosisi()
    {
        foreach ($this->input->post('posisi') as $position) {
            $index = $position[0];
            $newPosition = $position[1];
            $data = array(
                'posisi' => $newPosition
            );
            $this->db->update('menu', $data, ['id_menu' => $index]);
        }
    }
}
