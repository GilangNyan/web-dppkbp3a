<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_pesan extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'isi' => array(
                'type' => 'TEXT'
            ),
            'tanggal' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            ),
            'dibaca' => array(
                'type' => 'INT',
                'unsigned' => true,
                'default' => 0
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('pesan', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('pesan');
    }
}
