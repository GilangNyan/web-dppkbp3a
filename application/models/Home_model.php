<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Home_model extends CI_Model
{
    var $API = "";

    public function __construct()
    {
        parent::__construct();
        $this->API = "http://dev.farizdotid.com/api/daerahindonesia/";
    }

    public function get_current_user()
    {
        $username = $this->session->userdata('username');

        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function getTodayVisitor()
    {
        $tanggal = date('Ymd');

        $this->db->select('SUM(hits) as total');
        $this->db->from('visitor');
        $this->db->where('tanggal', $tanggal);
        $hasil = $this->db->get()->result();
        foreach ($hasil as $row) {
            return $row->total;
        }
    }

    public function getOnlineVisitor()
    {
        $bataswaktu = time() - 300;
        $this->db->select('*');
        $this->db->from('visitor');
        $this->db->where('online >', $bataswaktu);
        return $this->db->count_all_results();
    }

    public function getTotalVisitor()
    {
        $this->db->select('SUM(hits) as total');
        $this->db->from('visitor');
        $hasil = $this->db->get()->result();
        foreach ($hasil as $row) {
            return $row->total;
        }
    }

    public function getTotalPost()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('status', 1);
        return $this->db->count_all_results();
    }

    public function postPerformance()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->order_by('views', 'DESC');
        $this->db->limit(5, 0);
        return $this->db->get()->result();
    }

    public function chartBrowser()
    {
        $this->db->select('browser, SUM(hits) as jumlah');
        $this->db->from('visitor');
        $this->db->group_by('browser');
        return $this->db->get()->result();
    }

    public function getTotalComments()
    {
        $this->db->select('*');
        $this->db->from('komentar');
        return $this->db->count_all_results();
    }

    public function getTotalMessages()
    {
        $this->db->select('*');
        $this->db->from('pesan');
        return $this->db->count_all_results();
    }

    public function profil()
    {
        $kepala = $this->db->get_where('kepala_dinas', ['id' => 1])->row();
        $profil = $this->db->get_where('profil', ['id' => 1])->row();
        $dataprov = json_decode($this->curl->simple_get($this->API . 'provinsi'));

        $provinsi = '';
        $kabupaten = '';
        $kecamatan = '';
        $desa = '';
        $namadinas = '';
        $alamat = '';
        $telepon = '';
        $kodepos = '';

        if ($profil != null) {
            $connected = $this->_checkConnection();
            if ($connected == true) {
                $datakab = json_decode($this->curl->simple_get($this->API . 'provinsi/' . $profil->provinsi . '/kabupaten'));
                $datakec = json_decode($this->curl->simple_get($this->API . 'provinsi/kabupaten/' . $profil->kabupaten . '/kecamatan'));
                $datades = json_decode($this->curl->simple_get($this->API . 'provinsi/kabupaten/kecamatan/' . $profil->kecamatan . '/desa'));
                foreach ($dataprov->semuaprovinsi as $row) {
                    if ($profil->provinsi == $row->id) {
                        $provinsi .= $row->nama;
                    }
                }
                foreach ($datakab->kabupatens as $row) {
                    if ($profil->kabupaten == $row->id) {
                        $kabupaten .= $row->nama;
                    }
                }
                foreach ($datakec->kecamatans as $row) {
                    if ($profil->kecamatan == $row->id) {
                        $kecamatan .= $row->nama;
                    }
                }
                foreach ($datades->desas as $row) {
                    if ($profil->desa == $row->id) {
                        $desa .= $row->nama;
                    }
                }
            } else {
                $provinsi = 'Jawa Barat';
                $kabupaten = 'Kota Tasikmalaya';
                $kecamatan = 'Cihideung';
                $desa = 'Yudanagara';
            }
            $namadinas .= $profil->namadinas;
            $alamat .= $profil->alamat;
            $split = str_split($profil->telepon, 4);
            $telepon .= '(' . $split[0] . ') ' . $split[1] . $split[2];
            $kodepos .= $profil->kodepos;
        }

        $data = [
            'kepala' => $kepala->nama,
            'dinas' => $namadinas,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'telepon' => $telepon,
            'kodepos' => $kodepos
        ];

        return $data;
    }

    private function _checkConnection()
    {
        $connected = @fsockopen("www.google.com", 80);

        if ($connected) {
            $is_conn = true;
            fclose($connected);
        } else {
            $is_conn = false;
        }
        return $is_conn;
    }
}
