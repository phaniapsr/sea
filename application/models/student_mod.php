<?php

class Student_mod extends CI_Model
{
    function __Construct()
    {
        parent::__Construct();
    }

    public function listFromTable($table, $filter)
    {
        $query = "select * from $table where franchiseetypeId = '$filter'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function currentStudentsList($table, $filter)
    {
        $query = "select * from $table where stud_id= '$filter'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    //public function currentStudentsList(){}
    public function deleteRecordFromTable($table, $fieldLable, $id)
    {
        $this->db->where($fieldLable, $id);
        $this->db->delete($table);
    }

    public function insertNewRecord($tablename, $data)
    {
        $default = $this->load->database('default', true);
        $default->insert($tablename, $data);
        return $default->insert_id();
    }

    public function updateTableRecord($table, $fieldLable, $data, $id)
    {
        $this->db->where($fieldLable, $id);
        $this->db->update($table, $data);
    }

    public function franchiseDetailView($filter)
    {
        $this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_student_pers_details', 'sea_student_pers_details.stud_id=sea_users.id');
        $this->db->join('sea_franchise_resid_address', 'sea_franchise_resid_address.user_id=sea_users.id');
        $this->db->join('sea_student_course_level', 'sea_student_course_level.user_id=sea_users.id');
        $this->db->where('sea_users.id', $filter);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getStudentRevenueConfigurations($filter)
    {
        $this->db->select('*');
        $this->db->from('sea_student_revenue_config');
        $this->db->where('user_id', $filter['user_id']);
        $this->db->where('revenue_type_id', $filter['revenue_type_id']);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function getRegistrationFeeDetails($userId){
        $this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_student_revenue','sea_student_revenue.student_id=sea_users.id');
        $this->db->where('sea_users.id',$userId);
        $query=$this->db->get();
        return $query->result_array();
    }
//class close
}