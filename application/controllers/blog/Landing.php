<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('landing_model');
    }

    public function index()
    {
        $data['carousel'] = $this->landing_model->getRecentPost();
        $data['menu'] = $this->landing_model->getMenu();
        $data['submenu'] = $this->landing_model->getSubMenu();
        $data['kepala'] = $this->landing_model->getKepala();

        // Pagination Start
        // Pagination
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->landing_model->published();
        $config['per_page'] = 5;

        // Styling
        $config['full_tag_open'] = '<nav aria-label="Navigasi"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_links'] = 3;

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

        $data['page'] = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
        $data['postingan'] = $this->landing_model->getAllPost($config['per_page'], $data['page']);
        // Pagination End

        $this->landing_model->countVisitor();
        $this->load->view('pages/blog/home', $data);
    }
}
