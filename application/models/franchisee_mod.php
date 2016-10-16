<?php
class Franchisee_mod extends CI_Model{
    function  __Construct(){
        parent::__Construct();
    }

	public function listFromTable($role) {
		$this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_user_role','sea_users.id=sea_user_role.user_id');
        if($role==2||$role==3||$role==4||$role==5){
            $this->db->join('sea_franchise_resid_address','sea_users.id=sea_franchise_resid_address.user_id');
            //$this->db->join('sea_user_hierarchy','sea_users.id=sea_user_hierarchy.user_id');
        }
        $this->db->where('sea_user_role.role_id='.$role);
        $query=$this->db->get();
        return $query->result_array();
	}

	public function deleteRecordFromTable($table,$fieldLable,$id) {
	  	$this->db->where($fieldLable, $id);
        $this->db->delete($table);
	}		

	public function insertNewRecord($tablename,$data){
		$default=	$this->load->database('default',true);
    	$query = $default->insert($tablename,$data);
		return $default->insert_id();
	}

    public function updateTableRecord($table,$fieldLable,$data,$id){
        $this->db->where($fieldLable, $id);
        $this->db->update($table,$data);
	}

    public function franchiseDetailView($filter) {
        $this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_franchise_education_details','sea_franchise_education_details.user_id=sea_users.id');
        $this->db->join('sea_franchise_resid_address','sea_franchise_resid_address.user_id=sea_users.id');
		$this->db->join('sea_franchise_courses','sea_franchise_courses.user_id=sea_users.id');
        $this->db->join('sea_franchise_oth_train_att','sea_franchise_oth_train_att.user_id=sea_users.id');
        $this->db->where('sea_franchise_oth_train_att.user_id',$filter);
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getFranchiseRevenueConfigurations($user_id){
        $this->db->select('*');
        $this->db->from('sea_franchise_revenue_config');
        $this->db->where('user_id',$user_id);
        $query=$this->db->get();
        return $query->result_array();
    }

    public function checkmail($mail){
        $this->db->select('*');
        $this->db->from('sea_users');
        $this->db->where('sea_users.email',$mail);
        $query=$this->db->get();
        return count($query->result_array());
    }
}