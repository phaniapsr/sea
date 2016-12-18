<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Phani Kumar.
 * Date: 8/6/2016
 * Time: 9:44 PM
 */
class FranchiseeManagement extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('franchisee_mod', 'franchisee');

        //$this->load->model('merchant_mod');
        $this->load->library('form_validation');
		 $this->load->helper('array');
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/franchiseeRegistration');
        $this->load->view('includes/footer');
    }


    public function registerFranchisee(){
        //$this->db->trans_begin();
		$from=new Datetime($this->input->post('DateOfBirth'));
		$to=new Datetime('today');
		$age=$from->diff($to)->y;
        $data=array(
            'username'=>ucwords($this->input->post('franchiseeName')),
            'password'=>$this->input->post('password'),
            'email'=>$this->input->post('email'),
            'first_name'=>ucwords($this->input->post('first_name')),
            'last_name'=>ucwords($this->input->post('last_name')),
            'middle_name'=>ucwords($this->input->post('middle_name')),
            'date_of_birth'=>date('Y-m-d',strtotime($this->input->post('DateOfBirth'))),
			'age'=>$age,
			'gender'=>$this->input->post('gender'),
            'landno'=>$this->input->post('LandlineNumber'),
            'mobileno'=>$this->input->post('MobileNumber'),
            'birthplace'=>$this->input->post('PlaceOfBirth'),
            'franch_name'=>$this->input->post('franchiseeName'),
            'franchiseetypeId'=>$this->input->post('franchiseetypeId'),
            'image_path'=>trim($this->input->post('img'),'"'),
        );
        if($this->checkEmail()==0) {
            $result = $this->franchisee->insertNewRecord('sea_users', $data);
            $data1 = array(
                'user_id' => $result,
                'college_university' => $this->input->post('University'),
                'qualification' => $this->input->post('Qualification'),
                'completed_in_year' => $this->input->post('CompletedYear'),
            );
            $result1 = $this->franchisee->insertNewRecord('sea_franchise_education_details', $data1);
            $data = array(
                'user_id' => $result,
                'level_id' => $this->input->post('franchiseetypeId'),
            );
            $data2 = array(
                'user_id' => $result,
                'doorno' => $this->input->post('FlatNo'),
                'streetname' => $this->input->post('StreetName'),
                'area' => $this->input->post('Area'),
                'city' => $this->input->post('City'),
                'pincode' => $this->input->post('PinCode'),
                'state' => $this->input->post('State'),
                'nationality' => $this->input->post('Nationality'),
                'r_doorno' => $this->input->post('RflatNo'),
                'r_streetname' => $this->input->post('RstreetName'),
                'r_area' => $this->input->post('Rarea'),
                'r_city' => $this->input->post('Rcity'),
                'r_pincode' => $this->input->post('RpinCode'),
                'r_state' => $this->input->post('Rstate'),
                'r_nationality' => $this->input->post('Rnationality'),
            );
            $result2 = $this->franchisee->insertNewRecord('sea_franchise_resid_address', $data2);
            $data3 = array(
                'user_id' => $result,
                'course_type' => $this->input->post('OfCourse'),
                'course_name' => $this->input->post('CourseName'),
                'institution' => $this->input->post('Instiution'),
                'course_compl_year' => $this->input->post('OtherCompletedYear'),
                'occupation' => $this->input->post('PresentOcupation'),
                'purpose' => $this->input->post('Goal'),
                'fees' => $this->input->post('FranchiseLicenseFee'),
            );
            $result3 = $this->franchisee->insertNewRecord('sea_franchise_oth_train_att', $data3);
            if ($result > 0) {
                $level = $this->franchisee->insertNewRecord('sea_franchise_level', $data);
                $data = array(
                    'user_id' => $result,
                    'role_id' => $this->input->post('franchiseetypeId'),
                );
                $role = $this->franchisee->insertNewRecord('sea_user_role', $data);

                //Logic for inserting record in hierarchy table
                //If admin login and creating SMF/DMF/UF
                if ($this->session->user_logged_in['role_id'] == 1) {
                    $data_hierarchy = array(
                        'user_id' => $result,
                        'created_by' => $this->session->user_logged_in['id'],
                    );
                } //else If consultant login and creating SMF/DMF/UF
                else if ($this->session->user_logged_in['role_id'] == 5) {
                    $data_hierarchy = array(
                        'user_id' => $result,
                        'consultant_id' => $this->session->user_logged_in['id'],
                        'created_by' => $this->session->user_logged_in['id'],
                    );
                } // else if SMF login and creating DMF/UMF
                elseif ($this->session->user_logged_in['role_id'] == 2) {
                    $data_hierarchy = array(
                        'user_id' => $result,
                        'consultant_id' => $this->session->user_logged_in['parent_consultant_id'],
                        'smf_id' => $this->session->user_logged_in['id'],
                        'created_by' => $this->session->user_logged_in['id'],
                    );
                } // else if DMF login and creating UMF
                elseif ($this->session->user_logged_in['role_id'] == 3) {
                    $data_hierarchy = array(
                        'user_id' => $result,
                        'consultant_id' => $this->session->user_logged_in['parent_consultant_id'],
                        'smf_id' => $this->session->user_logged_in['parent_smf_id'],
                        'dmf_id' => $this->session->user_logged_in['id'],
                        'created_by' => $this->session->user_logged_in['id'],
                    );
                }
                $hierarchy = $this->franchisee->insertNewRecord('sea_user_hierarchy', $data_hierarchy);
                //End of hierarchy table data insertion
                //Store franchise license fee
                $data_revenue=array(
                    'user_id'=>$result,
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
                //End of franchise license fee
                $revenue = $this->franchisee->insertNewRecord('sea_franchise_revenue', $data_revenue);
                //$this->franchiseeRevenueDistribution($result);
            }
            //if (isset($_POST['ACMAS']))
			if($this->input->post('ACMAS')!==null)	
                $ca = 1;
            else
                $ca = 0;
            if($this->input->post('WRITEASY')!==null)	
                $cw = 1;
            else
                $cw = 0;
            if($this->input->post('IAA')!==null)	
                $ci = 1;
            else
                $ci = 0;
			if($this->input->post('FUNMATHS')!==null)	
                $cf = 1;
            else
                $cf = 0;
            $data4 = array(
                'user_id' => $result,
                'course_acmas' => $ca,
                'course_writeasy' => $cw,
                'course_iaa' => $ci,
                'course_funmaths' => $cf,
            );
            $result4 = $this->franchisee->insertNewRecord('sea_franchise_courses', $data4);
            $this->load->library('email');
			$this->email->from('noreply@example.com', 'Example App'); // Change these details
			$this->email->to($_POST['email']); 
			$this->email->subject('Login Details');
			$this->email->message('Email :"'.$_POST['email'].'"<br>Password:"'.$_POST['password'].'"');	
			@$this->email->send();
			echo json_encode(array('id'=>$result,'utype'=>$this->input->post('userType')));
        }
        else echo json_encode(array('error'=>'Email already taken'));
    }

    public function dashboard()
    {
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/dashboard');
        $this->load->view('includes/footer');
    }

    public function smfList()
    {
		$filter=array(
		'name'=>$this->input->post('search'),
		);
        $data['data']['smf'] = $this->franchisee->listFromTable('2',$filter);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/smfList', $data);
        $this->load->view('includes/footer');
    }

    public function dmfList()
    {
		$filter=array(
		'name'=>$this->input->post('search'),
		);
        $data['data']['smf'] = $this->franchisee->listFromTable('3',$filter);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/dmfList', $data);
        $this->load->view('includes/footer');
    }

    public function ufList()
    {
		$filter=array(
		'name'=>$this->input->post('search'),
		);
        $data['data']['smf'] = $this->franchisee->listFromTable('4',$filter);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/umfList', $data);
        $this->load->view('includes/footer');
    }

    public function consultantsList()
    {
		$filter=array(
		'name'=>$this->input->post('find'),
		);
        $data['data']['smf'] = $this->franchisee->listFromTable('5',$filter);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/consultantsList', $data);
        $this->load->view('includes/footer');
    }

    public function detailsmfList($id)
    {
        $data['data']['smf'] = $this->franchisee->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/detailsmfList', $data);
        $this->load->view('includes/footer');
    }

    public function detaildmfList($id)
    {
        $data['data']['smf'] = $this->franchisee->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/detaildmfList', $data);
        $this->load->view('includes/footer');

    }

    public function detailufList($id)
    {
        $data['data']['smf'] = $this->franchisee->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/detailufList', $data);
        $this->load->view('includes/footer');

    }

    public function detailConsulView($id)
    {
        $data['data']['smf'] = $this->franchisee->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/detailConsulView', $data);
        $this->load->view('includes/footer');

    }

    public function editsmfList($id)
    {
        $data['data']['smf'] = $this->franchisee->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/editsmfList', $data);
        $this->load->view('includes/footer');
    }

    public function updateFranchisee()
    {
        $fl = "id";
        $id = $this->input->post('id');
		$from=new Datetime($this->input->post('DateOfBirth'));
		$to=new Datetime('today');
		$age=$from->diff($to)->y;
        $data = array(
            'username' => $this->input->post('franchiseeName'),
            'email' => $this->input->post('email'),
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'date_of_birth' => date('Y-m-d', strtotime($this->input->post('DateOfBirth'))),
			'age'=>$age,
            'gender' => $this->input->post('gender'),
            'landno' => $this->input->post('LandlineNumber'),
            'mobileno' => $this->input->post('MobileNumber'),
            'birthplace' => $this->input->post('PlaceOfBirth'),
			'image_path'=>trim($this->input->post('img'),'"'),
        );
        $result = $this->franchisee->updateTableRecord('sea_users', $fl, $data, $id);
        $fl = "user_id";
        $data = array(
            'college_university' => $this->input->post('University'),
            'qualification' => $this->input->post('Qualification'),
            'completed_in_year' => $this->input->post('CompletedYear'),
        );
        $result = $this->franchisee->updateTableRecord('sea_franchise_education_details', $fl, $data, $id);
        $data = array(
            'doorno' => $this->input->post('FlatNo'),
            'streetname' => $this->input->post('StreetName'),
            'area' => $this->input->post('Area'),
            'city' => $this->input->post('City'),
            'pincode' => $this->input->post('PinCode'),
            'state' => $this->input->post('State'),
            'nationality' => $this->input->post('Nationality'),
            'r_doorno' => $this->input->post('RflatNo'),
            'r_streetname' => $this->input->post('RstreetName'),
            'r_area' => $this->input->post('Rarea'),
            'r_city' => $this->input->post('Rcity'),
            'r_pincode' => $this->input->post('RpinCode'),
            'r_state' => $this->input->post('Rstate'),
            'r_nationality' => $this->input->post('Rnationality'),
        );
        $result = $this->franchisee->updateTableRecord('sea_franchise_resid_address', $fl, $data, $id);
        $data = array(
            'course_type' => $this->input->post('OfCourse'),
            'course_name' => $this->input->post('CourseName'),
            'institution' => $this->input->post('Instiution'),
            'course_compl_year' => $this->input->post('OtherCompletedYear'),
            'occupation' => $this->input->post('PresentOcupation'),
            'purpose' => $this->input->post('Goal'),
        );
        $result = $this->franchisee->updateTableRecord('sea_franchise_oth_train_att', $fl, $data, $id);
        if($this->input->post('ACMAS')!==null)
            $ca = 1;
        else
            $ca = 0;
        if($this->input->post('WRITEASY')!==null)	
            $cw = 1;
        else
            $cw = 0;
        if($this->input->post('IAA')!==null)	
            $ci = 1;
        else
            $ci = 0;
        if($this->input->post('FUNMATHS')!==null)	
            $cf = 1;
        else
            $cf = 0;
        $data4 = array(
            'user_id' => $id,
            'course_acmas' => $ca,
            'course_writeasy' => $cw,
            'course_iaa' => $ci,
            'course_funmaths' => $cf,
        );
        $result4 = $this->franchisee->updateTableRecord('sea_franchise_courses', $fl, $data4, $id);
        $data['data']['smf'] = $this->franchisee->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/editsmfList', $data);
        $this->load->view('includes/footer');

    }

//code on 270916 ends here

    public function checkEmail()
    {
        echo $this->franchisee->checkmail($this->input->post('email')) == 0 ? 0 : 1;
    }
	
	public function checkStatus()
	{
		$id=$this->input->post('id');
		$st=$this->franchisee->checkstatus($id);
		if($st==0)
		{
			$data=array('user_status'=>1);
			$this->franchisee->updateTableRecord('sea_users','id',$data,$id);
		}
		if($st==1)
		{
			$data=array('user_status'=>0);
			$this->franchisee->updateTableRecord('sea_users','id',$data,$id);
		}
		echo $st;
		
	}
	public function deleteStudent()
	{
		$id=$this->input->post('id');
		$ar=$this->franchisee->deleteStatus($id);
		$data=array(
		 'ds'=>$ar[0]['user_delete'],
		 'id'=>$ar[0]['role_id']
		);
		
		$data1=array('user_delete'=>1);
		$this->franchisee->updateTableRecord('sea_users','id',$data1,$id);
		
		
		print json_encode($data);
	}

    public function franchiseeRevenueDistribution($userId)
    {
        //Inserting record into revenue configuration table
        //todo : This code has to recheck once payment gateway integration is done
        //if admin creating smf/consultant/dmf/uf

        if ($this->session->user_logged_in['role_id'] == 1) {
            $revenue_data = array(
                //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                'lf_company_amount' => $this->input->post('FranchiseLicenseFee'),
                'tax_amount' => $this->input->post('FranchiseTax'),
                'user_id' => $userId,
                'created_by_id' => $this->session->user_logged_in['id']
            );
        } // else if Consultant login and creating SMF/DMF/UMF
        elseif ($this->session->user_logged_in['role_id'] == 5) {
            $revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['id']);
            //Consultant directly creating SMF
            if ($this->input->post('franchiseetypeId') == 2) {
                //if share in percentage
                if ($revenueShares[0]['units'] == 1) {
                    $consultant_amount = round(($this->input->post('FranchiseLicenseFee') * $revenueShares[0]['direct_state_amount']) / 100, 2);
                    $company_amount = round($this->input->post('FranchiseLicenseFee') - $consultant_amount, 2);
                } //else if share in amount
                else {
                    $consultant_amount = $revenueShares[0]['direct_state_amount'];
                    $company_amount = round($this->input->post('FranchiseLicenseFee') - $consultant_amount, 2);
                }
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_consultant_amount' => $consultant_amount,
                    'consultant_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            } //Consultant directly creating DMF
            elseif ($this->input->post('franchiseetypeId') == 3) {
                //if share in percentage
                if ($revenueShares[0]['units'] == 1) {
                    $consultant_amount = round(($this->input->post('FranchiseLicenseFee') * $revenueShares[0]['direct_district_amount']) / 100, 2);
                    $company_amount = round($this->input->post('FranchiseLicenseFee') - $consultant_amount, 2);
                } //else if share in amount
                else {
                    $consultant_amount = $revenueShares[0]['direct_district_amount'];
                    $company_amount = round($this->input->post('FranchiseLicenseFee') - $consultant_amount, 2);
                }
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_consultant_amount' => $consultant_amount,
                    'consultant_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            } //Consultant directly creating UMF
            elseif ($this->input->post('franchiseetypeId') == 4) {
                //if share in percentage
                if ($revenueShares[0]['units'] == 1) {
                    $consultant_amount = round(($this->input->post('FranchiseLicenseFee') * $revenueShares[0]['direct_unit_amount']) / 100, 2);
                    $company_amount = round($this->input->post('FranchiseLicenseFee') - $consultant_amount, 2);
                } //else if share in amount
                else {
                    $consultant_amount = $revenueShares[0]['direct_unit_amount'];
                    $company_amount = round($this->input->post('FranchiseLicenseFee') - $consultant_amount, 2);
                }
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_consultant_amount' => $consultant_amount,
                    'consultant_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            }
        } // else if SMF login and creating DMF/UMF
        elseif ($this->session->user_logged_in['role_id'] == 2) {
            $smf_revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['id']);
            //SMF creating DMF and this SMF is directly appointed by Admin
            if ($this->input->post('franchiseetypeId') == 3 && $this->session->user_logged_in['parent_consultant_id'] == '') {
                $smf_amount = $smf_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $smf_revenueShares[0]['direct_district_amount']) / 100, 2) : round($smf_revenueShares[0]['direct_district_amount'], 2);
                $company_amount = $smf_revenueShares[0]['units'] == 1 ? round($this->input->post('FranchiseLicenseFee') - $smf_amount, 2) : round($this->input->post['FranchiseLicenseFee'] - $smf_amount, 2);
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_smf_amount' => $smf_amount,
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            } //SMF creating DMF and this SMF is directly appointed by Consultant
            elseif ($this->input->post('franchiseetypeId') == 3 && $this->session->user_logged_in['parent_consultant_id'] != '') {
                $consultant_revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_consultant_id']);
                $smf_amount = $smf_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $smf_revenueShares[0]['direct_district_amount']) / 100, 2) : round($smf_revenueShares[0]['direct_district_amount'], 2);
                $consultant_amount = $consultant_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $consultant_revenueShares[0]['indirect_dmf_amount']) / 100, 2) : $consultant_revenueShares[0]['direct_district_amount'];
                $company_amount = round(($this->input->post['FranchiseLicenseFee'] - $smf_amount - $consultant_amount), 2);
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_smf_amount' => $smf_amount,
                    'smf_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'lf_consultant_amount' => $consultant_amount,
                    'consultant_id' => $this->session->user_logged_in['parent_consultant_id'],
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            } //SMF creating UMF directly and this SMF is directly appointed by Admin
            elseif ($this->input->post('franchiseetypeId') == 4 && $this->session->user_logged_in['parent_consultant_id'] == '') {
                $smf_amount = $smf_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $smf_revenueShares[0]['direct_unit_amount']) / 100, 2) : $smf_revenueShares[0]['direct_unit_amount'];
                $company_amount = round($this->input->post('FranchiseLicenseFee') - $smf_amount, 2);
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_smf_amount' => $smf_amount,
                    'smf_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            } //SMF creating UMF directly and this SMF is directly appointed by Consultant
            elseif ($this->input->post('franchiseetypeId') == 4 && $this->session->user_logged_in['parent_consultant_id'] != '') {
                $consultant_revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_consultant_id']);
                $smf_amount = $smf_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $smf_revenueShares[0]['direct_unit_amount']) / 100, 2) : round($smf_revenueShares[0]['direct_unit_amount'], 2);
                $consultant_amount = $consultant_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $consultant_revenueShares[0]['indirect_uf_amount']) / 100, 2) : $consultant_revenueShares[0]['indirect_uf_amount'];
                $company_amount = round(($this->input->post('FranchiseLicenseFee') - $smf_amount - $consultant_amount), 2);
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_smf_amount' => $smf_amount,
                    'smf_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'lf_consultant_amount' => $consultant_amount,
                    'consultant_id' => $this->session->user_logged_in['parent_consultant_id'],
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            }
        } //elseif DMF login and creating UMF
        elseif ($this->session->user_logged_in['role_id'] == 3) {
            //DMF creating UMF and this DMF is directly appointed by Admin
            $dmf_revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['id']);
            if ($this->input->post('franchiseetypeId') == 4 && $this->session->user_logged_in['parent_smf_id'] == '' && $this->session->user_logged_in['parent_consultant_id'] == '') {
                $dmf_amount = $dmf_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $dmf_revenueShares[0]['direct_unit_amount']) / 100, 2) : round($dmf_revenueShares[0]['direct_unit_amount'], 2);
                $company_amount = round($this->input->post('FranchiseLicenseFee') - $dmf_amount, 2);
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_dmf_amount' => $dmf_amount,
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            } //DMF creating UMF and this DMF is directly appointed by State and this State is created by Admin
            else if ($this->input->post('franchiseetypeId') == 4 && $this->session->user_logged_in['parent_smf_id'] != '' && $this->session->user_logged_in['parent_consultant_id'] == '') {
                $smf_revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_smf']);
                $smf_amount = $smf_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $smf_revenueShares[0]['direct_unit_amount']) / 100, 2) : round($smf_revenueShares[0]['indirect_uf_amount'], 2);
                $dmf_amount = $dmf_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $dmf_revenueShares[0]['direct_unit_amount']) / 100, 2) : round($dmf_revenueShares[0]['direct_unit_amount'], 2);
                $company_amount = round($this->input->post('FranchiseLicenseFee') - $smf_amount - $dmf_amount, 2);
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_smf_amount' => $smf_amount,
                    'smf_id' => $this->session->user_logged_in['parent_smf_id'],
                    'lf_dmf_amount' => $dmf_amount,
                    'dmf_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            } //DMF creating UMF and this DMF is directly appointed by State and this State is created by Consultant
            else if ($this->input->post('franchiseetypeId') == 4 && $this->session->user_logged_in['parent_smf_id'] != '' && $this->session->user_logged_in['parent_consultant_id'] != '') {
                $smf_revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_smf_id']);
                $consultant_revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_consultant_id']);
                $consultant_amount = $consultant_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $consultant_revenueShares[0]['indirect_uf_amount']) / 100, 2) : round($consultant_revenueShares[0]['indirect_uf_amount'], 2);
                $smf_amount = $smf_revenueShares[0]['units'] == 1 ? round(($this->input->post['FranchiseLicenseFee'] * $smf_revenueShares[0]['indirect_uf_amount']) / 100, 2) : round($smf_revenueShares[0]['indirect_uf_amount'], 2);
                $dmf_amount = $dmf_revenueShares[0]['units'] == 1 ? round(($this->input->post['FranchiseLicenseFee'] * $dmf_revenueShares[0]['direct_unit_amount']) / 100, 2) : round($dmf_revenueShares[0]['direct_unit_amount'], 2);
                $company_amount = round($this->input->post('FranchiseLicenseFee') - $smf_amount - $dmf_amount - $consultant_amount, 2);
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_consultant_amount' => $consultant_amount,
                    'consultant_id' => $this->session->user_logged_in['parent_smf_id'],
                    'lf_smf_amount' => $smf_amount,
                    'smf_id' => $this->session->user_logged_in['parent_smf_id'],
                    'lf_dmf_amount' => $dmf_amount,
                    'dmf_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            } //DMF creating UMF and this DMF is directly appointed by Consultant
            else if ($this->input->post('franchiseetypeId') == 4 && $this->session->user_logged_in['parent_smf_id'] == '' && $this->session->user_logged_in['parent_consultant_id'] != '') {
                $consultant_revenueShares = $this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_consultant_id']);
                $consultant_amount = $consultant_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $consultant_revenueShares[0]['indirect_uf_amount']) / 100, 2) : round($consultant_revenueShares[0]['indirect_uf_amount'], 2);
                $dmf_amount = $dmf_revenueShares[0]['units'] == 1 ? round(($this->input->post('FranchiseLicenseFee') * $dmf_revenueShares[0]['direct_unit_amount']) / 100, 2) : round($dmf_revenueShares[0]['direct_unit_amount'], 2);
                $company_amount = round($this->input->post('FranchiseLicenseFee') - $consultant_amount - $dmf_amount, 2);
                $revenue_data = array(
                    //'kf_amount'=>$this->input->post['FranchiseKitFee'],
                    'lf_amount' => $this->input->post('FranchiseLicenseFee'),
                    'tax_amount' => $this->input->post('FranchiseTax'),
                    'user_id' => $userId,
                    'lf_consultant_amount' => $consultant_amount,
                    'consultant_id' => $this->session->user_logged_in['parent_smf_id'],
                    'lf_dmf_amount' => $dmf_amount,
                    'dmf_id' => $this->session->user_logged_in['id'],
                    'lf_company_amount' => $company_amount,
                    'created_by_id' => $this->session->user_logged_in['id']
                );
            }
        }
        $revenue_response = $this->franchisee->insertNewRecord('sea_franchise_revenue', $revenue_data);
        //End of revenue configuration shares
    }

    public function registrationAmountToBePaid()
    {
        $userId = $this->input->post('userId');
        $data['data'] = $this->franchisee->getRegistrationFeeDetails($userId);
        $this->load->view('FranchiseeManagement/registrationAmountToBePaid', $data);
		
    }
	
	public function franchiseDropDown()
	{
	  	$rid=$this->session->user_logged_in['role_id'];
		if($rid==1)
		{
			$array=array('2'=>'State Master Franchisee','3'=>'District Master Franchisee','4'=>'Unit Franchisee','5'=>'Consultant');
			print json_encode($array);
		}
		if($rid==5)
		{
			$array=array('2'=>'State Master Franchisee','3'=>'District Master Franchisee','4'=>'Unit Franchisee','5'=>'Consultant');
			print json_encode($array);
		}
		if($rid==2)
		{
			$array=array('3'=>'District Master Franchisee','4'=>'Unit Franchisee');
			print json_encode($array);
		}
		if($rid==3)
		{
			$array=array('4'=>'Unit Franchisee');
			print json_encode($array);
		}	
		
	}
}