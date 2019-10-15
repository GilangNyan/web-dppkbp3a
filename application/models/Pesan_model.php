<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Pesan_model extends CI_Model
{
    function getPesan()
    {
        return $this->db->get('pesan')->result();
    }

    function getPesanById($id)
    {
        $pesan = $this->db->get_where('pesan', ['id' => $id])->row();
        if ($pesan->dibaca == 0) {
            $this->db->update('pesan', ['dibaca' => 1], ['id' => $id]);
        }
        return $pesan;
    }

    function delete($id)
    {
        return $this->db->delete('pesan', ['id' => $id]);
    }
}
