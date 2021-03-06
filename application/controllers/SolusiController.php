<?php

class SolusiController extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('solusi');
        $this->load->model('masalah');
        $this->load->model('user_masalah');
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
            // var_dump($data['solusi']);die();

        }
        $this->load->template('list_solusi', $data);
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

            // $data['meminta'] = $this->user_masalah->is_requesting($id);

            $data['solusi'] = $this->solusi->get(array('id_masalah' => $data['masalah']->id));

            // var_dump($data);
            // die();

            // $data['masalah'] = $result['masalah'];
            // $data['solusi'] = $result['solusi'];

            $params = array(
                array('id_masalah' => $data['masalah']->id),
                array('id_pengunjung' => $this->session->id)
            );
            $result2 = $this->user_masalah->get_solusi($params);

            if(!empty($result2)){
                if($result2->id_perusahaan != 0 && $result2->status == 1){
                    $this->load->template('tabel_solusi', $data);
                }
            }else{
                $this->load->template('detail_solusi', $data);
            }


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
