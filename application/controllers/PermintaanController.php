<?php

class PermintaanController extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('masalah');
        $this->load->model('user_masalah');
        // $this->load->model('solusi');
	}

    public function index(){
        $result = $this->user_masalah->get_permintaan();
        // var_dump($result);die();
        $data['permintaan'] = $result;
        $this->load->view('dummy/permintaan', $data);

    }

    public function show($id_masalah = FALSE, $id_pengunjung = FALSE){
        if($id_masalah === FALSE || $id_pengunjung === FALSE){
            show_404();
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('terima', 'Terima', 'required');

        if($this->form_validation->run() === FALSE){
            $data['permintaan'] = $this->masalah->get(array('id' => $id_masalah));
            $this->load->view('dummy/permintaan_detail', $data);
        }else{
            $this->user_masalah->terima_permintaan($id_masalah, $id_pengunjung);
        }
    }

}
