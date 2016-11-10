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

    public function getStudentRevenueTypes()
    {
        $this->db->select('*');
        $this->db->from('sea_student_revenue_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRevenueSplit($filter)
    {
        $this->db->select('users.*,hierarchy.*,config.*,role.role_id,revenue.lf_amount,revenue.tax_amount,revenue.revenue_id,revenue.kf_amount,revenue.lf_consultant_amount,revenue.lf_smf_amount,revenue.lf_dmf_amount,revenue.lf_company_amount', false);
        $this->db->from('sea_user_hierarchy AS hierarchy');
        $this->db->join('sea_users AS users', 'hierarchy.consultant_id=users.id OR hierarchy.smf_id=users.id OR hierarchy.dmf_id=users.id OR hierarchy.uf_id=users.id');
        $this->db->join('sea_franchise_revenue AS revenue', 'revenue.user_id=hierarchy.user_id');
        $this->db->join('sea_franchise_revenue_config AS config', 'config.user_id=users.id');
        $this->db->join('sea_user_role AS role', 'role.user_id=users.id');
        $this->db->where('hierarchy.user_id', $filter);
        //$this->db->orderBy('sea_user_role.role_id','ASC');
        $query = $this->db->get();
        $va = $this->db->last_query();
        return $query->result_array();
    }

    public function updateRowWhere($table, $where = array(), $data = array())
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    ////for updating the values of Revenue configuration
    public function getRevConfig($id)
    {
        $this->db->select('*');
        $this->db->from('sea_franchise_revenue_config');
        $this->db->where('sea_franchise_revenue_config.user_id', $id);
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function updateTableRecord($table, $fieldLable, $data, $id)
    {
        $this->db->where($fieldLable, $id);
        $this->db->update($table, $data);
    }

    public function checkRevenueConfig($id)
    {
        $this->db->select('*');
        $this->db->from('sea_franchise_revenue_config');
        $this->db->where('sea_franchise_revenue_config.user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function unitRevenueConfig($id)
    {
        $this->db->select('*');
        $this->db->from('sea_student_revenue_config');
        $this->db->where('sea_student_revenue_config.user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getStuConfig($id)
    {
        $this->db->select('*');
        $this->db->from('sea_student_revenue_config');
        $this->db->where('sea_student_revenue_config.user_id', $id);
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function updateStuRev($table, $fieldLable1, $fieldLable2, $data, $id1, $id2)
    {
        $this->db->where($fieldLable1, $id1);
        $this->db->where($fieldLable2, $id2);
        $this->db->update($table, $data);
    }

    //end of updating the values of Revenue configuration

}