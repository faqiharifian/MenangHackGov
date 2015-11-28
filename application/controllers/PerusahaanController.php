<?php

class PerusahaanController extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('user');
	}

    public function index()
    {
        $data['title'] = 'Daftar Perusahaan';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('search', 'Search', 'required');

        if($this->form_validation->run() === FALSE){
            redirect(site_url());
        }else{
            $data['users'] = $this->user->search();
            $this->load->view('dummy/perusahaan', $data);
        }


    }


}
