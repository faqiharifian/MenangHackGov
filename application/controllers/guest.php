<?php

class Guest extends CI_Controller
{

        public function index()
        {
                $this->load->view('index');
        }

        public function page()
        {
                $this->load->view('page');
        }

}