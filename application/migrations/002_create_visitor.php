<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_visitor extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'ip' => array(
                'type' => 'VARCHAR',
                'constraint' => '20'
            ),
            'tanggal' => array(
                'type' => 'DATE',
            ),
            'hits' => array(
                'type' => 'INT',
                'unsigned' => true
            ),
            'online' => array(
                'type' => 'INT'
            ),
            'browser' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'platform' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            )
        ));
        $this->dbforge->create_table('visitor', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('visitor');
    }
}
