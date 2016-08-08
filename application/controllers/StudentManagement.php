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
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],
            'first_name'=>$_POST['first_name'],
            'last_name'=>$_POST['last_name'],
            'middle_name'=>$_POST['middle_name'],
            'date_of_birth'=>$_POST['date_of_birth'],
            'gender'=>$_POST['gender'],
        );
        $result= $this->student->insertNewRecord('sea_users',$data);
    }
}