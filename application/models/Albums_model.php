<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Albums_model extends CI_Model
{
    function getAlbums()
    {
        return $this->db->get('albums')->result();
    }

    function getAlbumsById($id)
    {
        return $this->db->where('id', $id)->get('albums')->row();
    }

    function insert($dataset)
    {
        return $this->db->insert('albums', $dataset);
    }

    function edit($id, $dataset)
    {
        return $this->db->where('id', $id)->update('albums', $dataset);
    }

    function delete($id = 0)
    {
        return $this->db->where('id', $id)->delete('albums');
    }

    function showPhoto($idalbum)
    {
        return $this->db->get_where('photos', ['photo_album_id' => $idalbum])->result();
    }

    function addPhoto($idalbum)
    {
        $namafoto = htmlspecialchars($this->input->post('judul'));
        $upload = $this->_uploadFoto($idalbum, $namafoto);
        if ($upload != null) {
            $data = array(
                'photo_album_id' => $idalbum,
                'photo_name' => $upload
            );
            $this->db->insert('photos', $data);
            return true;
        } else {
            return false;
        }
    }

    private function _uploadFoto($idalbum, $nama)
    {
        $config['upload_path'] = './assets/img/album/'; //'./assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['file_name'] = $idalbum . '_' . $nama;
        $config['overwrite'] = true;
        $config['max_size']  = '2048000';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('upload')) {
            return $this->upload->data("file_name");
        } else {
            $error = $this->upload->display_errors();
            echo $error;
            // print_r($_POST);
            // print_r($this->upload->data());
            // exit();
            return null;
        }
    }

    function photoRules()
    {
        $rules = [
            [
                'field' => 'judul',
                'label' => 'Judul Foto',
                'rules' => 'trim|required|max_length[150]|is_unique[photos.photo_name]'
            ]
        ];

        return $rules;
    }
}
