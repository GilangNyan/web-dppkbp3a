<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_tokens extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'token' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'user_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'created' => array(
                'type' => 'DATE'
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('tokens', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('tokens');
    }
}
