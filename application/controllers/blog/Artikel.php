<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
    }

    public function index()
    {
        // Pagination
        $config['base_url'] = base_url('artikel');
        $config['total_rows'] = $this->artikel_model->published();
        $config['per_page'] = 10;

        // Styling
        $config['full_tag_open'] = '<nav aria-label="Navigasi"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_links'] = 5;

        $config['first_link'] = 'Awal';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Akhir';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['data'] = $this->artikel_model->getAllPost($config['per_page'], $data['page']);

        $this->load->view('pages/blog/artikel', $data);
    }

    public function getArtikel($tahun, $bulan, $slug)
    {
        //
    }
}
