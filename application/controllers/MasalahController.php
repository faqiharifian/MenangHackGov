<?php

class MasalahController extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('masalah');
        $this->load->model('user_masalah');
        $this->load->model('solusi');
	}

    public function index()
    {
        $data['title'] = 'Daftar Masalah';

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
            // $user_masalah = $this->user_masalah->get_where(array('id_perusahaan' => '0'));
            // var_dump($user_masalah);die();
            $data['masalah'] = $this->masalah->get_unsolved();
        }else{
            $data['masalah'] = $this->masalah->search();

        }
        $this->load->view('dummy/masalah', $data);


    }

    public function create(){
        $this->load->library('form_validation');

        $data['title'] = 'Buat baru';

        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('dummy/masalah_create', $data);
        }else{
            $id_masalah = $this->masalah->create();
            $this->load->model('user_masalah');
            $this->user_masalah->create($id_masalah);

            $this->session->set_flashdata('success', 'Berhasil dibuat');
            redirect('solusi');
        }
    }

    public function show($id = FALSE){
        if($id === FALSE){
            show_404();
        }

        $data['title'] = 'Detail Masalah';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('proposal', 'Proposal', 'required');

        if($this->form_validation->run() === FALSE){
            $data['masalah'] = $this->masalah->get(array('id' => $id));

            if (empty($data['masalah'])){
                show_404();
            }

            $data['solusi'] = $this->solusi->get(array('id_masalah' => $data['masalah']->id));

            // var_dump($data);
            // die();

            // $data['masalah'] = $result['masalah'];
            // $data['solusi'] = $result['solusi'];

            $this->load->view('dummy/masalah_detail', $data);
        }else {
            $this->load->model('user_masalah');

            $result = $this->masalah->get(array('id' => $id));

            if(empty($result)){
                show_404();
            }
            //var_dump($result);die();

            $this->user_masalah->set_proposal($result, $id);

            $this->session->set_flashdata('success', 'Permintaan berhasil dikirim');
            redirect('masalah/'.$result->id_masalah);
        }


    }

}
