<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Phani Kumar.
 * Date: 8/6/2016
 * Time: 9:44 PM
 */
class RevenueManagement extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('revenue_mod', 'revenue');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/franchiseeRegistration');
        $this->load->view('includes/footer');
    }

    public function saveRevenueConfig()
    {
        isset($_POST['direct_smf_share']) && $_POST['direct_smf_share'] != '' ? $direct_smf_share = $_POST['direct_smf_share'] : $direct_smf_share = null;
        isset($_POST['direct_dmf_share']) && $_POST['direct_dmf_share'] != '' ? $direct_dmf_share = $_POST['direct_dmf_share'] : $direct_dmf_share = null;
        isset($_POST['direct_umf_share']) && $_POST['direct_umf_share'] != '' ? $direct_umf_share = $_POST['direct_umf_share'] : $direct_umf_share = null;
        isset($_POST['indirect_dmf_share']) && $_POST['indirect_dmf_share'] != '' ? $indirect_dmf_share = $_POST['indirect_dmf_share'] : $indirect_dmf_share = null;
        isset($_POST['indirect_umf_share']) && $_POST['indirect_umf_share'] != '' ? $indirect_umf_share = $_POST['indirect_umf_share'] : $indirect_umf_share = null;
        isset($_POST['student_commission']) && $_POST['student_commission'] != '' ? $student_commission = $_POST['student_commission'] : $student_commission = null;
        $data = array(
            'user_id' => $_POST['UserId'],
            'direct_state_amount' => $direct_smf_share,
            'direct_district_amount' => $direct_dmf_share,
            'direct_unit_amount' => $direct_umf_share,
            'indirect_dmf_amount' => $indirect_dmf_share,
            'indirect_uf_amount' => $indirect_umf_share,
            'student_amount' => $student_commission,
            'units' => $_POST['units'],
        );
        $this->revenue->insertNewRecord('sea_franchise_revenue_config', $data);
    }

    public function companyRevenue()
    {
        $this->load->model('revenue_mod');
        $data['company'] = $this->revenue_mod->getAllRevenue();
        //print_r($data['company']);
        $data['content'] = 'Revenue/companyRevenue';
        $this->load->view('includes/template', $data);

    }

    public function consultantRevenue()
    {
        $this->load->model('revenue_mod');
        $data['consultant'] = $this->revenue_mod->getAllConsultantRevenue();
        $data['content'] = 'Revenue/consultantRevenue';
        $this->load->view('includes/template', $data);

    }

    public function stateRevenue()
    {
        $this->load->model('revenue_mod');
        $data['state'] = $this->revenue_mod->getAllStateRevenue();
        $data['content'] = 'Revenue/stateRevenue';
        $this->load->view('includes/template', $data);

    }

    public function districtRevenue()
    {
        $this->load->model('revenue_mod');
        $data['dmf'] = $this->revenue_mod->getAllStateRevenue();
        $data['content'] = 'Revenue/districtRevenue';
        $this->load->view('includes/template', $data);

    }
}