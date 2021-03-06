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
    public function franchiseRevenueGrid($filter,$sp,$ep){
        $this->db->select("sea_franchise_revenue.*,
        concat(username.first_name,' ',username.last_name) as frname,
        concat(createdby.first_name,' ',createdby.last_name) as createdbyname,
        concat(smf_name.first_name,' ',smf_name.last_name) as smfname,
        concat(dmf_name.first_name,' ',dmf_name.last_name) as dmfname,
        concat(consultant_name.first_name,' ',consultant_name.last_name) as consultantname,
        DATE_FORMAT(sea_franchise_revenue.created_datetime,'%d-%m-%Y %T')AS created_datetime,
        sea_roles.role as role")
            ->from('sea_franchise_revenue')
            ->join('sea_user_hierarchy','sea_user_hierarchy.user_id=sea_franchise_revenue.user_id')
            ->join('sea_user_role','sea_user_hierarchy.user_id=sea_user_role.user_id')
            ->join('sea_roles','sea_roles.id=sea_user_role.role_id')
            ->join('sea_users as username','sea_user_hierarchy.user_id=username.id','left')
            ->join('sea_users as consultant_name','sea_user_hierarchy.consultant_id=consultant_name.id','left')
            ->join('sea_users as smf_name','sea_user_hierarchy.smf_id=smf_name.id','left')
            ->join('sea_users as dmf_name','sea_user_hierarchy.dmf_id=dmf_name.id','left')
            ->join('sea_users as createdby','sea_user_hierarchy.created_by=createdby.id','left');
			if(isset($filter))
			{
				$s_name=$filter['name'];
		        $conid=$filter['conid'];
                $smfid=$filter['smfid'];
				$dmfid=$filter['dmfid'];
				if($dmfid==''&&$smfid==''&&$conid=='')
					if($s_name!='')
						$this->db->where("username.first_name LIKE '%$s_name%'");
					
                if($dmfid!='')
				   {
					$this->db->where('sea_user_hierarchy.created_by='.$dmfid);
					if($s_name!='')
						{
							$this->db->where("dmf_name.first_name LIKE '%$s_name%'");
						}	
					}	
                if($dmfid=='')
					{	
						if($smfid!='')
							{
								$this->db->where('sea_user_hierarchy.created_by='.$smfid);
								if($s_name!='')
									{
										$this->db->where("smf_name.first_name LIKE '%$s_name%'");
									}
								
							}
					}	
                if($smfid=='')
					{
						if($conid!='')
							{
							   $this->db->where('sea_user_hierarchy.created_by='.$conid);
							   if($s_name!='')
									{
										$this->db->where("consultant_name.first_name LIKE '%$s_name%'");
									}
					        }	
					}					
			}
	    $this->db->limit($sp, $ep);		
        $query = $this->db->get();
        return $query->result_array();
    }

    public function studentRevenueGrid(){
        $this->db->select("sea_student_revenue.*,
        concat(username.first_name,' ',username.last_name) as stname,
        concat(createdby.first_name,' ',createdby.last_name) as createdbyname,
        concat(smf_name.first_name,' ',smf_name.last_name) as smfname,
        concat(dmf_name.first_name,' ',dmf_name.last_name) as dmfname,
        concat(uf_name.first_name,' ',uf_name.last_name) as ufname,
        concat(consultant_name.first_name,' ',consultant_name.last_name) as consultantname,
        DATE_FORMAT(sea_student_revenue.created_datetime,'%d-%m-%Y %T')AS created_datetime,
        sea_student_revenue_type.ssrt_revenue_type AS revenue_type
        ")
            ->from('sea_student_revenue')
            ->join('sea_user_hierarchy','sea_user_hierarchy.user_id=sea_student_revenue.student_id')
            ->join('sea_student_revenue_type','sea_student_revenue_type.ssrt_id=sea_student_revenue.revenue_type_id')
            ->join('sea_users as username','sea_user_hierarchy.user_id=username.id','left')
            ->join('sea_users as consultant_name','sea_user_hierarchy.consultant_id=consultant_name.id','left')
            ->join('sea_users as smf_name','sea_user_hierarchy.smf_id=smf_name.id','left')
            ->join('sea_users as dmf_name','sea_user_hierarchy.dmf_id=dmf_name.id','left')
            ->join('sea_users as uf_name','sea_user_hierarchy.uf_id=uf_name.id','left')
            ->join('sea_users as createdby','sea_user_hierarchy.created_by=createdby.id','left');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function record_count($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query=$this->db->get();
		return count($query->result_array());
		
	}
}