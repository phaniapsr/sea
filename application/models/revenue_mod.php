<?php
class Revenue_mod extends CI_Model
{
    function __Construct()
    {
        parent::__Construct();
    }

    public function insertNewRecord($tablename, $data)
    {
        $default = $this->load->database('default', true);
        $query = $default->insert($tablename, $data);
        return $default->insert_id();
    }

    public function getAllRevenue()
    {
        //echo 'hi';exit;
        $this->db->select('*');
        $this->db->from('sea_franchise_revenue');
        $this->db->join('sea_users', 'sea_users.id = sea_franchise_revenue.user_id');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_franchise_revenue.user_id');
        $this->db->where('sea_user_role.role_id!=1');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getAllConsultantRevenue()
    {

        $this->db->select('*');
        $this->db->from('sea_franchise_revenue');
        $this->db->join('sea_users', 'sea_users.id = sea_franchise_revenue.user_id');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_franchise_revenue.user_id');
        $this->db->where('sea_user_role.role_id!=1');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getAllStateRevenue()
    {

        $this->db->select('*');
        $this->db->from('sea_franchise_revenue');
        $this->db->join('sea_users', 'sea_users.id = sea_franchise_revenue.user_id');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_franchise_revenue.user_id');
        $this->db->where('sea_user_role.role_id!=1');
        $this->db->where('sea_user_role.role_id!=2');
        $this->db->where('sea_user_role.role_id!=5');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getAllDistrictRevenue()
    {

        $this->db->select('*');
        $this->db->from('sea_franchise_revenue');
        $this->db->join('sea_users', 'sea_users.id = sea_franchise_revenue.user_id');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_franchise_revenue.user_id');
        $this->db->where('sea_user_role.role_id!=1');
        $this->db->where('sea_user_role.role_id!=2');
        $this->db->where('sea_user_role.role_id!=5');
        $this->db->where('sea_user_role.role_id!=3');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getStudentRevenueTypes(){
        $this->db->select('*');
        $this->db->from('sea_student_revenue_type');
        $query = $this->db->get();
        return $query->result_array();
    }
}