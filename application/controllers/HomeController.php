<?php

class HomeController extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        $data['title'] = 'Selamat datang';

        $this->load->view('dummy/home', $data);
        
    }


}
