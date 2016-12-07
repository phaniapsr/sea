<?php
class Student_mod extends CI_Model
{
    function __Construct()
    {
        parent::__Construct();
    }

    public function listFromTable($table,$filter)
    {
        //$query = "select * from $table";
        $this->db->select('*');
        $this->db->from('sea_users');
        $this->db->join('sea_user_role', 'sea_user_role.user_id = sea_users.id');
        $this->db->where('sea_user_role.role_id=6');
		$this->db->where('sea_users.user_delete=0');
		if(isset($filter))
		{
		$s_name=$filter['name'];
		$s_email=$filter['email'];
        if($s_name!='') 		
		$this->db->where("first_name LIKE '%$s_name%'");
	    if($s_email!='')
		$this->db->where("email LIKE '%$s_email%'");	
		}
        $this->db->order_by('sea_users.id','desc');
        $query = $this->db->get();
        return $query->result_array();
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
        $data=array();
        foreach($query->result_array() as $row){
            $data['name']=$row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
            $data['tax_amount']=$row['tax_amount'];
            $data['fee_list'][]=$row['total_amount'];
            $data['email']=$row['email'];
        }
        return $data;
    }

    public function getUploadRows($id = ''){
        $this->db->select('*');
        $this->db->from('sea_exam_papers');
        if($id){
            $this->db->where('exam_id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('exam_id','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    public function insertUploadExams($data = array()){
        $insert = $this->db->insert_batch('sea_exam_papers',$data);
        return $insert?true:false;
    }

    public function getAttendance($level_id=''){
        $this->db->select('*,DATE_FORMAT(scheduled_class_date,"%d/%m/%Y") AS scheduled_class_date');
        $this->db->from('sea_student_attendance');
        //$this->db->join('sea_student_course_level','sea_student_course_level.course_level_id=sea_student_attendance.course_level_id');
        $this->db->where('sea_student_attendance.course_level_id',$level_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCourseLevelDetails($user_id){
        /*
         * todo: This logic has to be changed to take courseId as input and give student course details. Right now assuming one student one course itself.
         * */
        $this->db->select('*');
        $this->db->from('sea_student_course_level');
        $this->db->join('sea_student_pers_details','sea_student_pers_details.stud_id=sea_student_course_level.user_id');
        $this->db->where('sea_student_course_level.user_id',$user_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}