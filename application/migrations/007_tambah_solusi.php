<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Tambah_Solusi extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                            'type' => 'INT',
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                        ),
                        'id_masalah' => array(
                            'type' => 'INT',
                            'unsigned' => TRUE,
                        ),
                        'deskripsi' => array(
                            'type' => 'TEXT',
                        ),
                        'gambar' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '150',
                        ),
                        'status' => array(
                            'type' => 'INT',
                            'default' => '0'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('solusi');
        }

        public function down()
        {
                $this->dbforge->drop_table('solusi');
        }
}
