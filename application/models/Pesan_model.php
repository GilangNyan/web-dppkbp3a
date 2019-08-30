<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Pesan_model extends CI_Model
{
    function getPesan()
    {
        return $this->db->get('pesan')->result();
    }
}
