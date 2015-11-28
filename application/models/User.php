<?php
class User extends CI_Model {

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
                $query = $this->db->get('users');
            }while(!$query);
            return $query->result();
        }

        do{
            $query = $this->db->get_where('users', $where);
        }while(!$query);
        return $query->row();
    }

    public function search(){
        $this->db->select('*');
        $this->db->from('users');
        $search = explode(" ", $this->input->post('search'));
        foreach ($search as $key => $value) {
            $this->db->or_like('tentang', $value);
        }
        $query = $this->db->get();

        return $query->result();
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
            $result = $this->db->insert('users', $data);
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
