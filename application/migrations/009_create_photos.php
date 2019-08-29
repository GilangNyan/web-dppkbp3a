<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_photos extends CI_Migration
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
            'photo_album_id' => array(
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => true
            ),
            'photo_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            ),
            "updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
            // 'updated_at' => array(
            //     'type' => 'TIMESTAMP',
            //     'default' => 'CURRENT_TIMESTAMP',
            //     'on_update' => 'NOW()'
            // )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('photos', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('photos');
    }
}
