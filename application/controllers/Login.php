<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
        $this->load->library('ci_pusher');
    }
	public function index()
	{
		if(isset($_SESSION['email'])){
			redirect('chat');
		}
		$this->load->view('login');
		
	}
	public function register(){
		$username = $this->input->post('username');
		$email 	  = $this->input->post('email');
		$password = $this->input->post('password');
		$data = array(
			'username' => $username,
			'email'    => $email,
			'password' => password_hash($password, PASSWORD_DEFAULT), 
			'status'   => 'idle',
		);

		$this->chat_model->add_user($data);
		redirect(base_url().'login');
	}
	public function login_submit(){

	 	$logged = $this->chat_model->login();

        if( $logged == 1 ){
	    	$data = array('status' => "idle");
			$this->chat_model->update($this->session->userdata('id'),$data);
            $this->append_onnline();
            redirect('chat');

        }else{
            redirect('login');
        }
	}
	public function append_onnline(){
		//pusher
		$pusher = $this->ci_pusher->get_pusher();	
		$data['id'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('user_name');
		$event = $pusher->trigger('chatglobal', 'appendponline', $data);
	}
	public function logout(){
		$this->session->sess_destroy();
		$data = array('status' => "");
		$this->chat_model->update($this->session->userdata('id'),$data);
		redirect('login');
	}
}
