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

    public function saveStudentRevenueConfig()
    {
        $this->load->model('revenue_mod');
        $id = $_POST['UserId'];
        //$id=5;
        $exrec = $this->revenue_mod->getStuConfig($id);
        if ($exrec == 0) {
            foreach ($_POST['student_revenue_type'] as $key => $val) {
                $data = array(
                    'user_id' => $_POST['UserId'],
                    'revenue_type_id' => $val,
                    'consultant_share' => isset($_POST['consultant_share'][$key]) && $_POST['consultant_share'][$key] != '' ? $_POST['consultant_share'][$key] : null,
                    'state_share' => isset($_POST['state_share'][$key]) && $_POST['state_share'][$key] != '' ? $_POST['state_share'][$key] : null,
                    'district_share' => isset($_POST['district_share'][$key]) && $_POST['district_share'][$key] != '' ? $_POST['district_share'][$key] : null,
                    'unit_share' => isset($_POST['unit_share'][$key]) && $_POST['unit_share'][$key] != '' ? $_POST['unit_share'][$key] : null,
                    'units' => $_POST['units'],
                );
                $this->revenue->insertNewRecord('sea_student_revenue_config', $data);
            }
        } else {
            foreach ($_POST['student_revenue_type'] as $key => $val) {
                $data = array(
                    'consultant_share' => isset($_POST['consultant_share'][$key]) && $_POST['consultant_share'][$key] != '' ? $_POST['consultant_share'][$key] : null,
                    'state_share' => isset($_POST['state_share'][$key]) && $_POST['state_share'][$key] != '' ? $_POST['state_share'][$key] : null,
                    'district_share' => isset($_POST['district_share'][$key]) && $_POST['district_share'][$key] != '' ? $_POST['district_share'][$key] : null,
                    'unit_share' => isset($_POST['unit_share'][$key]) && $_POST['unit_share'][$key] != '' ? $_POST['unit_share'][$key] : null,
                    'units' => $_POST['units'],
                );
                $this->revenue->updateStuRev('sea_student_revenue_config', 'user_id', 'revenue_type_id', $data, $_POST['UserId'], $val);
            }
        }
    }

    public function saveRevenueConfig()
    {
        //if($this->session->user_logged_in['role_id']==4){
        isset($_POST['direct_smf_share']) && $_POST['direct_smf_share'] != '' ? $direct_smf_share = $_POST['direct_smf_share'] : $direct_smf_share = null;
        isset($_POST['direct_dmf_share']) && $_POST['direct_dmf_share'] != '' ? $direct_dmf_share = $_POST['direct_dmf_share'] : $direct_dmf_share = null;
        isset($_POST['direct_umf_share']) && $_POST['direct_umf_share'] != '' ? $direct_umf_share = $_POST['direct_umf_share'] : $direct_umf_share = null;
        isset($_POST['indirect_dmf_share']) && $_POST['indirect_dmf_share'] != '' ? $indirect_dmf_share = $_POST['indirect_dmf_share'] : $indirect_dmf_share = null;
        isset($_POST['indirect_umf_share']) && $_POST['indirect_umf_share'] != '' ? $indirect_umf_share = $_POST['indirect_umf_share'] : $indirect_umf_share = null;
        isset($_POST['student_commission']) && $_POST['student_commission'] != '' ? $student_commission = $_POST['student_commission'] : $student_commission = null;
        //for updating the values of Revenue configuration
        $this->load->model('revenue_mod');
        $id = $_POST['UserId'];
        $exrec = $this->revenue_mod->getRevConfig($id);
        if ($exrec == 0) {
            //end of updating the values of Revenue configuration
            //phani code as it is
            $data = array(
                'user_id' => $_POST['UserId'],
                'direct_state_amount' => $direct_smf_share,
                'direct_district_amount' => $direct_dmf_share,
                'direct_unit_amount' => $direct_umf_share,
                'indirect_dmf_amount' => $indirect_dmf_share,
                'indirect_uf_amount' => $indirect_umf_share,
                //'student_amount' => $student_commission,
                'units' => $_POST['units'],
            );
            $this->revenue->insertNewRecord('sea_franchise_revenue_config', $data);
            //up to here
        } else {
            $data = array(
                'direct_state_amount' => $direct_smf_share,
                'direct_district_amount' => $direct_dmf_share,
                'direct_unit_amount' => $direct_umf_share,
                'indirect_dmf_amount' => $indirect_dmf_share,
                'indirect_uf_amount' => $indirect_umf_share,
                //'student_amount' => $student_commission,
                'units' => $_POST['units'],
            );
            $this->revenue->updateTableRecord('sea_franchise_revenue_config', 'user_id', $data, $_POST['UserId']);
        }

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

    public function getStudentRevenueTypes()
    {
        $this->load->model('revenue_mod');
        echo json_encode(array('student_revenue_type' => $this->revenue_mod->getStudentRevenueTypes()));
    }

    public function getRevenueConfigurations()
    {
        $userId = $this->input->post('userId');
        $this->load->model('revenue_mod');
        echo json_encode(array('revenue_configurations' => $this->revenue_mod->getRevenueSplit($userId)));
    }

    public function saveRevenueSplit()
    {
        $data = array(
            'kf_amount' => $this->input->post('kit_amount'),
            'lf_consultant_amount' => $this->input->post('consultant_amount'),
            'lf_company_amount' => $this->input->post('company_amount'),
            'lf_smf_amount' => $this->input->post('state_amount'),
            'lf_dmf_amount' => $this->input->post('district_amount'),
        );
        $this->load->model('revenue_mod');
        echo json_encode($this->revenue_mod->updateRowWhere('sea_franchise_revenue', array('revenue_id' => $this->input->post('revenue_config_id')), $data));
    }

    public function checkRevenueConfig()
    {
        $this->load->model('revenue_mod');
        $data = $this->revenue_mod->checkRevenueConfig($_POST['user_id']);
        echo json_encode($data);
    }

    public function unitRevenueConfig()
    {
        $this->load->model('revenue_mod');
        $data = $this->revenue_mod->unitRevenueConfig($_POST['user_id']);
        echo json_encode($data);
    }

    public function franchiseRevenueGrid()
    {
        $this->load->model('revenue_mod');
        $data['data'] = $this->revenue_mod->franchiseRevenueGrid();
        $this->load->view('includes/header');
        $this->load->view('Revenue/franchiseRevenue', $data);
        $this->load->view('includes/footer');
    }

    public function studentRevenueGrid()
    {
        $this->load->model('revenue_mod');
        $data['data'] = $this->revenue_mod->studentRevenueGrid();
        $this->load->view('includes/header');
        $this->load->view('Revenue/studentRevenue', $data);
        $this->load->view('includes/footer');
    }
}