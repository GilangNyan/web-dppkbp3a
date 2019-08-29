<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Albums_model extends CI_Model
{
   function getAlbums()
   {
      return $this->db->get('albums')->result();
   }

   function getAlbumsById($id) {
      return $this->db->where('id', $id)->get('albums')->row();
   }

   function insert($dataset) {
      return $this->db->insert('albums', $dataset);
   }

   function edit($id, $dataset) {
      return $this->db->where('id', $id)->update('albums', $dataset);
   }

   function delete($id = 0) {
      return $this->db->where('id', $id)->delete('albums');
   }
}
