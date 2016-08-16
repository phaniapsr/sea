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
        //$this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/franchiseeRegistration');
        $this->load->view('includes/footer');
    }

    public function registerFranchisee(){
        $data=array(
		    'franchiseetypeId'=>$_POST['franchiseetypeId'],
            'username'=>$_POST['franchiseeName'],
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],
            'first_name'=>$_POST['first_name'],
            'last_name'=>$_POST['last_name'],
            'middle_name'=>$_POST['middle_name'],
            'date_of_birth'=>$_POST['date_of_birth'],						
            'gender'=>$_POST['gender'],
			'mobileno'=>$_POST['MobileNumber'],
			'birthplace'=>$_POST['PlaceOfBirth'],
			'franch_name'=>$_POST['franchiseeName'],
			);
        header('application/json');
        echo $result= $this->franchisee->insertNewRecord('sea_users',$data);
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