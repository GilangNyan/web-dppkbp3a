<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_post extends CI_Migration
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
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'default' => 'post_default.jpg'
            ),
            'author' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'status' => array(
                'type' => 'INT',
                'unsigned' => true
            ),
            'views' => array(
                'type' => 'INT',
                'unsigned' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('post', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('post');
    }
}
