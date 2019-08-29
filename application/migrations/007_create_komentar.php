<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_komentar extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'display_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'id_post' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'id_parent' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'komentar' => array(
                'type' => 'TEXT'
            ),
            'is_mod' => array(
                'type' => 'INT',
                'unsigned' => true
            ),
            'id_mod' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'tanggal' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('komentar', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('komentar');
    }
}
