<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Phani Kumar.
 * Date: 8/6/2016
 * Time: 9:44 PM
 */
class RevenueManagement extends CI_Controller {
    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('revenue_mod','revenue');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/franchiseeRegistration');
        $this->load->view('includes/footer');
    }

    public function saveSMFLicenseFee(){
        $data=array(
            'id'=>$_POST[''],
            'lf_amount'=>$_POST['LicenseFee'],
            'kf_amount'=>$_POST['KitFee'],
            'user_id'=>$_POST['UserId'],
        );
        $result= $this->revenue->insertNewRecord('sea_franchise_revenue',$data);
    }

}