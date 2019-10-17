<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Preferences_model extends CI_Model
{
    var $API = "";

    public function __construct()
    {
        parent::__construct();
        $this->API = "http://dev.farizdotid.com/api/daerahindonesia/";
    }

    public function getFotoKepala()
    {
        $this->db->select('foto');
        $this->db->from('kepala_dinas');
        return $this->db->get()->row();
    }

    public function getKepala()
    {
        $this->db->select('nama, jabatan');
        $this->db->from('kepala_dinas');
        return $this->db->get()->row();
    }

    public function getSambutan()
    {
        $this->db->select('sambutan');
        $this->db->from('kepala_dinas');
        return $this->db->get()->row();
    }

    public function editKepala($nama, $jabatan)
    {
        $data = array(
            'nama' => $nama,
            'jabatan' => $jabatan
        );

        return $this->db->update('kepala_dinas', $data, ['id' => '1']);
    }

    public function editNama($nama)
    {
        $data = array(
            'nama' => $nama
        );

        return $this->db->update('kepala_dinas', $data, ['id' => '1']);
    }

    public function editJabatan($jabatan)
    {
        $data = array(
            'jabatan' => $jabatan
        );

        return $this->db->update('kepala_dinas', $data, ['id' => '1']);
    }

    public function editSambutan($sambutan)
    {
        $data = array(
            'sambutan' => $sambutan
        );

        return $this->db->update('kepala_dinas', $data, ['id' => '1']);
    }

    public function updateFoto($id)
    {
        $data = array(
            'foto' => $this->_uploadImage($id)
        );

        return $this->db->update('kepala_dinas', $data, ['id' => $id]);
    }

    private function _uploadImage($id)
    {
        $config['upload_path'] = './assets/dist/img/'; //'./assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $id;
        $config['overwrite'] = true;
        $config['max_size']  = '4096';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        } else {
            $error = $this->upload->display_errors();
            echo $error;
            // print_r($_POST);
            // print_r($this->upload->data());
            // exit();
            return "default.jpg";
        }
    }

    public function getProfil()
    {
        return $this->db->get_where('profil', ['id' => 1])->row();
    }

    public function profilRules()
    {
        $rules = [
            [
                'field' => 'namadinas',
                'label' => 'Nama Dinas',
                'rules' => 'trim|required|max_length[225]'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required|max_length[225]'
            ],
            [
                'field' => 'telepon',
                'label' => 'Telepon',
                'rules' => 'trim|required|max_length[13]|numeric'
            ],
            [
                'field' => 'postal',
                'label' => 'Kode Pos',
                'rules' => 'trim|required|max_length[5]|numeric'
            ]
        ];
        return $rules;
    }

    public function updateProfil()
    {
        $data = array(
            'id' => 1,
            'namadinas' => htmlspecialchars($this->input->post('namadinas')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'provinsi' => htmlspecialchars($this->input->post('provinsi')),
            'kabupaten' => htmlspecialchars($this->input->post('kabupaten')),
            'kecamatan' => htmlspecialchars($this->input->post('kecamatan')),
            'desa' => htmlspecialchars($this->input->post('desa')),
            'telepon' => htmlspecialchars($this->input->post('telepon')),
            'kodepos' => htmlspecialchars($this->input->post('postal'))
        );

        if ($this->input->post('mode') == 'tambah') {
            $this->db->insert('profil', $data);
            return true;
        } else if ($this->input->post('mode') == 'edit') {
            $this->db->update('profil', $data, ['id' => 1]);
            return true;
        } else {
            return false;
        }
    }

    public function getProvinsi()
    {
        return json_decode($this->curl->simple_get($this->API . 'provinsi'));
    }

    public function getKabupaten($idprov)
    {
        return json_decode($this->curl->simple_get($this->API . 'provinsi/' . $idprov . '/kabupaten'));
    }

    public function getKecamatan($idkab)
    {
        return json_decode($this->curl->simple_get($this->API . 'provinsi/kabupaten/' . $idkab . '/kecamatan'));
    }

    public function getDesa($idkec)
    {
        return json_decode($this->curl->simple_get($this->API . 'provinsi/kabupaten/kecamatan/' . $idkec . '/desa'));
    }
}
