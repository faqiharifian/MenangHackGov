<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Tambah_Users extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '150',
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '60',
                        ),
                        'nama' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '250'
                        ),
                        'level' => array(
                            'type' => 'INT',
                            'default' => '0',
                        ),
                        'tentang' => array(
                            'type' => 'TEXT',
                            'nullable' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}
