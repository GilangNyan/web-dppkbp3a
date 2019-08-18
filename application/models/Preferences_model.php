<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Preferences_model extends CI_Model
{
    public function getFotoKepala()
    {
        $this->db->select('foto');
        $this->db->from('kepala_dinas');
        return $this->db->get()->result();
    }

    public function getKepala()
    {
        $this->db->select('nama, jabatan');
        $this->db->from('kepala_dinas');
        return $this->db->get()->result();
    }

    public function getSambutan()
    {
        $this->db->select('sambutan');
        $this->db->from('kepala_dinas');
        return $this->db->get()->result();
    }

    public function editNama($nama)
    {
        $data = array(
            'nama' => $nama
        );

        return $this->db->update('kepala_dinas', $data, ['id' => '123456']);
    }

    public function editJabatan($jabatan)
    {
        $data = array(
            'jabatan' => $jabatan
        );

        return $this->db->update('kepala_dinas', $data, ['id' => '123456']);
    }

    public function editSambutan($sambutan)
    {
        $data = array(
            'sambutan' => $sambutan
        );

        return $this->db->update('kepala_dinas', $data, ['id' => '123456']);
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
        $config['max_size']  = '2048000';
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
}
