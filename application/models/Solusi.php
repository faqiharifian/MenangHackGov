<?php
class Solusi extends CI_Model {

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
            $query = $this->db->get_where('solusi', $where);
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

    public function set_permintaan($id){
        $query = $this->db->get_where('solusi', array('id' => $id));
        if(empty($query->row())){
            show_404();
        }

        $data = array(
            'id_pengunjung' => $this->input->post('permintaan'),
        );
        do{
            $result = $this->db->update('solusi', $data, array('id' => $id));
        }while(!$result);


        return $result;
    }

    public function create($password){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'employ' => $this->input->post('employ'),
            'level' => $this->input->post('level'),
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );

        do{
            $result = $this->db->insert('solusi', $data);
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

    public function create_rules(){
    return array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => array(
                'trim',
                'htmlspecialchars',
                'required',
                'is_unique[solusi.email]',
                'valid_email',
                'max_length[250]'
            ),
        ),
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => array(
                'trim',
                'htmlspecialchars',
                'required',
                'max_length[250]'
            ),
        ),
        array(
            'field' => 'employ',
            'label' => 'Employ',
            'rules' => array(
                'trim',
                'htmlspecialchars',
                'required',
                'max_length[250]'
            ),
        ),
        array(
            'field' => 'level',
            'label' => 'Level',
            'rules' => array(
                'trim',
                'htmlspecialchars',
                'required',
                'integer',
                'greater_than_equal_to[0]',
                'less_than_equal_to[1]'
            ),
        ),
        array(
            'field' => 'about',
            'label' => 'About',
            'rules' => array(
                'trim',
                'htmlspecialchars',
                'max_length[120]'
            ),
        ),
        array(
            'field' => 'facebook',
            'label' => 'Facebook',
            'rules' => array(
                'trim',
                'htmlspecialchars',
                'max_length[250]',

            ),
        ),
        array(
            'field' => 'twitter',
            'label' => 'Twitter',
            'rules' => array(
                'trim',
                'htmlspecialchars',
                'max_length[250]',
            ),
        ),
        array(
            'field' => 'google',
            'label' => 'Google',
            'rules' => array(
                'trim',
                'htmlspecialchars',
                'max_length[250]',
            ),
            ),
        );
    }

    public function password_rules(){
        return array(
            array(
                'field' => 'old_password',
                'label' => 'Old Password',
                'rules' => array(
                    'required',
                ),
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => array(
                    'required',
                    'min_length[8]',
                ),
            ),
            array(
                'field' => 'password_confirmation',
                'label' => 'Password Confirmation',
                'rules' => array(
                    'matches[password]'
                ),
            ),
        );
    }
}
