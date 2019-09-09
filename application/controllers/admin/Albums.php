<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Albums extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('albums_model');
      $this->load->model('halaman_model');
      if ($this->session->userdata('username') == null) {
         redirect('login');
      }
   }

   public function index()
   {
      $data['parent_pages'] = $this->halaman_model->get_parent_pages();
      $data['user'] = $this->user_model->get_current_user();
      $data['query'] = $this->albums_model->getAlbums();
      $data['pagename'] = 'Album Foto';
      $this->load->view('templates/header', $data);
      $this->load->view('pages/albums', $data);
      $this->load->view('templates/footer');
   }

   public function add()
   {
      if (!$this->validation()) {
         $data['parent_pages'] = $this->halaman_model->get_parent_pages();
         $data['user'] = $this->user_model->get_current_user();
         $data['query'] = $this->albums_model->getAlbums();
         $data['pagename'] = 'Album Foto';
         $this->load->view('templates/header', $data);
         $this->load->view('pages/addalbums', $data);
         $this->load->view('templates/footer');
      } else {
         $this->albums_model->insert($this->dataset());
         $this->session->set_flashdata('message', 'Album berhasil dibuat!');
         return redirect('admin/albums');
      }
   }

   public function edit()
   {
      $id = $this->uri->segment(4);
      if (NULL === $id) return redirect('admin/albums');
      if (!$this->validation()) {
         $data['parent_pages'] = $this->halaman_model->get_parent_pages();
         $data['user'] = $this->user_model->get_current_user();
         $data['pagename'] = 'Album Foto';
         $data['query'] = $this->albums_model->getAlbumsById($id);
         if (!$data['query']) show_404();
         $this->load->view('templates/header', $data);
         $this->load->view('pages/editalbums', $data);
         $this->load->view('templates/footer');
      } else {
         $this->albums_model->edit($id, $this->dataset($id));
         $this->session->set_flashdata('message', 'Album berhasil diubah!');
         return redirect('admin/albums');
      }
   }

   public function delete()
   {
      $id = $this->uri->segment(4);
      if (NULL === $id) return redirect('admin/albums');
      if ($this->albums_model->delete($id)) {
         $this->session->set_flashdata('message', 'Album berhasil dihapus!');
         return redirect('admin/albums');
      }
   }

   private function dataset($id = 0)
   {
      $data['album_title'] = $this->input->post('album_title', true);
      $data['album_description'] = $this->input->post('album_description', true);
      if ($id == 0) $data['created_at'] = date('Y-m-d H:i:s');
      return $data;
   }

   private function validation()
   {
      $this->load->library('form_validation');
      $val = $this->form_validation;
      $val->set_rules('album_title', 'Judul Album', 'trim|required');
      $val->set_rules('album_description', 'Keterangan', 'trim');
      return $val->run();
   }

   public function view($id)
   {
      $this->form_validation->set_rules($this->albums_model->photoRules());

      if ($this->form_validation->run() == false) {
         $data['parent_pages'] = $this->halaman_model->get_parent_pages();
         $data['user'] = $this->user_model->get_current_user();
         $data['album'] = $this->albums_model->getAlbumsById($id);
         $data['foto'] = $this->albums_model->showPhoto($id);
         $data['pagename'] = 'Detail Album';
         $this->load->view('templates/header', $data);
         $this->load->view('pages/detailalbum', $data);
         $this->load->view('templates/footer');
      } else {
         if ($this->albums_model->addPhoto($id) != false) {
            $this->session->set_flashdata('message', 'Berhasil menambahkan foto');
            redirect('admin/albums/view/' . $id);
         } else {
            $this->session->set_flashdata('message', 'Kesalahan saat mengupload');
            redirect('admin/albums/view/' . $id);
         }
      }
   }
}
