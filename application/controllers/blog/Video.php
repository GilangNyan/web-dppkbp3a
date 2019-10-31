<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Video extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('landing_model');
        $this->load->model('halaman_model');
        $this->load->model('blogvideo_model');
    }

    public function index($tahun, $bulan)
    {
        $data['judulcard'] = $this->namacard($tahun, $bulan);
        $data['menu'] = $this->landing_model->getMenu();
        $data['submenu'] = $this->landing_model->getSubMenu();
        $data['kepala'] = $this->landing_model->getKepala();
        $data['parent_pages'] = $this->halaman_model->get_parent_pages();
        $data['sub_pages'] = $this->halaman_model->get_sub_pages();
        $data['archiveyear'] = $this->sidebar_model->archiveYear();
        $data['archivemonth'] = $this->sidebar_model->archiveMonth();
        $data['photoyear'] = $this->sidebar_model->photosYear();
        $data['photomonth'] = $this->sidebar_model->photosMonth();
        $data['videoyear'] = $this->sidebar_model->videosYear();
        $data['videomonth'] = $this->sidebar_model->videosMonth();
        $data['video'] = $this->blogvideo_model->getVideo($tahun, $bulan);
        $this->load->view('pages/blog/video', $data);
    }

    public function modalVideo()
    {
        $id = $this->input->post('id');
        $data = $this->blogvideo_model->getVideoById($id);
        echo json_encode($data);
    }

    private function namacard($tahun, $bulan)
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
        $judulcard = 'Video bulan ' . $nbulan . ' ' . $tahun;
        return $judulcard;
    }
}
