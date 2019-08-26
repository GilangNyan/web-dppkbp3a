<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dummy extends CI_Controller {

   public function index() {
      $this->set_tulisan();
      $this->set_halaman();
   }

   public function set_halaman() {
      $this->db->truncate('halaman');
      $faker = Faker\Factory::create();
      $data  = [];
      for($i = 1; $i <= 5; $i++) {
         $title = $faker->sentence($nbWords = 1, $variableNbWords = true);
         $date = $faker->dateTimeBetween($startDate = '-4 months', $endDate = 'now', $timezone = 'Asia/Jakarta');
         $data[] = [
            'id_halaman' => url_title($title),
            'tanggal' => $date->format('Y-m-d H:i:s'),
            'judul' => $title,
            'isi' => $faker->sentence($nbWords = 200, $variableNbWords = true),
            'parent' => NULL,
            'slug' => url_title($title)
         ];
      }
      $this->db->insert_batch('halaman', $data);
   }

   public function set_tulisan() {
      // $this->db->delete('post');
      // $this->db->delete('komentar');
      $faker = Faker\Factory::create();
      $data  = [];
      for($i = 1; $i <= 35; $i++) {
         $title = $faker->sentence($nbWords = 1, $variableNbWords = true);
         $date = $faker->dateTimeBetween($startDate = '-4 months', $endDate = 'now', $timezone = 'Asia/Jakarta');
         $data[] = [
            'id' => url_title($title),
            'judul' => $title,
            'isi' => $faker->sentence($nbWords = 200, $variableNbWords = true),
            'tanggal' => $date->format('Y-m-d H:i:s'),
            'slug' => url_title($title),
            'image' => 'post_default.jpg',
            'author' => 'user-5d220f1860ad4',
            'status' => 1,
            'views' => 10,

         ];
      }
      $this->db->insert_batch('post', $data);
   }
}
