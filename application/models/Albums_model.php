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

    function deletePhoto($id)
    {
        $this->_deletePhoto($id);
        return $this->db->delete('photos', ['id' => $id]);
    }

    private function _uploadFoto($idalbum, $nama)
    {
        $config['upload_path'] = './assets/img/album/'; //'./assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['file_name'] = $idalbum . '_' . $nama;
        $config['overwrite'] = false;
        $config['max_size']  = '2048000';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('upload')) {
            // Ambil data gambar
            $data = $this->upload->data();

            // Konfigurasi image_lib
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/album/' . $data['file_name'];
            // $config['create_thumb'] = true;
            $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
            if ($imageSize['width'] > $imageSize['height']) {
                $config['height'] = 500;
            } else if ($imageSize['width'] < $imageSize['height']) {
                $config['width'] = 500;
            } else {
                $config['height'] = 500;
                $config['width'] = 500;
            }
            $config['maintain_ratio'] = true;
            $config['new_image'] = './assets/img/album/thumbs/';

            // Lakukan Resize Gambar
            $this->image_lib->initialize($config);
            $this->image_lib->resize();

            $this->image_lib->clear();

            // Konfigurasi image_lib
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/album/thumbs/' . $data['file_name'];
            $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
            // $config['create_thumb'] = true;
            $config['width'] = 500;
            $config['height'] = 500;
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
            // print_r($_POST);
            // print_r($this->upload->data());
            // exit();
            return null;
        }
    }

    private function _deletePhoto($id)
    {
        $foto = $this->_getPhoto($id);
        $filename = explode(".", $foto->photo_name)[0];
        array_map('unlink', glob(FCPATH . "assets/img/album/$filename.*"));
        array_map('unlink', glob(FCPATH . "assets/img/album/thumbs/$filename.*"));
        return true;
    }

    private function _getPhoto($id)
    {
        return $this->db->get_where('photos', ['id' => $id])->row();
    }

    function photoRules()
    {
        $rules = [
            [
                'field' => 'judul',
                'label' => 'Judul Foto',
                'rules' => 'trim|required|max_length[150]'
            ]
        ];

        return $rules;
    }
}
