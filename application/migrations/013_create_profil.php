<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_profil extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'namadinas' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'alamat' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'provinsi' => array(
                'type' => 'INT',
                'unsigned' => true
            ),
            'kabupaten' => array(
                'type' => 'INT',
                'unsigned' => true
            ),
            'kecamatan' => array(
                'type' => 'INT',
                'unsigned' => true
            ),
            'desa' => array(
                'type' => 'INT',
                'unsigned' => true
            ),
            'telepon' => array(
                'type' => 'VARCHAR',
                'constraint' => '13',
            ),
            'kodepos' => array(
                'type' => 'VARCHAR',
                'constraint' => '5',
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('profil', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('profil');
    }
}
