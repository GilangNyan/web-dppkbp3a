<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_menu extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id_menu' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'nama_menu' => array(
                'type' => 'VARCHAR',
                'constraint' => '150'
            ),
            'posisi' => array(
                'type' => 'INT',
                'unsigned' => true
            )
        ));
        $this->dbforge->add_key('id_menu', true);
        $this->dbforge->create_table('menu', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('menu');
    }
}
