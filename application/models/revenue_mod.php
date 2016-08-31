<?php
class Revenue_mod extends CI_Model{
    function  __Construct(){
        parent::__Construct();
    }
	public function insertNewRecord($tablename,$data){
        $default=	$this->load->database('default',true);
        $query = $default->insert($tablename,$data);
        return $default->insert_id();
	}
}