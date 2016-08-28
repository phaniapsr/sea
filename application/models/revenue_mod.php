<?php
class Revenue_mod extends CI_Model{
    function  __Construct(){
        parent::__Construct();
    }
	public function insertNewRecord($tablename,$data){
		$res = $this->load->database('default',true)->insert($tablename,$data);
        return $res->insert_id();
	}
}