<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Tambah_User_Masalah extends CI_Migration {

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
                        'id_perusahaan' => array(
                            'type' => 'INT',
                            'unsigned' => TRUE,
                        ),
                        'id_pengunjung' => array(
                            'type' => 'INT',
                            'unsigned' => TRUE,
                        ),
                        'status' => array(
                            'type' => 'INT',
                            'default' => '0'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('user_masalah');
        }

        public function down()
        {
                $this->dbforge->drop_table('user_masalah');
        }
}
