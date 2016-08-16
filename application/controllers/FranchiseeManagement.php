<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: pc32261
 * Date: 8/6/2016
 * Time: 9:44 PM
 */
class FranchiseeManagement extends CI_Controller {
    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('franchisee_mod','franchisee');
        //$this->load->model('merchant_mod');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/franchiseeRegistration');
        $this->load->view('includes/footer');
    }

    public function registerFranchisee(){
        $data=array(
		    'username'=>$_POST['franchiseeName'],
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],
            'first_name'=>$_POST['first_name'],
            'last_name'=>$_POST['last_name'],
            'middle_name'=>$_POST['middle_name'],
            'date_of_birth'=>$_POST['date_of_birth'],						
            'gender'=>$_POST['gender'],
			'landno'=>$_POST['LandlineNumber'],
			'mobileno'=>$_POST['MobileNumber'],
			'birthplace'=>$_POST['PlaceOfBirth'],
			'franch_name'=>$_POST['franchiseeName'],
			'franchiseetypeId'=>$_POST['franchiseetypeId'],
			);
       /* $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == TRUE) {*/
        $result= $this->franchisee->insertNewRecord('sea_users',$data);
		$data1=array(
		   'user_id'=>$result,
		   'college_university'=>$_POST['University'],
		   'qualification'=>$_POST['Qualicfation'],
		   'completed_in_year'=>$_POST['CompletedYear'],
		);
		$result1=$this->franchisee->insertNewRecord('sea_franchise_education_details',$data1);
        $data=array(
            'user_id'=>$result,
            'level_id'=>$_POST['franchiseetypeId']
        );
		$data2=array(
		'user_id'=>$result,
		'doorno'=>$_POST['FlatNo'],
        'streetname'=>$_POST['StreetName'],
        'area'=>$_POST['Area'],
        'city'=>$_POST['City'],
        'pincode'=>$_POST['PinCode'],
        'state'=>$_POST['State'],
        'nationality'=>$_POST['Nationality'],		
		);
		$result2=$this->franchisee->insertNewRecord('sea_franchise_resid_address',$data2);
		$data3=array(
		'user_id'=>$result,
		'course_type'=>$_POST['OfCourse'],
        'course_name'=>$_POST['CourseName'],
		'institution'=>$_POST['Instiution'],
		'course_compl_year'=>$_POST['OtherCompletedYear'],
		'occupation'=>$_POST['PresentOcupation'],
		'purpose'=>$_POST['Goal'],
		'fees'=>$_POST['FranchiseFee'],
		);
		$result3=$this->franchisee->insertNewRecord('sea_franchise_oth_train_att',$data3);
        if($result>0)
        {
            $level=$this->franchisee->insertNewRecord('sea_franchise_level',$data);
            $data=array(
                'user_id'=>$result,
                'role_id'=>$_POST['franchiseetypeId']
            );
            $role=$this->franchisee->insertNewRecord('sea_user_role',$data);
        }
        header('application/json');
        echo $result;
    }

    public function dashboard()
    {
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/dashboard');
        $this->load->view('includes/footer');   
    }

	public function smfList()
    {
		$data['data']['smf'] =$this->franchisee->listFromTable('sea_users','2');
		$this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/smfList',$data);
        $this->load->view('includes/footer');   
    }
    public function dmfList()
    {
		$data['data']['smf'] =$this->franchisee->listFromTable('sea_users','3');
		$this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/smfList',$data);
        $this->load->view('includes/footer');   
    }
	public function ufList()
    {
		$data['data']['smf'] =$this->franchisee->listFromTable('sea_users','4');
		$this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/smfList',$data);
        $this->load->view('includes/footer');   
    }
	
//class close

}