<?php

class SolusiController extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('solusi');
        $this->load->model('masalah');

	}

    public function index()
    {
        $data['title'] = 'Daftar Solusi';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('search', 'Search', 'required');

        // if($this->form_validation->run() === FALSE){
        //     die();
        //     redirect(site_url());
        // }else{
        //     $data['solusi'] = $this->masalah->search();
        //     $this->load->view('dummy/solusi', $data);
        // }

        if($this->input->get('q') == null){
            //die();
            //redirect(site_url());
            $data['solusi'] = $this->masalah->get();
        }else{
            $data['solusi'] = $this->masalah->search();

        }
        $this->load->view('dummy/solusi', $data);
    }

    public function show($id = FALSE){
        if($id === FALSE){
            show_404();
        }

        $data['title'] = 'Detail Solusi';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->model('masalah');
            $data['masalah'] = $this->masalah->get(array('id' => $id));

            if (empty($data['masalah'])){
                show_404();
            }

            $data['solusi'] = $this->solusi->get(array('id_masalah' => $data['masalah']->id));

            // var_dump($data);
            // die();

            // $data['masalah'] = $result['masalah'];
            // $data['solusi'] = $result['solusi'];

            $this->load->view('dummy/solusi_detail', $data);
        }else {
            $this->load->model('user_masalah');

            $result = $this->masalah->get(array('id' => $id));

            if(empty($result)){
                show_404();
            }
            //var_dump($result);die();

            $this->user_masalah->set_permintaan($result, $id);

            $this->session->set_flashdata('success', 'Permintaan berhasil dikirim');
            redirect('solusi/'.$result->id_masalah);
        }


    }


}
