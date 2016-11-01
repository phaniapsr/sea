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
        if ($this->session->user_logged_in['role_id'] == 1 && isset($_POST['ProgramId']) && $this->input->post('ProgramId') != '') {

            //For Student Registration Fee
            $revenue_split = array(
                'company_amount' => $this->input->post('RegistrationFee'),
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['SR_FEE']
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Kit fee split
            $revenue_split = array(
                'company_amount' => $this->input->post('KitFee'),
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['KIT_FEE'][$_POST['ProgramId']][$_POST['ProgramCourseLevelId']]
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Level Fee
            $revenue_split = array(
                'company_amount' => $this->input->post('CourseFee'),
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['LEVEL_FEE'][$_POST['ProgramId']]
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);

            //For Annual competition Fee
            $revenue_split = array(
                'company_amount' => $this->input->post('AcFee'),
                'student_id' => $student_id,
                'revenue_type_id' => GlobalsHelper::$course_level_config_array['AC_FEE']
            );
            $this->student->insertNewRecord('sea_student_revenue', $revenue_split);
        } //Logged in user is UF
        elseif ($this->session->user_logged_in['role_id'] == 4 && isset($_POST['ProgramId']) && $this->input->post('ProgramId') != '') {
            //For Student Registration Fee
            $revenueShares = $this->student->getFranchiseRevenueConfigurations(array('user_id' => $this->session->user_logged_in['id'], 'revenue_type_id' => GlobalsHelper::$course_level_config_array['SR_FEE']));
            $revenue_split = array(
                'company_amount' => $this->input->post('RegistrationFee'),
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
                'company_amount' => $this->input->post('KitFee'),
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
                'company_amount' => $this->input->post('CourseFee'),
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
                'company_amount' => $this->input->post('AcFee'),
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
}