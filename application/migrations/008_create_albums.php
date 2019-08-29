<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_albums extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'album_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'album_description' => array(
                'type' => 'TEXT'
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            ),
            "updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
            // 'updated_at' => array(
            //     'type' => 'TIMESTAMP',
            //     'default' => 'CURRENT_TIMESTAMP',
            //     'on update' => 'NOW()'
            // )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('albums', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('albums');
    }
}
