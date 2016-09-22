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
        $this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_user_role','sea_users.id=sea_user_role.user_id');
        $this->db->join('sea_user_hierarchy','sea_users.id=sea_user_hierarchy.user_id','left');
        $this->db->where($data);
        $query=$this->db->get();
        return $query->result_array();
    }
    public function user_level_data($data) {
        $data=array('user_id'=>$data);
        $this->db->select('level_id');
        $this->db->from('sea_franchise_level');
        $this->db->where($data);
        $query=$this->db->get();
        return $query->result_array();
    }
}