<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Pemeliharaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        //
    }

    public function backupDB()
    {
        $this->load->dbutil(); // Load DB Util

        // Preferensi Backup
        $prefs = array(
            'tables'        => array(),                     // Array of tables to backup.
            'ignore'        => array(),                     // List of tables to omit from the backup
            'format'        => 'zip',                       // gzip, zip, txt
            'filename'      => 'db_dppkbp3a.sql',           // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
            'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
            'newline'       => "\n",                        // Newline character used in backup file
            'foreign_key_checks' => FALSE
        );

        $backup = $this->dbutil->backup($prefs); // Backup

        write_file('backup/database/db_dppkbp3a.zip', $backup); // Untuk keperluan restore
        force_download('db_dppkbp3a.zip', $backup);
    }

    public function restoreDB()
    {
        $zip = new ZipArchive;
        if ($zip->open('backup/database/db_dppkbp3a.zip') === true) {
            $zip->extractTo('backup/database/');
            $zip->close();
            echo 'Berhasil diekstrak.';
        } else {
            echo 'Gagal diekstrak';
        }
        $isifile = file_get_contents('./backup/database/db_dppkbp3a.sql');
        $stringquery = rtrim($isifile, "\n;");
        $arrayquery = explode(";", $stringquery);
        foreach ($arrayquery as $query) {
            $this->db->query($query);
        }
    }
}
