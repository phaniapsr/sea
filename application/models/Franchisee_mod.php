<?php
class Franchisee_mod extends CI_Model{
    function  __Construct(){
        parent::__Construct();
    }

	public function listFromTable($role,$filter) {
		$id=$this->session->user_logged_in['id'];
		$this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_users.id');
		if($id==1)
		$this->db->join('sea_user_hierarchy','sea_users.id=sea_user_hierarchy.user_id');
		if($role==2||$role==3||$role==4||$role==5){
            $this->db->join('sea_franchise_resid_address','sea_users.id=sea_franchise_resid_address.user_id');
			//$this->db->join('sea_user_hierarchy','sea_users.id=sea_user_hierarchy.user_id');
        }
		if($id!=1)
		{
			$this->db->join('sea_user_hierarchy','sea_users.id=sea_user_hierarchy.user_id');
			$this->db->where('sea_user_hierarchy.created_by='.$id);
		}
		if(isset($filter))
		{
		$s_name=$filter['name'];
		if($s_name!='') 		
		$this->db->where("first_name LIKE '%$s_name%'");
	    $conid=$filter['conid'];
		
		/*if($conid!='')
		{
		$this->db->where('sea_user_hierarchy.created_by='.$conid);
	    //$this->db->where('sea_user_role.role_id='.$role);
		}*/
        
		$smfid=$filter['smfid'];
		$dmfid=$filter['dmfid'];
		if($dmfid!='')
			$this->db->where('sea_user_hierarchy.created_by='.$dmfid);	
		if($dmfid=='')
		{	
		if($smfid!='')
		{
		  $this->db->where('sea_user_hierarchy.created_by='.$smfid);
		}
		}
		if($smfid=='')
		{
			if($conid!='')
			  $this->db->where('sea_user_hierarchy.created_by='.$conid);
		}
		}
	
		$this->db->where('sea_user_role.role_id='.$role);
		$this->db->where('sea_users.user_delete=0');
		$this->db->order_by('sea_users.id','desc');
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
	public function checkstatus($id){
        $this->db->select('user_status');
        $this->db->from('sea_users');
        $this->db->where('sea_users.id',$id);
        $query=$this->db->get();
        $row=$query->row();
		return $row->user_status;		
    }
	public function deleteStatus($id){
        $this->db->select('*');
        $this->db->from('sea_users');
		$this->db->join('sea_user_role','sea_users.id=sea_user_role.user_id');
        $this->db->where('sea_users.id',$id);
		$this->db->where('sea_user_role.user_id',$id);
        $query=$this->db->get();
        //return $row=$query->row();
		return $query->result_array();
		//return $row->user_delete;		
    }

    public function getRegistrationFeeDetails($userId){
        $this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_franchise_revenue','sea_franchise_revenue.user_id=sea_users.id');
        $this->db->where('sea_users.id',$userId);
        $query=$this->db->get();
        return $query->result_array();
    }
	
	public function getCons($rid,$consid)
	{
		$this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_users.id');
		$this->db->where('sea_user_role.role_id',$rid);
		if($consid!=1)
		$this->db->where('sea_users.id',$consid);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getSmf($rid,$conid)
	{
		$this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_users.id');
		$this->db->join('sea_user_hierarchy','sea_users.id=sea_user_hierarchy.user_id');
		$this->db->where('sea_user_role.role_id',$rid);
		$this->db->where('sea_user_hierarchy.created_by',$conid);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/*000public function getDmf($rid,$smfid)
	{
		$this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_users.id');
		$this->db->join('sea_user_hierarchy','sea_users.id=sea_user_hierarchy.user_id');
		
	}*/
	
}