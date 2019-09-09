<?php
defined('BASEPATH') or exit('No direct script access allowed.');
require 'vendor/autoload.php';

class Videos_model extends CI_Model
{
    function getVideo()
    {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->order_by('diupload', 'DESC');
        return $this->db->get()->result();
    }

    function getVideoById($id)
    {
        return $this->db->get_where('video', ['id' => $id])->row();
    }

    function addVideo()
    {
        $id = uniqid('vid-');
        $judul = htmlspecialchars($this->input->post('judul'));
        $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
        $upload = $this->_uploadVideo($judul);
        if ($upload != null) {
            $data = array(
                'id' => $id,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'filename' => $upload
            );
            $this->db->insert('video', $data);
            return true;
        } else {
            return false;
        }
    }

    function editVideo()
    {
        $judul = htmlspecialchars($this->input->post('judul'));
        $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
        $data = array(
            'judul' => $judul,
            'deskripsi' => $deskripsi
        );
        if ($this->db->update('video', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function deleteVideo($id)
    {
        $this->_deleteVideo($id);
        return $this->db->delete('video', ['id' => $id]);
    }

    function addVideoRules()
    {
        $data = [
            [
                'field' => 'judul',
                'label' => 'Judul Video',
                'rules' => 'trim|required|max_length[225]'
            ],
            [
                'field' => 'deskripsi',
                'label' => 'Deskripsi Video',
                'rules' => 'trim|required'
            ]
        ];
        return $data;
    }

    private function _uploadVideo($judul)
    {
        $config['upload_path'] = './assets/videos/'; //'./assets/img/';
        $config['allowed_types'] = 'wmv|mp4|avi|flv|webm|m4a|mov|qt|mpeg';
        $config['file_name'] = $judul;
        $config['overwrite'] = false;
        $config['max_size']  = '2048000';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('upload')) {
            $filename = explode(".", $this->upload->data("file_name"))[0];
            $fnext = $this->upload->data("file_name");
            $ffmpeg = FFMpeg\FFMpeg::create([
                'ffmpeg.binaries'  => FCPATH . 'ffmpeg.exe', // the path to the FFMpeg binary
                'ffprobe.binaries' => FCPATH . 'ffprobe.exe', // the path to the FFProbe binary
                'timeout'          => 3600, // the timeout for the underlying process
                'ffmpeg.threads'   => 12,   // the number of threads that FFMpeg should use
            ]);
            $video = $ffmpeg->open(FCPATH . "assets/videos/$fnext");
            $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(15));
            $frame->save(FCPATH . "assets/videos/thumbs/$filename.jpg");
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

    private function _deleteVideo($id)
    {
        $video = $this->getVideoById($id);
        $filename = explode(".", $video->filename)[0];
        array_map('unlink', glob(FCPATH . "assets/videos/thumbs/$filename.*"));
        return array_map('unlink', glob(FCPATH . "assets/videos/$filename.*"));
    }
}
