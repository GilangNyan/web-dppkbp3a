<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_kepala_dinas extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'jabatan' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'foto' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'default.jpg'
            ),
            'sambutan' => array(
                'type' => 'text',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('kepala_dinas', true);

        // Tambah template kepala dinas
        $this->db->empty_table('user');
        $this->db->set('id', 1);
        $this->db->set('nama', 'Nama Kepala Dinas');
        $this->db->set('jabatan', 'Kepala Dinas');
        $this->db->set('foto', 'default.jpg');
        $this->db->set('sambutan', 'Isi dengan sambutan kepala dinas.');
        // $this->db->set('dibuat_pada', date('Y-m-d H:i:s'));
        $this->db->insert('kepala_dinas');
    }

    public function down()
    {
        $this->dbforge->drop_table('kepala_dinas');
    }
}
