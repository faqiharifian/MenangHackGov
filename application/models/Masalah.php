<?php
class Masalah extends CI_Model {

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
            do{
                $query = $this->db->get('masalah');
            }while(!$query);
            return $query->result();
        }

        do{
            $query = $this->db->get_where('masalah', $where);
        }while(!$query);
        return $query->row();
    }

    public function get_unsolved($where = FALSE){
        $query = $this->db->get_where('user_masalah', array('id_perusahaan' => 0));
        $results = $query->result();
        // var_dump($results);die();
        // $query = $this->db->get_where('masalah', array('id' => $results[0]->id_masalah));
        // var_dump($query->result());die();

        $this->db->select('*');
        $this->db->from('masalah');

        // $this->db->group_start();
        foreach ($results as $key => $value) {
            $this->db->or_where(array('id' => $value->id_masalah));
        }
        // $this->db->group_end();

        // $this->db->where(array('id_perusahaan' => '0'));
        if ($where === FALSE){
            // do{
                // var_dump($this->db->get_compiled_select());die();
                $query = $this->db->get();

            // }while(!$query);
            //var_dump($query->result());die();
            return $query->result();
        }

        do{
            $this->db->where($where);
            $query = $this->db->get();
        }while(!$query);
        return $query->result();
    }

    public function search(){
        $this->db->select('*');
        $this->db->from('masalah');
        $this->db->join('user_masalah', 'masalah.id = user_masalah.id_masalah');
        // $this->db->where('id_pengunjung =', 0);
        $this->db->group_start();
        $search = explode(" ", $this->input->get('q'));
        foreach ($search as $key => $value) {
            $this->db->or_like('judul', $value);
        }
        foreach ($search as $key => $value) {
            $this->db->or_like('deskripsi', $value);
        }
        $this->db->group_end();
        $this->db->where(array('id_perusahaan' => '0'));
        $query = $this->db->get();

        //var_dump($query->result()); die();

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

    public function create($password){
        $data = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        do{
            $result = $this->db->insert('masalah', $data);
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
            $result = $this->db->update('users', $data, array('id' => $id));
        }while(!$result);

        return $result;
    }

    public function changePassword($id){
        $data = array(
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'active' => 1,
        );

        do{
            $result = $this->db->update('users', $data, array('id' => $id));
        }while(!$result);

        return $result;
    }

    public function delete($id){
        do{
            $result = $this->db->delete('users', array('id' => $id));
        }while(!$result);

        return $result;
    }

    public function set_reset($id, $token){
        do{
            $result = $this->db->update('users', array('reset_token' => password_hash($token, PASSWORD_BCRYPT)), array('id' => $id));
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
                'is_unique[users.email]',
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
