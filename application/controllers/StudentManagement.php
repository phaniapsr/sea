<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Phani.
 * Date: 8/7/2016
 * Time: 11:49 PM
 */
class StudentManagement extends CI_Controller
{
    private $course_level_config_array = array(
        'SR_FEE' => 1,
        'KIT_FEE' => array(
            'ACMAS' => array(
                'Level1' => 2,
                'Level2' => 3,
                'Level3' => 3,
                'Level4' => 3,
                'Level5' => 3,
                'Level6' => 3,
                'Level7' => 3,
                'Level8' => 3,
                'Level9' => 3,
                'Level10' => 3
            ),
            'IAA' => array(
                'Level1' => 4,
                'Level2' => 5,
                'Level3' => 5,
                'Level4' => 5,
                'Level5' => 5,
                'Level6' => 5,
                'Level7' => 5,
                'Level8' => 5
            ),
            'FUNMATHS' => array(
                'Level1' => 6,
                'Level2' => 7,
                'Level3' => 7,
                'Level4' => 7,
            ),
            'WRITEASY' => array('' => 8),
        ),
        'LEVEL_FEE' => array(
            'ACMAS' => 9,
            'FUNMATHS' => 10,
            'WRITEASY' => 11,
            'IAA' => 12,
        ),
        'AC_FEE' => 13
    );

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('student_mod', 'student');
        $this->load->model('franchisee_mod', 'franchisee');
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('StudentManagement/studentRegistration');
        $this->load->view('includes/footer');
    }


    public function registerStudent()
    {
        $data = array(
            //'franchiseetypeId'=>4,
            'password'=>$this->input->post('password'),
            'email'=>$this->input->post('email'),
            'first_name'=>$this->input->post('first_name'),
            'last_name'=>$this->input->post('last_name'),
            'middle_name'=>$this->input->post('middle_name'),
            'date_of_birth'=>$this->input->post('date_of_birth'),
            'gender'=>$this->input->post('gender'),
            'age'=>$this->input->post('Age'),
        );

        $result = $this->student->insertNewRecord('sea_users', $data);
        $data1 = array(
            'stud_id' => $result,
            'stud_mothertong' => $this->input->post('MotherTounge'),
            'fath_name' => $this->input->post('FatherName'),
            'fath_mobno' => $this->input->post('FatherMobileNumber'),
            'moth_name' => $this->input->post('MotherName'),
            'moth_mobno' => $this->input->post('MotherMobileNumber'),
            'fath_email' => $this->input->post('ParentEmailId'),
            'fath_qualif' => $this->input->post('FatherQualicfation'),
            'fath_occup' => $this->input->post('FatherOccupation'),
            'moth_qualif' => $this->input->post('MotherQualicfation'),
            'moth_occup' => $this->input->post('MotherOccupation'),
            'land_no' => $this->input->post('LandlineNumber'),
            'school_name' => $this->input->post('SchoolName'),
            'school_add' => $this->input->post('SchoolAddress'),
            'school_mobno' => $this->input->post('SchoolNumber'),
            'program_name' => $this->input->post('ProgramId'),
            'course_name' => $this->input->post('CourseId'),
            'level_name' => $this->input->post('ProgramCourseLevelId'),
            'fsib_name' => $this->input->post('Sibling1Name'),
            'ssib_name' => $this->input->post('Sibling2Name'),
            'fsib_sname' => $this->input->post('Sibling1SchoolName'),
            'fsib_age' => $this->input->post('Sibling1Age'),
            'fsib_gender' => $this->input->post('Sibling1Gender'),
            'fsib_stand' => $this->input->post('Sibling1Standard'),
            'ssib_sname' => $this->input->post('Sibling2SchoolName'),
            'ssib_age' => $this->input->post('Sibling2Age'),
            'ssib_gender' => $this->input->post('Sibling2Gender'),
            'ssib_stand' => $this->input->post('Sibling2Standard'),
        );
        $result1 = $this->student->insertNewRecord('sea_student_pers_details', $data1);
        $data2 = array(
            'user_id' => $result,
            'doorno' => $this->input->post('FlatNo'),
            'streetname' => $this->input->post('StreetName'),
            'area' => $this->input->post('Area'),
            'city' => $this->input->post('City'),
            'pincode' => $this->input->post('PinCode'),
            'state' => $this->input->post('State'),
        );
        $result2 = $this->student->insertNewRecord('sea_franchise_resid_address', $data2);
        $data3 = array(
            'user_id' => $result,
            'stu_program' => $this->input->post('ProgramId'),
            'stu_category' => $this->input->post('CourseId'),
            'stu_level' => $this->input->post('ProgramCourseLevelId'),
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
        $data['data']['smf'] = $this->student->listFromTable('sea_users');
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
        $id = $this->input->post('how');
        $fl = "id";
        $data = array(
            'email' => $this->input->post('email'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'middle_name' => $this->input->post('middle_name'),
            'date_of_birth' => date('Y-m-d', strtotime($this->input->post('DateOfBirth'))),
            'gender' => $this->input->post('gender'),
            'age' => $this->input->post('Age'),
        );
        $result = $this->student->updateTableRecord('sea_users', $fl, $data, $id);
        $data = array(
            'stud_mothertong' => $this->input->post('MotherTounge'),
            'fath_name' => $this->input->post('FatherName'),
            'fath_mobno' => $this->input->post('FatherMobileNumber'),
            'moth_name' => $this->input->post('MotherName'),
            'moth_mobno' => $this->input->post('MotherMobileNumber'),
            'fath_email' => $this->input->post('ParentEmailId'),
            'fath_qualif' => $this->input->post('FatherQualicfation'),
            'fath_occup' => $this->input->post('FatherOccupation'),
            'moth_qualif' => $this->input->post('MotherQualicfation'),
            'moth_occup' => $this->input->post('MotherOccupation'),
            'land_no' => $this->input->post('LandlineNumber'),
            'school_name' => $this->input->post('SchoolName'),
            'school_add' => $this->input->post('SchoolAddress'),
            'school_mobno' => $this->input->post('SchoolNumber'),
            'program_name' => $this->input->post('ProgramId'),
            'course_name' => $this->input->post('CourseId'),
            'level_name' => $this->input->post('ProgramCourseLevelId'),
            'fsib_name' => $this->input->post('Sibling1Name'),
            'ssib_name' => $this->input->post('Sibling2Name'),
            'fsib_sname' => $this->input->post('Sibling1SchoolName'),
            'fsib_age' => $this->input->post('Sibling1Age'),
            'fsib_gender' => $this->input->post('Sibling1Gender'),
            'fsib_stand' => $this->input->post('Sibling1Standard'),
            'ssib_sname' => $this->input->post('Sibling2SchoolName'),
            'ssib_age' => $this->input->post('Sibling2Age'),
            'ssib_gender' => $this->input->post('Sibling2Gender'),
            'ssib_stand' => $this->input->post('Sibling2Standard'),
        );
        $fl = "stud_id";
        $result = $this->student->updateTableRecord('sea_student_pers_details', $fl, $data, $id);
        $data = array(
            'doorno' => $this->input->post('FlatNo'),
            'streetname' => $this->input->post('StreetName'),
            'area' => $this->input->post('Area'),
            'city' => $this->input->post('City'),
            'pincode' => $this->input->post('PinCode'),
            'state' => $this->input->post('State'),

        );
        $fl = "user_id";
        $result = $this->student->updateTableRecord('sea_franchise_resid_address', $fl, $data, $id);
        $data = array(
            'stu_program' => $this->input->post('ProgramId'),
            'stu_category' => $this->input->post('CourseId'),
            'stu_level' => $this->input->post('ProgramCourseLevelId'),

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
<<<<<<< HEAD
        if ($this->session->user_logged_in['role_id'] == 1 && isset($_POST['ProgramId']) && $this->input->post('ProgramId') != '') {

            //For Student Registration Fee
            $revenue_split = array(
                'company_amount' => $this->input->post('RegistrationFee'),
                'tax_amount' => $_POST['Tax'],
                'total_amount' => $_POST['RegistrationFee'],
                'student_id' => $student_id,
                'revenue_type_id' => $this->course_level_config_array['SR_FEE']
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Kit fee split
            $revenue_split = array(

                'company_amount' => $this->input->post('KitFee'),
                'tax_amount' => $_POST['Tax'],
                'total_amount' => $_POST['KitFee'],
                'student_id' => $student_id,
                'revenue_type_id' => $this->course_level_config_array['KIT_FEE'][$_POST['ProgramId']][$_POST['ProgramCourseLevelId']]
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Level Fee
            $revenue_split = array(
                'company_amount' => $this->input->post('CourseFee'),
                'tax_amount' => $_POST['Tax'],
                'total_amount' => $_POST['CourseFee'],
                'student_id' => $student_id,
                'revenue_type_id' => $this->course_level_config_array['LEVEL_FEE'][$_POST['ProgramId']]
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Annual competition Fee
            $revenue_split = array(

                'company_amount' => $this->input->post('AcFee'),
                'tax_amount' => $_POST['Tax'],
                'total_amount' => $_POST['AcFee'],
                'student_id' => $student_id,
                'revenue_type_id' => $this->course_level_config_array['AC_FEE']
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);
        } //Logged in user is UF
        elseif ($this->session->user_logged_in['role_id'] == 4 && isset($_POST['ProgramId']) && $_POST['ProgramId'] != '') {
            //For Student Registration Fee split
            $revenueShares = $this->student->getStudentRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => $this->course_level_config_array['SR_FEE']));
            $revenue_split = array(
                //'company_amount' => $_POST['RegistrationFee'],
                'tax_amount' => $_POST['Tax'],
                'total_amount' => $_POST['RegistrationFee'],
                'smf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['RegistrationFee'] * $revenueShares[0]['state_share']) / 100, 2) : round($revenueShares[0]['state_share'], 2),
                'smf_id' => $this->session->user_logged_in['parent_smf_id'] == '' ? null : $this->session->user_logged_in['parent_smf_id'],
                'consultant_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['RegistrationFee'] * $revenueShares[0]['consultant_share']) / 100, 2) : round($revenueShares[0]['consultant_share'], 2),
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'] == '' ? null : $this->session->user_logged_in['parent_consultant_id'],
                'dmf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['RegistrationFee'] * $revenueShares[0]['district_share']) / 100, 2) : round($revenueShares[0]['district_share'], 2),
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'] == '' ? null : $this->session->user_logged_in['parent_dmf_id'],
                'uf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['RegistrationFee'] * $revenueShares[0]['unit_share']) / 100, 2) : round($revenueShares[0]['unit_share'], 2),
                'uf_id' => $this->session->user_logged_in['id'],
                'student_id' => $student_id,
                'revenue_type_id' => $this->course_level_config_array['SR_FEE']
            );
            $revenue_split['company_amount'] = $this->input->post('RegistrationFee') - ($revenue_split['consultant_amount'] + $revenue_split['smf_amount'] + $revenue_split['dmf_amount'] + $revenue_split['uf_amount']);
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Kit fee split
            $revenueShares = $this->student->getStudentRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => $this->course_level_config_array['KIT_FEE'][$_POST['ProgramId']][$_POST['ProgramCourseLevelId']]));
            $revenue_split = array(
                //'company_amount' => $_POST['KitFee'],
                'tax_amount' => $_POST['Tax'],
                'total_amount' => $_POST['KitFee'],
                'smf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['KitFee'] * $revenueShares[0]['state_share']) / 100, 2) : round($revenueShares[0]['state_share'], 2),
                'smf_id' => $this->session->user_logged_in['parent_smf_id'] == '' ? null : $this->session->user_logged_in['parent_smf_id'],
                'consultant_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['KitFee'] * $revenueShares[0]['consultant_share']) / 100, 2) : round($revenueShares[0]['consultant_share'], 2),
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'] == '' ? null : $this->session->user_logged_in['parent_consultant_id'],
                'dmf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['KitFee'] * $revenueShares[0]['district_share']) / 100, 2) : round($revenueShares[0]['district_share'], 2),
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'] == '' ? null : $this->session->user_logged_in['parent_dmf_id'],
                'uf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['KitFee'] * $revenueShares[0]['unit_share']) / 100, 2) : round($revenueShares[0]['unit_share'], 2),
                'uf_id' => $this->session->user_logged_in['id'],
                'student_id' => $student_id,
                'revenue_type_id' => $this->course_level_config_array['KIT_FEE'][$_POST['ProgramId']][$_POST['ProgramCourseLevelId']]
            );
            $revenue_split['company_amount'] = $this->input->post('KitFee') - ($revenue_split['consultant_amount'] + $revenue_split['smf_amount'] + $revenue_split['dmf_amount'] + $revenue_split['uf_amount']);
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Level Fee
            $revenueShares = $this->student->getStudentRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => $this->course_level_config_array['LEVEL_FEE'][$_POST['ProgramId']]));
            $revenue_split = array(
                'tax_amount' => $_POST['Tax'],
                'total_amount' => $_POST['CourseFee'],
                'smf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['CourseFee'] * $revenueShares[0]['state_share']) / 100, 2) : round($revenueShares[0]['state_share'], 2),
                'smf_id' => $this->session->user_logged_in['parent_smf_id'] == '' ? null : $this->session->user_logged_in['parent_smf_id'],
                'consultant_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['CourseFee'] * $revenueShares[0]['consultant_share']) / 100, 2) : round($revenueShares[0]['consultant_share'], 2),
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'] == '' ? null : $this->session->user_logged_in['parent_consultant_id'],
                'dmf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['CourseFee'] * $revenueShares[0]['district_share']) / 100, 2) : round($revenueShares[0]['district_share'], 2),
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'] == '' ? null : $this->session->user_logged_in['parent_dmf_id'],
                'uf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['CourseFee'] * $revenueShares[0]['unit_share']) / 100, 2) : round($revenueShares[0]['unit_share'], 2),
                'uf_id' => $this->session->user_logged_in['id'],
                'student_id' => $student_id,
                'revenue_type_id' => $this->course_level_config_array['LEVEL_FEE'][$_POST['ProgramId']]
            );
            $revenue_split['company_amount'] = $this->input->post('CourseFee') - ($revenue_split['consultant_amount'] + $revenue_split['smf_amount'] + $revenue_split['dmf_amount'] + $revenue_split['uf_amount']);
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Annual competition Fee
            $revenueShares = $this->student->getStudentRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => $this->course_level_config_array['AC_FEE']));
            $revenue_split = array(
                'tax_amount' => $_POST['Tax'],
                'total_amount' => $_POST['AcFee'],
                'smf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['AcFee'] * $revenueShares[0]['state_share']) / 100, 2) : round($revenueShares[0]['state_share'], 2),
                'smf_id' => $this->session->user_logged_in['parent_smf_id'] == '' ? null : $this->session->user_logged_in['parent_smf_id'],
                'consultant_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['AcFee'] * $revenueShares[0]['consultant_share']) / 100, 2) : round($revenueShares[0]['consultant_share'], 2),
                'consultant_id' => $this->session->user_logged_in['parent_consultant_id'] == '' ? null : $this->session->user_logged_in['parent_consultant_id'],
                'dmf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['AcFee'] * $revenueShares[0]['district_share']) / 100, 2) : round($revenueShares[0]['district_share'], 2),
                'dmf_id' => $this->session->user_logged_in['parent_dmf_id'] == '' ? null : $this->session->user_logged_in['parent_dmf_id'],
                'uf_amount' => $revenueShares[0]['units'] == 1 ? round(($_POST['AcFee'] * $revenueShares[0]['unit_share']) / 100, 2) : round($revenueShares[0]['unit_share'], 2),
                'uf_id' => $this->session->user_logged_in['id'],
                'student_id' => $student_id,
                'revenue_type_id' => $this->course_level_config_array['AC_FEE']
            );
            $revenue_split['company_amount'] = $this->input->post('AcFee') - ($revenue_split['consultant_amount'] + $revenue_split['smf_amount'] + $revenue_split['dmf_amount'] + $revenue_split['uf_amount']);
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);
        }
    }

    public function registrationAmountToBePaid()
    {
        $userId = $this->input->post('userId');
        $data['data'] = $this->student->getRegistrationFeeDetails($userId);

        $this->load->view('StudentManagement/stuRegistrationAmountToBePaid', $data);
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