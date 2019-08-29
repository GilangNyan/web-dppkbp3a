<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_halaman extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id_halaman' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'judul' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'isi' => array(
                'type' => 'TEXT'
            ),
            'tanggal' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'parent' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
        ));
        $this->dbforge->add_key('id_halaman', true);
        $this->dbforge->create_table('halaman', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('halaman');
    }
}
