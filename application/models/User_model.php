<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class User_model extends CI_Model
{
    function get_current_user()
    {
        $username = $this->session->userdata('username');

        return $this->db->get_where('user', ['username' => $username])->row();
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
                'rules' => 'trim|required|max_length[40]'
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

    function editUserRules($id)
    {
        $user = $this->db->get_where('user', ['id' => $id])->row();
        $email = $user->email;
        $username = $user->username;
        if ($this->input->post('email') != $email) {
            $ruleemail = '|is_unique[user.email]';
        } else {
            $ruleemail = '';
        }
        if ($this->input->post('username') != $username) {
            $ruleusername = '|is_unique[user.username]';
        } else {
            $ruleusername = '';
        }

        $rules = [
            [
                'field' => 'namalengkap',
                'label' => 'Nama',
                'rules' => 'trim|required|max_length[40]'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[18]' . $ruleusername
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|valid_email' . $ruleemail
            ],
        ];
        return $rules;
    }

    function editPasswordRules()
    {
        $rules = [
            [
                'field' => 'oldpassword',
                'label' => 'Password lama',
                'rules' => 'trim|required|min_length[6]'
            ],
            [
                'field' => 'newpassword',
                'label' => 'Password baru',
                'rules' => 'trim|required|min_length[6]'
            ],
            [
                'field' => 'retypepassword',
                'label' => 'Ketik ulang password',
                'rules' => 'trim|required|min_length[6]|matches[newpassword]'
            ],
        ];

        return $rules;
    }

    function editFotoRules()
    {
        $rules = [
            [
                'field' => 'fotoprofil',
                'label' => 'Foto profil',
                'rules' => 'required'
            ]
        ];

        return $rules;
    }

    function editDataDiri($id)
    {
        $data = array(
            'nama' => htmlspecialchars($this->input->post('namalengkap', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true))
        );

        return $this->db->update('user', $data, ['id' => $id]);
    }

    function editPassword($id)
    {
        $data = array(
            'password' => password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT)
        );

        return $this->db->update('user', $data, ['id' => $id]);
    }

    function editFoto($id)
    {
        $data = array(
            'image' => $this->_uploadFoto($id)
        );

        $this->db->update('user', $data, ['id' => $id]);
    }

    private function _uploadFoto($id)
    {
        $config['upload_path'] = './assets/dist/img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $id;
        $config['overwrite'] = true;
        $config['max_size']  = '2048000';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('fotoprofil')) {
            // Ambil data gambar
            $data = $this->upload->data();

            // Konfigurasi image_lib
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/dist/img/' . $data['file_name'];
            // $config['create_thumb'] = true;
            $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
            if ($imageSize['width'] > $imageSize['height']) {
                $config['height'] = 300;
            } else if ($imageSize['width'] < $imageSize['height']) {
                $config['width'] = 300;
            } else {
                $config['height'] = 300;
                $config['width'] = 300;
            }
            $config['maintain_ratio'] = true;

            // Lakukan Resize Gambar
            $this->image_lib->initialize($config);
            $this->image_lib->resize();

            $this->image_lib->clear();

            // Konfigurasi image_lib
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/dist/img/' . $data['file_name'];
            $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
            // $config['create_thumb'] = true;
            $config['width'] = 300;
            $config['height'] = 300;
            if ($imageSize['width'] > $imageSize['height']) {
                $config['x_axis'] = round($imageSize['width'] / 4);
            } else if ($imageSize['width'] < $imageSize['height']) {
                $config['y_axis'] = round($imageSize['height'] / 4);
            } else {
                $config['y_axis'] = round($imageSize['height'] / 4);
                $config['x_axis'] = round($imageSize['width'] / 4);
            }
            $config['maintain_ratio'] = false;

            // Lakukan Crop Gambar
            $this->image_lib->initialize($config);
            $this->image_lib->crop();

            $this->image_lib->clear();

            return $this->upload->data("file_name");
        } else {
            $error = $this->upload->display_errors();
            echo $error;
            return "default.jpg";
        }
    }

    public function notifications()
    {
        return $this->db->get_where('pesan', ['dibaca' => 0])->num_rows();
    }
}
