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
}
