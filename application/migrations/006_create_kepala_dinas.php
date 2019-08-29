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
    }

    public function down()
    {
        $this->dbforge->drop_table('kepala_dinas');
    }
}
