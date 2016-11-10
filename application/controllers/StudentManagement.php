<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Phani.
 * Date: 8/7/2016
 * Time: 11:49 PM
 */
class StudentManagement extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('student_mod', 'student');
        $this->load->model('franchisee_mod', 'franchisee');
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
            //'franchiseetypeId'=>4,
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],
            'first_name'=>$_POST['first_name'],
            'last_name'=>$_POST['last_name'],
            'middle_name'=>$_POST['middle_name'],
            'date_of_birth'=>$_POST['date_of_birth'],
            'gender'=>$_POST['gender'],
            'age'=>$_POST['Age'],
        );

        $result = $this->student->insertNewRecord('sea_users', $data);
        $data1 = array(
            'stud_id' => $result,
            'stud_mothertong' => $_POST['MotherTounge'],
            'fath_name' => $_POST['FatherName'],
            'fath_mobno' => $_POST['FatherMobileNumber'],
            'moth_name' => $_POST['MotherName'],
            'moth_mobno' => $_POST['MotherMobileNumber'],
            'fath_email' => $_POST['ParentEmailId'],
            'fath_qualif' => $_POST['FatherQualicfation'],
            'fath_occup' => $_POST['FatherOccupation'],
            'moth_qualif' => $_POST['MotherQualicfation'],
            'moth_occup' => $_POST['MotherOccupation'],
            'land_no' => $_POST['LandlineNumber'],
            'school_name' => $_POST['SchoolName'],
            'school_add' => $_POST['SchoolAddress'],
            'school_mobno' => $_POST['SchoolNumber'],
            'program_name' => $_POST['ProgramId'],
            'course_name' => $_POST['CourseId'],
            'level_name' => $_POST['ProgramCourseLevelId'],
            'fsib_name' => $_POST['Sibling1Name'],
            'ssib_name' => $_POST['Sibling2Name'],
            'fsib_sname' => $_POST['Sibling1SchoolName'],
            'fsib_age' => $_POST['Sibling1Age'],
            'fsib_gender' => $_POST['Sibling1Gender'],
            'fsib_stand' => $_POST['Sibling1Standard'],
            'ssib_sname' => $_POST['Sibling2SchoolName'],
            'ssib_age' => $_POST['Sibling2Age'],
            'ssib_gender' => $_POST['Sibling2Gender'],
            'ssib_stand' => $_POST['Sibling2Standard'],
        );
        $result1 = $this->student->insertNewRecord('sea_student_pers_details', $data1);
        $data2 = array(
            'user_id' => $result,
            'doorno' => $_POST['FlatNo'],
            'streetname' => $_POST['StreetName'],
            'area' => $_POST['Area'],
            'city' => $_POST['City'],
            'pincode' => $_POST['PinCode'],
            'state' => $_POST['State'],
        );
        $result2 = $this->student->insertNewRecord('sea_franchise_resid_address', $data2);
        $data3 = array(
            'user_id' => $result,
            'stu_program' => $_POST['ProgramId'],
            'stu_category' => $_POST['CourseId'],
            'stu_level' => $_POST['ProgramCourseLevelId'],
        );
        $result3 = $this->student->insertNewRecord('sea_student_course_level', $data3);
        $data = array(
            'user_id' => $result,
            'role_id' => 6,
        );
        $role = $this->franchisee->insertNewRecord('sea_user_role', $data);
        //Logic for inserting record in hierarchy table
        //If admin/consultant login and creating SMF/DMF/UF
        if ($this->session->user_logged_in['role_id'] == 1 || $this->session->user_logged_in['role_id'] == 5) {
            $data_hierarchy = array(
                'user_id' => $result,
                'created_by' => $this->session->user_logged_in['id'],
            );
        } // else if UMF login and creating Student
        elseif ($this->session->user_logged_in['role_id'] == 4) {
            $data_hierarchy = array(
                'user_id' => $result,
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'],
                'smf_id' => $this->session->user_logged_in['parent_smf_id'],
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'],
                'uf_id' => $this->session->user_logged_in['id'],
                'created_by' => $this->session->user_logged_in['id'],
            );
        }
        //$hierarchy = $this->franchisee->insertNewRecord('sea_user_hierarchy', $data_hierarchy);
		$hierarchy = $this->student->insertNewRecord('sea_user_hierarchy', $data_hierarchy);
        //End of hierarchy table data insertion
        $this->studentRevenueDistribution($result);
        //header('application/json');
        echo $result;
    }


    public function currentStudentsList()
    {
        $data['data']['smf'] =$this->student->listFromTable('sea_users');
        $this->load->view('includes/header');
        $this->load->view('StudentManagement/currentStudentsList', $data);
        $this->load->view('includes/footer');
    }

    public function sdetailView($id)
    {
        $data['data']['smf'] = $this->student->currentStudentsList('sea_student_pers_details', $id);
        $this->load->view('includes/header');
        $this->load->view('StudentManagement/studentView', $data);
        $this->load->view('includes/footer');
    }

    public function editstuList($id)
    {
        $data['data']['smf'] = $this->student->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('StudentManagement/editstuList', $data);
        $this->load->view('includes/footer');
    }

    public function updateStudent()
    {
        $id = $_POST['how'];
        $fl = "id";
        $data = array(
            'email' => $_POST['email'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'middle_name' => $_POST['middle_name'],
            'date_of_birth' => date('Y-m-d', strtotime($_POST['DateOfBirth'])),
            'gender' => $_POST['gender'],
            'age' => $_POST['Age'],
        );
        $result = $this->student->updateTableRecord('sea_users', $fl, $data, $id);
        $data = array(
            'stud_mothertong' => $_POST['MotherTounge'],
            'fath_name' => $_POST['FatherName'],
            'fath_mobno' => $_POST['FatherMobileNumber'],
            'moth_name' => $_POST['MotherName'],
            'moth_mobno' => $_POST['MotherMobileNumber'],
            'fath_email' => $_POST['ParentEmailId'],
            'fath_qualif' => $_POST['FatherQualicfation'],
            'fath_occup' => $_POST['FatherOccupation'],
            'moth_qualif' => $_POST['MotherQualicfation'],
            'moth_occup' => $_POST['MotherOccupation'],
            'land_no' => $_POST['LandlineNumber'],
            'school_name' => $_POST['SchoolName'],
            'school_add' => $_POST['SchoolAddress'],
            'school_mobno' => $_POST['SchoolNumber'],
            'program_name' => $_POST['ProgramId'],
            'course_name' => $_POST['CourseId'],
            'level_name' => $_POST['ProgramCourseLevelId'],
            'fsib_name' => $_POST['Sibling1Name'],
            'ssib_name' => $_POST['Sibling2Name'],
            'fsib_sname' => $_POST['Sibling1SchoolName'],
            'fsib_age' => $_POST['Sibling1Age'],
            'fsib_gender' => $_POST['Sibling1Gender'],
            'fsib_stand' => $_POST['Sibling1Standard'],
            'ssib_sname' => $_POST['Sibling2SchoolName'],
            'ssib_age' => $_POST['Sibling2Age'],
            'ssib_gender' => $_POST['Sibling2Gender'],
            'ssib_stand' => $_POST['Sibling2Standard'],
        );
        $fl = "stud_id";
        $result = $this->student->updateTableRecord('sea_student_pers_details', $fl, $data, $id);
        $data = array(
            'doorno' => $_POST['FlatNo'],
            'streetname' => $_POST['StreetName'],
            'area' => $_POST['Area'],
            'city' => $_POST['City'],
            'pincode' => $_POST['PinCode'],
            'state' => $_POST['State'],

        );
        $fl = "user_id";
        $result = $this->student->updateTableRecord('sea_franchise_resid_address', $fl, $data, $id);
        $data = array(
            'stu_program' => $_POST['ProgramId'],
            'stu_category' => $_POST['CourseId'],
            'stu_level' => $_POST['ProgramCourseLevelId'],

        );
        $fl = "user_id";
        $result3 = $this->student->updateTableRecord('sea_student_course_level', $fl, $data, $id);
        $data['data']['smf'] = $this->student->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('StudentManagement/editstuList', $data);
        $this->load->view('includes/footer');

    }

    /*public function paymentDetailsDisplay(){

    }*/

    public function studentRevenueDistribution($student_id)
    {
        if ($this->session->user_logged_in['role_id'] == 1 && isset($_POST['ProgramId']) && $_POST['ProgramId'] != '') {

            //For Student Registration Fee
            $revenue_split = array(
                'company_amount' => $_POST['RegistrationFee'],
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['SR_FEE']
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Kit fee split
            $revenue_split = array(
                'company_amount' => $_POST['KitFee'],
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['KIT_FEE'][$_POST['ProgramId']][$_POST['ProgramCourseLevelId']]
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Level Fee
            $revenue_split = array(
                'company_amount' => $_POST['CourseFee'],
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['LEVEL_FEE'][$_POST['ProgramId']]
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Annual competition Fee
            $revenue_split = array(
                'company_amount' => $_POST['AcFee'],
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['AC_FEE']
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);
        } //Logged in user is UF
        elseif ($this->session->user_logged_in['role_id'] == 4 && isset($_POST['ProgramId']) && $_POST['ProgramId'] != '') {
            //For Student Registration Fee
            $revenueShares = $this->student->getFranchiseRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => GlobalsHelper::$course_level_config_array['SR_FEE']));
            $revenue_split = array(
                'company_amount' => $_POST['RegistrationFee'],
                'smf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['RegistrationFee'] * $revenueShares[0]['state_share']) / 100, 2) : round($revenueShares[0]['state_share'], 2),
                'smf_id' => $this->session->user_logged_in['parent_smf_id'] == '' ? null : $this->session->user_logged_in['parent_smf_id'],
                'consultant_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['RegistrationFee'] * $revenueShares[0]['consultant_share']) / 100, 2) : round($revenueShares[0]['consultant_share'], 2),
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'] == '' ? null : $this->session->user_logged_in['parent_consultant_id'],
                'dmf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['RegistrationFee'] * $revenueShares[0]['district_share']) / 100, 2) : round($revenueShares[0]['district_share'], 2),
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'] == '' ? null : $this->session->user_logged_in['parent_dmf_id'],
                'uf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['RegistrationFee'] * $revenueShares[0]['unit_share']) / 100, 2) : round($revenueShares[0]['unit_share'], 2),
                'uf_id' => $this->session->user_logged_in['id'],
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['SR_FEE']
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Kit fee split
            $revenueShares = $this->student->getFranchiseRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => GlobalsHelper::$course_level_config_array['KIT_FEE'][$_POST['ProgramId']][$_POST['ProgramCourseLevelId']]));
            $revenue_split = array(
                'company_amount' => $_POST['KitFee'],
                'smf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['KitFee'] * $revenueShares[0]['state_share']) / 100, 2) : round($revenueShares[0]['state_share'], 2),
                'smf_id' => $this->session->user_logged_in['parent_smf_id'] == '' ? null : $this->session->user_logged_in['parent_smf_id'],
                'consultant_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['KitFee'] * $revenueShares[0]['consultant_share']) / 100, 2) : round($revenueShares[0]['consultant_share'], 2),
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'] == '' ? null : $this->session->user_logged_in['parent_consultant_id'],
                'dmf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['KitFee'] * $revenueShares[0]['district_share']) / 100, 2) : round($revenueShares[0]['district_share'], 2),
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'] == '' ? null : $this->session->user_logged_in['parent_dmf_id'],
                'uf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['KitFee'] * $revenueShares[0]['unit_share']) / 100, 2) : round($revenueShares[0]['unit_share'], 2),
                'uf_id' => $this->session->user_logged_in['id'],
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['KIT_FEE'][$_POST['ProgramId']][$_POST['ProgramCourseLevelId']]
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Level Fee
            $revenueShares = $this->student->getFranchiseRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => GlobalsHelper::$course_level_config_array['LEVEL_FEE'][$_POST['ProgramId']]));
            $revenue_split = array(
                'company_amount' => $_POST['CourseFee'],
                'smf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['CourseFee'] * $revenueShares[0]['state_share']) / 100, 2) : round($revenueShares[0]['state_share'], 2),
                'smf_id' => $this->session->user_logged_in['parent_smf_id'] == '' ? null : $this->session->user_logged_in['parent_smf_id'],
                'consultant_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['CourseFee'] * $revenueShares[0]['consultant_share']) / 100, 2) : round($revenueShares[0]['consultant_share'], 2),
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'] == '' ? null : $this->session->user_logged_in['parent_consultant_id'],
                'dmf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['CourseFee'] * $revenueShares[0]['district_share']) / 100, 2) : round($revenueShares[0]['district_share'], 2),
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'] == '' ? null : $this->session->user_logged_in['parent_dmf_id'],
                'uf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['CourseFee'] * $revenueShares[0]['unit_share']) / 100, 2) : round($revenueShares[0]['unit_share'], 2),
                'uf_id' => $this->session->user_logged_in['id'],
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['LEVEL_FEE'][$_POST['ProgramId']]
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Annual competition Fee
            $revenueShares = $this->student->getFranchiseRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => GlobalsHelper::$course_level_config_array['AC_FEE']));
            $revenue_split = array(
                'company_amount' => $_POST['AcFee'],
                'smf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['AcFee'] * $revenueShares[0]['state_share']) / 100, 2) : round($revenueShares[0]['state_share'], 2),
                'smf_id' => $this->session->user_logged_in['parent_smf_id'] == '' ? null : $this->session->user_logged_in['parent_smf_id'],
                'consultant_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['AcFee'] * $revenueShares[0]['consultant_share']) / 100, 2) : round($revenueShares[0]['consultant_share'], 2),
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'] == '' ? null : $this->session->user_logged_in['parent_consultant_id'],
                'dmf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['AcFee'] * $revenueShares[0]['district_share']) / 100, 2) : round($revenueShares[0]['district_share'], 2),
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'] == '' ? null : $this->session->user_logged_in['parent_dmf_id'],
                'uf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['AcFee'] * $revenueShares[0]['unit_share']) / 100, 2) : round($revenueShares[0]['unit_share'], 2),
                'uf_id' => $this->session->user_logged_in['id'],
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['AC_FEE']
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);
        }
    }

	public function registrationAmountToBePaid()
    {
        $userId = $this->input->post('userId');
        $data['data'] = $this->student->getRegistrationFeeDetails($userId);
        $this->load->view('StudentManagement/registrationAmountToBePaid',$data);
    }
	public function creatExams()
	{

		$data = array();
		if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
			$filesCount = count($_FILES['userFiles']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
				$_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
				$_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

				$uploadPath = 'uploads/exams/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png';
				//$config['max_size']	= '100';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('userFile')){
					$fileData = $this->upload->data();
					$uploadData[$i]['exam_name'] = $fileData['file_name'];
					$uploadData[$i]['program_name'] = $this->input->post('ProgramId');
					$uploadData[$i]['course_name'] = $this->input->post('CourseId');
					$uploadData[$i]['level_name'] = $this->input->post('ProgramCourseLevelId');
				}
			}
			if(!empty($uploadData)){
				//Insert files data into the database
				$insert = $this->student->insertUploadExams($uploadData);
				$statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
				$this->session->set_flashdata('statusMsg',$statusMsg);
				redirect('StudentManagement/viewExams', 'refresh');
			}
		}
		//get files data from database
        $data['files'] = $this->student->getUploadRows();
		//pass the files data to view
		//$this->load->view('upload_files/index', $data);
		$this->load->view('includes/header');
        $this->load->view('StudentManagement/creatExams', $data);
        $this->load->view('includes/footer');
		
	
	}
	
	public function viewExams()
	{
		 $data['files'] = $this->student->getUploadRows();
		$this->load->view('includes/header');
        $this->load->view('StudentManagement/viewExams',$data);
        $this->load->view('includes/footer');
		
	
	}
}