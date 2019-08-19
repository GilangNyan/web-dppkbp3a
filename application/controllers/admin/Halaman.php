<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Halaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('halaman_model');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_current_user();
        $data['halaman'] = $this->halaman_model->getHalaman();
        $data['pagename'] = 'Halaman';
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/halaman', $data);
        $this->load->view('templates/footer');
    }

    public function menu()
    {
      $data['parent_pages'] = $this->halaman_model->get_parent_pages();
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

    public function editMenu()
    {
        $id = $this->input->post('idmenu');
        $namamenu = $this->input->post('namaedit');
        $this->halaman_model->editMenu($id, $namamenu);
        $this->session->set_flashdata('message', 'Menu berhasil diedit!');
        redirect('admin/menu');
    }

    public function deleteMenu($id)
    {
        if (!isset($id)) show_404();

        if ($this->halaman_model->deleteMenu($id)) {
            $this->session->set_flashdata('message', 'Menu berhasil dihapus!');
            redirect('admin/menu');
        }
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

    public function addPages()
    {
        $judul = $this->input->post('title');
        $isi = $this->input->post('konten');
        //Membuat slug
        $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $pre_slug . '.html';
        $parent = $this->input->post('parent') ? $this->input->post('parent') : NULL;
        $this->halaman_model->addPages($judul, $isi, $slug, $parent);
        $this->session->set_flashdata('message', 'Halaman berhasil ditambahkan!');
        redirect('admin/halaman');
    }

    public function editPage()
    {
        $id = $this->input->post('idhal');
        $judul = $this->input->post('titleedit');
        $isi = $this->input->post('kontenedit');
        $parent = $this->input->post('parentedit');
        //Membuat slug
        $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $pre_slug . '.html';
        $this->halaman_model->editPages($id, $judul, $isi, $slug, $parent);
        $this->session->set_flashdata('message', 'Halaman berhasil diedit!');
        redirect('admin/halaman');
    }

    public function deletePage($id)
    {
        if (!isset($id)) show_404();

        if ($this->halaman_model->deletePage($id)) {
            $this->session->set_flashdata('message', 'Halaman berhasil dihapus!');
            redirect('admin/halaman');
        }
    }
}
