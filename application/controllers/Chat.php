<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('ci_pusher');
        $this->load->model('chat_model');
    }
	public function index()
	{
		$data['active_members'] = $this->chat_model->get_all_online('idle');
		$data['myprofile'] = $this->chat_model->get_by_id($this->session->userdata('id'));
		$this->load->view('chat',$data);
	}
	public function chatsend(){
		$pusher = $this->ci_pusher->get_pusher();
		$data['message'] = $_POST['message'];
		$data['date'] = date('H:i A');
		$data['id'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('user_name');
		
		$event = $pusher->trigger('chatglobal', 'my_event', $data);
	}

	public function update_user(){
		$username = $_POST['username'];
		$email    = $_POST['email'];
		$password = $_POST['password'];
		if($password == ""){
			$data = array(
				'username' => $username,
				'email'    => $email,
			);
		}else{
			$data = array(
				'username' => $username,
				'email'    => $email,
				'password' => $password,
			);
		}
		$this->chat_model->update($this->session->userdata('id'),$data);
	}
}
