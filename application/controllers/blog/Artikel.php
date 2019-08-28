<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
        $this->load->model('landing_model');
        $this->load->model('halaman_model');
        $this->load->model('preferences_model');
    }

    public function index()
    {
        $data['archiveyear'] = $this->sidebar_model->archiveYear();
        $data['archivemonth'] = $this->sidebar_model->archiveMonth();

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
        $this->load->library('disqus');
        $data['archiveyear'] = $this->sidebar_model->archiveYear();
        $data['archivemonth'] = $this->sidebar_model->archiveMonth();
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['sub_pages'] = $this->halaman_model->get_sub_pages();
        $data['kepala'] = $this->landing_model->getKepala();
        $data['artikel'] = $this->artikel_model->getPostDetail($tahun, $bulan, $slug);
        $data['disqus'] = $this->disqus->get_html();
        $this->artikel_model->countPostViews($tahun, $bulan, $slug);
        $data['komentar'] = $this->artikel_model->getKomentar($slug);
        $data['user'] = $this->user_model->get_current_user();

        $this->load->view('pages/blog/posting', $data);
    }

    public function getArchive($tahun, $bulan)
    {
        switch ($bulan) {
            case "01":
                $nbulan = "Januari";
                break;
            case "02":
                $nbulan = "Februari";
                break;
            case "03":
                $nbulan = "Maret";
                break;
            case "04":
                $nbulan = "April";
                break;
            case "05":
                $nbulan = "Mei";
                break;
            case "06":
                $nbulan = "Juni";
                break;
            case "07":
                $nbulan = "Juli";
                break;
            case "08":
                $nbulan = "Agustus";
                break;
            case "09":
                $nbulan = "September";
                break;
            case "10":
                $nbulan = "Oktober";
                break;
            case "11":
                $nbulan = "November";
                break;
            case "12":
                $nbulan = "Desember";
                break;
        }
        $data['judulcard'] = 'Arsip bulan ' . $nbulan . ' ' . $tahun;
        $data['archiveyear'] = $this->sidebar_model->archiveYear();
        $data['archivemonth'] = $this->sidebar_model->archiveMonth();
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['sub_pages'] = $this->halaman_model->get_sub_pages();
        $data['kepala'] = $this->landing_model->getKepala();
        $data['user'] = $this->user_model->get_current_user();
        $data['archive'] = $this->artikel_model->getArchive($tahun, $bulan);

        $this->load->view('pages/blog/arsip', $data);
    }

    public function addKomentar()
    {
        $urlpost = $this->session->userdata('referred_from');
        $nama = $this->input->post('displayname');
        $email = $this->input->post('email');
        $komentar = $this->input->post('komentar');
        $postid = $this->input->post('postid');

        if ($this->session->userdata('username') != null) {
            $ismod = 1;
            $idmod = $this->input->post('idmod');
            $this->artikel_model->addKomentar($nama, $email, $komentar, $postid, $ismod, $idmod);
            $this->session->set_flashdata('message', 'Komentar telah ditambahkan');
            redirect($urlpost, 'refresh');
        } else {
            $ismod = 0;
            $this->artikel_model->addKomentar($nama, $email, $komentar, $postid, $ismod);
            $this->session->set_flashdata('message', 'Komentar telah ditambahkan');
            redirect($urlpost, 'refresh');
        }
    }

    public function addReply($id)
    {
        $urlpost = $this->session->userdata('referred_from');
        $nama = $this->input->post('displayname');
        $email = $this->input->post('email');
        $komentar = $this->input->post('komentar');
        $postid = $this->input->post('postid');

        if ($this->session->userdata('username') != null) {
            $ismod = 1;
            $idmod = $this->input->post('idmod');
            $this->artikel_model->addReply($nama, $email, $komentar, $postid, $id, $ismod, $idmod);
            $this->session->set_flashdata('message', 'Komentar telah ditambahkan');
            redirect($urlpost, 'refresh');
        } else {
            $ismod = 0;
            $this->artikel_model->addReply($nama, $email, $komentar, $postid, $id, $ismod);
            $this->session->set_flashdata('message', 'Komentar telah ditambahkan');
            redirect($urlpost, 'refresh');
        }
    }

    public function readmore($slug)
    {
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['sub_pages'] = $this->halaman_model->get_sub_pages();
        $data['kepala'] = $this->landing_model->getKepala();
        $data['query'] = $this->artikel_model->readmore($slug);
        // print_r($data['query']);
        // exit;
        $this->load->view('pages/blog/artikel', $data);
    }

    public function sambutan()
    {
        $data['archivemonth'] = $this->sidebar_model->archiveMonth();
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['sub_pages'] = $this->halaman_model->get_sub_pages();
        $data['kepala'] = $this->preferences_model->getKepala();
        $data['photo_kepala'] = $this->preferences_model->getFotoKepala();
        $data['sambutan'] = $this->preferences_model->getSambutan();
        $this->load->view('pages/blog/sambutan', $data);
    }
}
