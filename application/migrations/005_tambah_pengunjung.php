<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Tambah_Pengunjung extends CI_Migration {

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
                            'constraint' => '250'
                        ),
                        'level' => array(
                            'type' => 'INT',
                            'default' => '0',
                        ),
                        'geoloc' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('pengunjung');
        }

        public function down()
        {
                $this->dbforge->drop_table('pengunjung');
        }
}
