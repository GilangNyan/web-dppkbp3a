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

    function getUserInfo($id)
    {
        $q = $this->db->get_where('user', ['id' => $id], 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('User dengan id ' . $row->id . ' tidak ditemukan');
            return false;
        }
    }

    function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('user', ['email' => $email], 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    function insertToken($userid)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $data = array(
            'token' => $token,
            'user_id' => $userid,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $data);
        $this->db->query($query);
        return $token . $userid;
    }

    function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('tokens', ['token' => $tkn, 'user_id' => $uid], 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $userInfo = $this->getUserInfo($row->user_id);
            return $userInfo;
        } else {
            return false;
        }
    }

    function updatePassword($post)
    {
        $this->db->where('id', $post['id']);
        $this->db->update('user', ['password' => $post['password']]);
        return true;
    }
}
