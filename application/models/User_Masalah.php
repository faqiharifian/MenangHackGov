<?php
class User_Masalah extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
    // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function get($where = false){

        if ($where === FALSE){
            show_404();
        }

        do{
            $query = $this->db->get_where('user_masalah', $where);
        }while(!$query);

        return $query->row();
    }

    public function get_where($where = FALSE){
        if ($where === FALSE){
            show_404();
        }

        do{
            $query = $this->db->get_where('user_masalah', $where);
        }while(!$query);

        return $query->result();
    }

    public function search(){
        $this->db->select('*');
        $this->db->from('masalah');
        // $this->db->join('masalah', 'masalah.id = solusi.id_masalah');

        $search = explode(" ", $this->input->post('search'));
        foreach ($search as $key => $value) {
            $this->db->or_like('judul', $value);
        }
        foreach ($search as $key => $value) {
            $this->db->or_like('deskripsi', $value);
        }
        $query = $this->db->get();

        // $result['masalah'] = $query->result();
        //
        // $this->db->select('*');
        // $this->db->from('solusi');
        //
        // foreach ($$result['masalah'] as $key => $value) {
        //     $this->db->or_where()
        // }

        return $query->result();
    }

    public function set_permintaan($result, $id){
        $result = $this->get(array('id_masalah' => $result->id));

        $data = array(
            'id_masalah' => $result->id_masalah,
            'id_perusahaan' => $result->id_perusahaan,
            'id_pengunjung' => $id,

        );
        do{
            $result = $this->db->insert('user_masalah', $data);
        }while(!$result);

        return $result;
    }

    public function get_permintaan(){
        $this->db->select('*');
        $this->db->from('user_masalah');
        $this->db->where(array('id_perusahaan' => $this->session->id));
        $this->db->where('id_pengunjung !=', 0);
        $this->db->where(array('status' => 0));
        $this->db->join('masalah', 'masalah.id = user_masalah.id_masalah');
        $query = $this->db->get();
        $result = $query->result();
        // var_dump($result);die();

        return $result;
    }

    public function terima_permintaan($id_masalah, $id_pengunjung){
        $this->db->where(array('id_masalah' => $id_masalah));
        $this->db->where(array('id_pengunjung' => $id_pengunjung));
        $this->db->where(array('id_perusahaan' => $this->session->id));
        $result = $this->db->update('user_masalah', array('status' => 1));
        return $result;
    }

    public function get_solusi($where){
        foreach ($where as $key => $value) {
            $this->db->where($value);
        }
        $query = $this->db->get('user_masalah');
        // var_dump($query->result());die();
        return $query->row();
    }

    public function set_proposal($result, $id){
        $result = $this->get(array('id_masalah' => $result->id));
        // $result = $result->row();
        // var_dump($result);die();

        $data = array(
            'id_masalah' => $result->id_masalah,
            'id_perusahaan' => $id,
            'id_pengunjung' => $result->id_pengunjung,

        );
        do{
            $result = $this->db->insert('user_masalah', $data);
        }while(!$result);

        return $result;
    }

    public function create($id_masalah){
        $data = array(
            'id_masalah' => $id_masalah,
            'id_pengunjung' => $this->session->id,
        );

        do{
            $result = $this->db->insert('user_masalah', $data);
        }while(!$result);

        return $this->db->insert_id();
    }

    public function update($id){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'employ' => $this->input->post('employ'),
            'level' => $this->input->post('level'),
            'facebook' => $this->input->post('facebook'),
            'twitter' => $this->input->post('twitter'),
            'google' => $this->input->post('google'),
            'picture' => url_title($this->input->post('name'), 'dash', TRUE),
            'about' => $this->input->post('about'),
        );

        do{
            $result = $this->db->update('solusi', $data, array('id' => $id));
        }while(!$result);

        return $result;
    }

    public function delete($id){
        do{
            $result = $this->db->delete('solusi', array('id' => $id));
        }while(!$result);

        return $result;
    }

    public function is_requesting($id_masalah){
        $this->db->where(array('id_masalah' => $id_masalah));
        $this->db->where(array('id_pengunjung' => $this->session->id));
        $query = $this->db->get('user_masalah');
        var_dump($query->result());die();
    }
}
