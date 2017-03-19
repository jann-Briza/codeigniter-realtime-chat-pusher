<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class chat_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function add_user($data){
        $this->db->insert('users',$data);
    }
    public function login(){
        $query = $this->db->get_where('users', 
            array(
            'email' => $this->input->post('email'),
        ));

        $row = $query->result();
        $num_rows = $query->num_rows();

        if( $num_rows == 1 && password_verify($this->input->post('password'), $row[0]->password) ){


            $newdata = array(
              'id'        => $row->id,
              'user_name' => $row->username,
              'email'     => $row->first_name, 
            );

            $this->session->set_userdata($newdata);
                
            
            return $num_rows;
        }
    }
}
