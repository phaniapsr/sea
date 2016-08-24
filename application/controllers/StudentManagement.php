<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Phani.
 * Date: 8/7/2016
 * Time: 11:49 PM
 */
class StudentManagement extends CI_Controller {
    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('student_mod','student');
        //$this->load->model('merchant_mod');
        //$this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('StudentManagement/studentRegistration');
        $this->load->view('includes/footer');
    }

    public function registerStudent(){
        $data=array(
            'franchiseetypeId'=>4,
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],
            'first_name'=>$_POST['first_name'],
            'last_name'=>$_POST['last_name'],
            'middle_name'=>$_POST['middle_name'],
            'date_of_birth'=>$_POST['date_of_birth'],
            'gender'=>$_POST['gender'],
			'age'=>$_POST['Age'],
        );
        header('application/json');
        echo $result= $this->student->insertNewRecord('sea_users',$data);
		$data1=array(
		'stud_id'=>$result,
		'stud_mothertong'=>$_POST['MotherTounge'],
		'fath_name'=>$_POST['FatherName'],
        'fath_mobno'=>$_POST['FatherMobileNumber'],
		'moth_name'=>$_POST['MotherName'],
		'moth_mobno'=>$_POST['MotherMobileNumber'],
		'fath_email'=>$_POST['ParentEmailId'],
		'fath_qualif'=>$_POST['FatherQualicfation'],
		'fath_occup'=>$_POST['FatherOccupation'],
		'moth_qualif'=>$_POST['MotherQualicfation'],
		'moth_occup'=>$_POST['MotherOccupation'],
		'land_no'=>$_POST['LandlineNumber'],
		'school_name'=>$_POST['SchoolName'],
		'school_add'=>$_POST['SchoolAddress'],
		'school_mobno'=>$_POST['SchoolNumber'],
		'program_name'=>$_POST['ProgramId'],
		'course_name'=>$_POST['CourseId'],
		'level_name'=>$_POST['ProgramCourseLevelId'],
		'fsib_name'=>$_POST['Sibling1Name'],
		'ssib_name'=>$_POST['Sibling2Name'],
		'fsib_sname'=>$_POST['Sibling1SchoolName'],
		'fsib_age'=>$_POST['Sibling1Age'],
		'fsib_gender'=>$_POST['Sibling1Gender'],
		'fsib_stand'=>$_POST['Sibling1Standard'],
		'ssib_sname'=>$_POST['Sibling2SchoolName'],
		'ssib_age'=>$_POST['Sibling2Age'],
		'ssib_gender'=>$_POST['Sibling2Gender'],
		'ssib_stand'=>$_POST['Sibling2Standard'],
		);
		echo $result= $this->student->insertNewRecord('sea_student_pers_details',$data1);
    }

    public function currentStudentsList()
    {
        $data['data']['smf'] =$this->student->listFromTable('sea_users','4');
        $this->load->view('includes/header');
        $this->load->view('StudentManagement/currentStudentsList',$data);
        $this->load->view('includes/footer');
    }
	public function sdetailView($id)
	{
		$data['data']['smf']=$this->student->currentStudentsList('sea_student_pers_details',$id);
		$this->load->view('includes/header');
		$this->load->view('StudentManagement/studentView',$data);
		$this->load->view('includes/footer');
		
	}

}