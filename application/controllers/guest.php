<?php

class Guest extends CI_Controller
{

        public function index()
        {
                $this->load->template('index');
        }

        public function page()
        {
                $this->load->template('list_solusi');
        }
        public function page2()
        {
                $this->load->template('detail_solusi');
        }
        public function page3()
        {
                $this->load->template('tabel_solusi');
        }

}