<?php
class Login_mod extends CI_Model{
    function  __Construct(){
        parent::__Construct();
    }
    public function user_login($data) {
    $data=array('email'=>$data['email'],'password'=>$data['password']);
        $this->db->select()->from('sea_users')->where($data);
        $query=$this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        }
        else{
            return false;
        }
    }
    public function user_login_data($data) {
        $data=array('email'=>$data['email'],'password'=>$data['password']);
        $this->db->select()->from('sea_users')->where($data);
        $query=$this->db->get();
        return $query->result_array();
       }
//class close
}