<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_video extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'judul' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'deskripsi' => array(
                'type' => 'TEXT'
            ),
            'filename' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'tanggal' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('video', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('video');
    }
}
