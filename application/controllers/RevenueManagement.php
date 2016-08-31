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
            'lf_amount'=>$_POST['LicenseFee'],
            'kf_amount'=>$_POST['KitFee'],
            'user_id'=>$_POST['UserId'],
        );
        $this->revenue->insertNewRecord('sea_franchise_revenue',$data);
        $data=array(
            'district_amount'=>$_POST['district_amount'],
            'unit_amount'=>$_POST['unit_amount'],
            'units'=>$_POST['units'],
            'user_id'=>$_POST['UserId'],
        );
        $this->revenue->insertNewRecord('sea_franchise_revenue_config',$data);
    }

}