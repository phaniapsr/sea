<?php
class Franchisee_mod extends CI_Model{
    function  __Construct(){
        parent::__Construct();
    }

	public function listFromTable($table,$filter) {
		//$query="select * from $table where franchiseetypeId = '$filter'";
        $this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_user_role','sea_users.id=sea_user_role.user_id');
        $this->db->where($data);
        $query=$this->db->get();
        return $query->result_array();
        /*$sql= $this->db->query($query);
		return $sql->result_array();*/
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
}