<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!$this->migration->current()) {
            show_error($this->migration->error_string());
        } else {
            echo 'Migrasi berhasil!';
        }
    }
}
