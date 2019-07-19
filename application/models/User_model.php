<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class User_model extends CI_Model
{
    function get_current_user()
    {
        $username = $this->session->userdata('username');

        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
}
