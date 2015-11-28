<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Tambah_Kategory extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nama' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('kategory');
        }

        public function down()
        {
                $this->dbforge->drop_table('kategory');
        }
}
