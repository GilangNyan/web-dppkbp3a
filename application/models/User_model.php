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

    function getUserById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    function addUser()
    {
        $data = array(
            'id' => htmlspecialchars(uniqid('user-')),
            'nama' => htmlspecialchars($this->input->post('namalengkap', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => htmlspecialchars($this->input->post('role'))
        );

        return $this->db->insert('user', $data);
    }

    function editUser($id)
    {
        $data = array(
            'nama' => htmlspecialchars($this->input->post('namalengkap', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'role' => htmlspecialchars($this->input->post('role'))
        );

        return $this->db->update('user', $data, ['id' => $id]);
    }

    function deleteUser($id)
    {
        return $this->db->delete('user', ['id' => $id]);
    }

    function addUserRules()
    {
        $rules = [
            [
                'field' => 'namalengkap',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[18]|is_unique[user.username]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|valid_email|is_unique[user.email]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]'
            ],
            [
                'field' => 'passconf',
                'label' => 'Konfirmasi Password',
                'rules' => 'trim|required|matches[password]'
            ],
        ];
        return $rules;
    }

    function editUserRules()
    {
        $rules = [
            [
                'field' => 'namalengkap',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[18]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|valid_email|is_unique[user.email]'
            ],
        ];
        return $rules;
    }
}
