<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class User_model extends CI_Model
{
    function get_current_user()
    {
        $username = $this->session->userdata('username');

        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    function getUser()
    {
        $username = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username !=', $username);
        $this->db->where('role !=', 'GOD');
        return $this->db->get()->result();
    }
}
