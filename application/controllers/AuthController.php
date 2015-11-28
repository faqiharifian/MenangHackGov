<?php

class AuthController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
    	$this->load->model('user');
		if($this->session->logged_in && !strpos(current_url(), 'logout')){
			redirect('');
		}
	}

	public function index()
	{
		// $sessions = $this->session->all_userdata();
		// foreach ($sessions as $key => $value) {
		// 	echo $key." => ".$value;
		// }
		// die();
		$this->load->library('form_validation');
		$data['title'] = 'Login';

		$this->form_validation->set_rules('username', 'Username', 'required');
		if($this->form_validation->run() === FALSE){
			$this->load->template('login', $data);
		}else{
			$username = htmlspecialchars($this->input->post('username'));
	        $result = $this->user->get(array('username' => $username));

	        if(!empty($result)){
	            if(password_verify($this->input->post('password'), $result->password)){
					$data = array(
						'id'     => $result->id,
					    'username'  => $result->username,
					    'nama'     => $result->nama,
						'level'     => $result->level,
						'tentang' => $result->tentang,
					    'logged_in' => TRUE
					);

					$this->session->set_userdata($data);
					redirect('');
	            }
	        }else{
	        	//disini kosong
	        }
			$this->session->set_flashdata('error', "Username or Password incorrect");
			redirect('login');
		}

	}

	public function forgot(){
		$this->load->library('form_validation');
		$data['title'] = 'Email';

		$this->form_validation->set_rules('email', 'Email', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/email', $data);
		}else{
			$user = $this->user->get(array('email' => $this->input->post('email')));
			if(empty($user)){
				$this->session->set_flashdata('error', "Invalid email");
				$this->load->view('admin/email', $data);
			}else{
				$this->load->helper('string');
				$random_string = random_string('alnum', 60);
				$this->user->set_reset($user->id, $random_string);

				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'mailtrap.io',
					'smtp_port' => 2525,
					'smtp_user' => '3270981caec32b290',
					'smtp_pass' => '04fdbb8d84297a',
					'crlf' => "\r\n",
					'newline' => "\r\n"
				);
				$this->load->library('email', $config);

				$this->email->from('faqih@arifian.com', 'Faqih Arifian');
				$this->email->to($user->email);

				$this->email->subject('Reset password!');
				$this->email->message(site_url('admin/reset')."/".$user->id."/".$random_string);
				$this->email->send();

				$this->session->set_flashdata('success', 'Email Sent');
				$this->load->view('admin/email', $data);
			}
		}

	}

	public function reset($id, $token){
		$this->load->library('form_validation');
		$data['title'] = 'Reset';

		$data['id'] = $id;
		$data['token'] = $token;

		$data['user'] = $this->user->get(array('id' => $id));

		if(empty($data['user'])){
			show_404();
		}

		if(!password_verify($data['token'], $data['user']->reset_token)){
			show_404();
		}

		$rules = $this->user->password_rules();
		unset($rules[0]);
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/users/password', $data);
		}else{
			$this->user->changePassword($id);

			$this->session->set_flashdata('success', "Resetted Successfully");

			redirect('admin');
		}
	}

	public function activate($id, $token)
	{
		$this->load->library('form_validation');
		$data['title'] = 'Activate';

		$data['id'] = $id;
		$data['token'] = $token;

		$data['user'] = $this->user->get(array('id' => $id));

		if(empty($data['user'])){
			show_404();die();
		}

		if(!password_verify($data['token'], $data['user']->password) || !($data['user']->active == 0)){
			show_404();
		}

		$rules = $this->user->password_rules();
		unset($rules[0]);
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/users/password', $data);
		}else{
			$this->user->changePassword($id);

			$this->session->set_flashdata('success', "Activated Successfully");

			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

}
