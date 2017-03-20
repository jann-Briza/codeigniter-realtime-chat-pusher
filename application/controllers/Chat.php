<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('ci_pusher');
    }
	public function index()
	{
		$this->load->view('chat');
	}
	public function chatsend(){
		$pusher = $this->ci_pusher->get_pusher();
		$data['message'] = $_POST['message'];
		$data['date'] = date('H:i A');
		$data['id'] = $this->session->userdata('id');
		
		$event = $pusher->trigger('chatglobal', 'my_event', $data);
	}
}
