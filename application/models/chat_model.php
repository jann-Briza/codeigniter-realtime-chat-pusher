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
    public function get_all_online($status){
        $this->db->where('status',$status);
        return $this->db->get('users')->result();
    }
    public function update($id,$data){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
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
              'id'        => $row[0]->id,
              'user_name' => $row[0]->username,
              'email'     => $row[0]->email, 
            );

            $this->session->set_userdata($newdata);
                
            
            return $num_rows;
        }
    }
}
