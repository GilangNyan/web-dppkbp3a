<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Migration_create_user extends CI_Migration
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
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '18'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'default.jpg'
            ),
            'role' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'default' => 'USER'
            ),
            'dibuat_pada' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('user', true);

        // Tambah user awal
        $this->db->empty_table('user');
        $this->db->set('id', 1);
        $this->db->set('nama', 'Administrator');
        $this->db->set('username', 'admin');
        $this->db->set('email', 'admin@gmail.com');
        $this->db->set('password', password_hash('123456', PASSWORD_DEFAULT));
        $this->db->set('image', 'default.jpg');
        $this->db->set('role', 'GOD');
        // $this->db->set('dibuat_pada', date('Y-m-d H:i:s'));
        $this->db->insert('user');
    }

    public function down()
    {
        $this->dbforge->drop_table('user');
    }
}
