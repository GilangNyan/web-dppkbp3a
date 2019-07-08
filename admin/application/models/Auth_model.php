<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Auth_model extends CI_Model
{

    function register()
    {
        $data = array(
            'id' => htmlspecialchars(uniqid('user-')),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );

        $this->db->insert('user', $data);
    }

    function login($user)
    {
        $data = array(
            'username' => $user['username'],
            'role' => $user['role']
        );
        $this->session->set_userdata($data);
    }

    function get_user($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
}
