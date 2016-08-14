<?php
    class Franchisee_mod extends CI_Model{
        function  __Construct(){
            parent::__Construct();
        }
	public function listFromTable($table,$filter) {
		$query="select * from $table where franchiseetypeId = '$filter'";
		$sql= $this->db->query($query);
		return $sql->result_array();
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
//class close
}		
?>		