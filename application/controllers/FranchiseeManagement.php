<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Phani Kumar.
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
        $this->db->trans_begin();
        $data=array(
            'username'=>$_POST['franchiseeName'],
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],
            'first_name'=>$_POST['first_name'],
            'last_name'=>$_POST['last_name'],
            'middle_name'=>$_POST['middle_name'],
            'date_of_birth'=>date('Y-m-d',strtotime($_POST['date_of_birth'])),
            'gender'=>$_POST['gender'],
            'landno'=>$_POST['LandlineNumber'],
            'mobileno'=>$_POST['MobileNumber'],
            'birthplace'=>$_POST['PlaceOfBirth'],
            'franch_name'=>$_POST['franchiseeName'],
            'franchiseetypeId'=>$_POST['franchiseetypeId'],
            'image_path'=>trim($_POST['img'],'"'),
        );

        $result= $this->franchisee->insertNewRecord('sea_users',$data);
        $data1=array(
            'user_id'=>$result,
            'college_university'=>$_POST['University'],
            'qualification'=>$_POST['Qualification'],
            'completed_in_year'=>$_POST['CompletedYear'],
        );
        $result1=$this->franchisee->insertNewRecord('sea_franchise_education_details',$data1);
        $data=array(
            'user_id'=>$result,
            'level_id'=>$_POST['franchiseetypeId'],
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
            'r_doorno'=>$_POST['RflatNo'],
            'r_streetname'=>$_POST['RstreetName'],
            'r_area'=>$_POST['Rarea'],
            'r_city'=>$_POST['Rcity'],
            'r_pincode'=>$_POST['RpinCode'],
            'r_state'=>$_POST['Rstate'],
            'r_nationality'=>$_POST['Rnationality'],
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
            'fees'=>$_POST['FranchiseLicenseFee'],
        );
        $result3=$this->franchisee->insertNewRecord('sea_franchise_oth_train_att',$data3);
        if($result>0)
        {
            $level=$this->franchisee->insertNewRecord('sea_franchise_level',$data);
            $data=array(
                'user_id'=>$result,
                'role_id'=>$_POST['franchiseetypeId'],
            );
            $role=$this->franchisee->insertNewRecord('sea_user_role',$data);

            //Logic for inserting record in hierarchy table
            //If admin/consultant login and creating SMF/DMF/UF
            if($this->session->user_logged_in['role_id']==1||$this->session->user_logged_in['role_id']==5){
                $data_hierarchy=array(
                    'user_id'=>$result,
                    'created_by'=>$this->session->user_logged_in['id'],
                );
            }
            // else if SMF login and creating DMF/UMF
            elseif($this->session->user_logged_in['role_id']==2){
                $data_hierarchy=array(
                    'user_id'=>$result,
                    'consultant_id'=>$this->session->user_logged_in['parent_consultant_id'],
                    'smf_id'=>$this->session->user_logged_in['id'],
                    'created_by'=>$this->session->user_logged_in['id'],
                );
            }
            // else if DMF login and creating UMF
            elseif($this->session->user_logged_in['role_id']==3){
                $data_hierarchy=array(
                    'user_id'=>$result,
                    'consultant_id'=>$this->session->user_logged_in['parent_consultant_id'],
                    'smf_id'=>$this->session->user_logged_in['parent_smf_id'],
                    'dmf_id'=>$this->session->user_logged_in['id'],
                    'created_by'=>$this->session->user_logged_in['id'],
                );
            }
            $hierarchy=$this->franchisee->insertNewRecord('sea_user_hierarchy',$data_hierarchy);
            //End of hierarchy table data insertion
            $this->franchiseeRevenueDistribution($result);
            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
            else
            {
                $this->db->trans_commit();
            }
        }
        if(isset($_POST['ACMAS']))
            $ca=1;
        else
            $ca=0;
        if(isset($_POST['WRITEASY']))
            $cw=1;
        else
            $cw=0;
        if(isset($_POST['IAA']))
            $ci=1;
        else
            $ci=0;
        if(isset($_POST['FUNMATHS']))
            $cf=1;
        else
            $cf=0;
        $data4=array(
            'user_id'=>$result,
            'course_acmas'=>$ca,
            'course_writeasy'=>$cw,
            'course_iaa'=>$ci,
            'course_funmaths'=>$cf,
        );
        $result4=$this->franchisee->insertNewRecord('sea_franchise_courses',$data4);
        //header('application/json');
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
        $data['data']['smf'] =$this->franchisee->listFromTable('2');
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/smfList',$data);
        $this->load->view('includes/footer');
    }

    public function dmfList()
    {
        $data['data']['smf'] =$this->franchisee->listFromTable('3');
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/dmfList',$data);
        $this->load->view('includes/footer');
    }
    public function ufList()
    {
        $data['data']['smf'] =$this->franchisee->listFromTable('4');
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/umfList',$data);
        $this->load->view('includes/footer');
    }
    public function consultantsList()
    {
        $data['data']['smf'] =$this->franchisee->listFromTable('5');
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/consultantsList',$data);
        $this->load->view('includes/footer');
    }
    public function detailsmfList($id)
    {
        $data['data']['smf']=$this->franchisee->franchiseDetailView($id);
        $this->load->view('includes/header');
        $this->load->view('FranchiseeManagement/detailsmfList',$data);
        $this->load->view('includes/footer');
    }
//code on 270916 statrs here
   public function detaildmfList($id)
   {
	   $data['data']['smf']=$this->franchisee->franchiseDetailView($id);
	   $this->load->view('includes/header');
	   $this->load->view('FranchiseeManagement/detaildmfList',$data);
       $this->load->view('includes/footer');

   }
   
    public function detailufList($id)
   {
	   $data['data']['smf']=$this->franchisee->franchiseDetailView($id);
	   $this->load->view('includes/header');
	   $this->load->view('FranchiseeManagement/detailufList',$data);
       $this->load->view('includes/footer');

   }
    public function detailConsulView($id)
   {
	   $data['data']['smf']=$this->franchisee->franchiseDetailView($id);
	   $this->load->view('includes/header');
	   $this->load->view('FranchiseeManagement/detailConsulView',$data);
       $this->load->view('includes/footer');

   }
//code on 270916 ends here

    public function checkEmail(){
        echo $this->franchisee->checkmail($_POST['email'])==0?0:1;
    }

    public function franchiseeRevenueDistribution($userId){
        //Inserting record into revenue configuration table
        //todo : This code has to recheck once payment gateway integration is done
        //if admin creating smf/consultant/dmf/uf

        if($this->session->user_logged_in['role_id']==1){
            $revenue_data=array(
                //'kf_amount'=>$_POST['FranchiseKitFee'],
                'lf_amount'=>$_POST['FranchiseLicenseFee'],
                'lf_company_amount'=>$_POST['FranchiseLicenseFee'],
                'tax_amount'=>$_POST['FranchiseTax'],
                'user_id'=>$userId,
                'created_by_id'=>$this->session->user_logged_in['id']
            );
        }

        // else if Consultant login and creating SMF/DMF/UMF
        elseif($this->session->user_logged_in['role_id']==5){
            $revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['id']);
            //Consultant directly creating SMF
            if($_POST['franchiseetypeId']==2){
                //if share in percentage
                if($revenueShares[0]['units']==1){
                    $consultant_amount=round(($_POST['FranchiseLicenseFee']*$revenueShares[0]['direct_state_amount'])/100,2);
                    $company_amount=round($_POST['FranchiseLicenseFee']-$consultant_amount,2);
                }
                //else if share in amount
                else{
                    $consultant_amount=$revenueShares[0]['direct_state_amount'];
                    $company_amount=round($_POST['FranchiseLicenseFee']-$consultant_amount,2);
                }
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_consultant_amount'=>$consultant_amount,
                    'consultant_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
            //Consultant directly creating DMF
            elseif($_POST['franchiseetypeId']==3){
                //if share in percentage
                if($revenueShares[0]['units']==1){
                    $consultant_amount=round(($_POST['FranchiseLicenseFee']*$revenueShares[0]['direct_district_amount'])/100,2);
                    $company_amount=round($_POST['FranchiseLicenseFee']-$consultant_amount,2);
                }
                //else if share in amount
                else{
                    $consultant_amount=$revenueShares[0]['direct_district_amount'];
                    $company_amount=round($_POST['FranchiseLicenseFee']-$consultant_amount,2);
                }
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_consultant_amount'=>$consultant_amount,
                    'consultant_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
            //Consultant directly creating UMF
            elseif($_POST['franchiseetypeId']==4){
                //if share in percentage
                if($revenueShares[0]['units']==1){
                    $consultant_amount=round(($_POST['FranchiseLicenseFee']*$revenueShares[0]['direct_unit_amount'])/100,2);
                    $company_amount=round($_POST['FranchiseLicenseFee']-$consultant_amount,2);
                }
                //else if share in amount
                else{
                    $consultant_amount=$revenueShares[0]['direct_unit_amount'];
                    $company_amount=round($_POST['FranchiseLicenseFee']-$consultant_amount,2);
                }
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_consultant_amount'=>$consultant_amount,
                    'consultant_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
        }

        // else if SMF login and creating DMF/UMF
        elseif($this->session->user_logged_in['role_id']==2){
            $smf_revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['id']);
            //SMF creating DMF and this SMF is directly appointed by Admin
            if($_POST['franchiseetypeId']==3&&$this->session->user_logged_in['parent_consultant_id']==''){
                $smf_amount=$smf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$smf_revenueShares[0]['direct_district_amount'])/100,2):round($smf_revenueShares[0]['direct_district_amount'],2);
                $company_amount=$smf_revenueShares[0]['units']==1?round($_POST['FranchiseLicenseFee']-$smf_amount,2):round($_POST['FranchiseLicenseFee']-$smf_amount,2);
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_smf_amount'=>$smf_amount,
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
            //SMF creating DMF and this SMF is directly appointed by Consultant
            elseif($_POST['franchiseetypeId']==3&&$this->session->user_logged_in['parent_consultant_id']!=''){
                $consultant_revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_consultant_id']);
                $smf_amount=$smf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$smf_revenueShares[0]['direct_district_amount'])/100,2):round($smf_revenueShares[0]['direct_district_amount'],2);
                $consultant_amount=$consultant_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$consultant_revenueShares[0]['indirect_dmf_amount'])/100,2):$consultant_revenueShares[0]['direct_district_amount'];
                $company_amount=round(($_POST['FranchiseLicenseFee']-$smf_amount-$consultant_amount),2);
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_smf_amount'=>$smf_amount,
                    'smf_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'lf_consultant_amount'=>$consultant_amount,
                    'consultant_id'=>$this->session->user_logged_in['parent_consultant_id'],
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
            //SMF creating UMF directly and this SMF is directly appointed by Admin
            elseif($_POST['franchiseetypeId']==4&&$this->session->user_logged_in['parent_consultant_id']==''){
                $smf_amount=$smf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$smf_revenueShares[0]['direct_unit_amount'])/100,2):$smf_revenueShares[0]['direct_unit_amount'];
                $company_amount=round($_POST['FranchiseLicenseFee']-$smf_amount,2);
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_smf_amount'=>$smf_amount,
                    'smf_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
            //SMF creating UMF directly and this SMF is directly appointed by Consultant
            elseif($_POST['franchiseetypeId']==4&&$this->session->user_logged_in['parent_consultant_id']!=''){
                $consultant_revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_consultant_id']);
                $smf_amount=$smf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$smf_revenueShares[0]['direct_unit_amount'])/100,2):round($smf_revenueShares[0]['direct_unit_amount'],2);
                $consultant_amount=$consultant_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$consultant_revenueShares[0]['indirect_uf_amount'])/100,2):$consultant_revenueShares[0]['indirect_uf_amount'];
                $company_amount=round(($_POST['FranchiseLicenseFee']-$smf_amount-$consultant_amount),2);
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_smf_amount'=>$smf_amount,
                    'smf_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'lf_consultant_amount'=>$consultant_amount,
                    'consultant_id'=>$this->session->user_logged_in['parent_consultant_id'],
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
        }

        //elseif DMF login and creating UMF
        elseif($this->session->user_logged_in['role_id']==3){
            //DMF creating UMF and this DMF is directly appointed by Admin
            $dmf_revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['id']);
            if($_POST['franchiseetypeId']==4&&$this->session->user_logged_in['parent_smf_id']==''&&$this->session->user_logged_in['parent_consultant_id']==''){
                $dmf_amount=$dmf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$dmf_revenueShares[0]['direct_unit_amount'])/100,2):round($dmf_revenueShares[0]['direct_unit_amount'],2);
                $company_amount=round($_POST['FranchiseLicenseFee']-$dmf_amount,2);
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_dmf_amount'=>$dmf_amount,
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
            //DMF creating UMF and this DMF is directly appointed by State and this State is created by Admin
            else if($_POST['franchiseetypeId']==4&&$this->session->user_logged_in['parent_smf_id']!=''&&$this->session->user_logged_in['parent_consultant_id']==''){
                $smf_revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_smf']);
                $smf_amount=$smf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$smf_revenueShares[0]['direct_unit_amount'])/100,2):round($smf_revenueShares[0]['indirect_uf_amount'],2);
                $dmf_amount=$dmf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$dmf_revenueShares[0]['direct_unit_amount'])/100,2):round($dmf_revenueShares[0]['direct_unit_amount'],2);
                $company_amount=round($_POST['FranchiseLicenseFee']-$smf_amount-$dmf_amount,2);
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_smf_amount'=>$smf_amount,
                    'smf_id'=>$this->session->user_logged_in['parent_smf_id'],
                    'lf_dmf_amount'=>$dmf_amount,
                    'dmf_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
            //DMF creating UMF and this DMF is directly appointed by State and this State is created by Consultant
            else if($_POST['franchiseetypeId']==4&&$this->session->user_logged_in['parent_smf_id']!=''&&$this->session->user_logged_in['parent_consultant_id']!=''){
                $smf_revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_smf_id']);
                $consultant_revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_consultant_id']);
                $consultant_amount=$consultant_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$consultant_revenueShares[0]['indirect_uf_amount'])/100,2):round($consultant_revenueShares[0]['indirect_uf_amount'],2);
                $smf_amount=$smf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$smf_revenueShares[0]['indirect_uf_amount'])/100,2):round($smf_revenueShares[0]['indirect_uf_amount'],2);
                $dmf_amount=$dmf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$dmf_revenueShares[0]['direct_unit_amount'])/100,2):round($dmf_revenueShares[0]['direct_unit_amount'],2);
                $company_amount=round($_POST['FranchiseLicenseFee']-$smf_amount-$dmf_amount-$consultant_amount,2);
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_consultant_amount'=>$consultant_amount,
                    'consultant_id'=>$this->session->user_logged_in['parent_smf_id'],
                    'lf_smf_amount'=>$smf_amount,
                    'smf_id'=>$this->session->user_logged_in['parent_smf_id'],
                    'lf_dmf_amount'=>$dmf_amount,
                    'dmf_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
            //DMF creating UMF and this DMF is directly appointed by Consultant
            else if($_POST['franchiseetypeId']==4&&$this->session->user_logged_in['parent_smf_id']==''&&$this->session->user_logged_in['parent_consultant_id']!=''){
                $consultant_revenueShares=$this->franchisee->getFranchiseRevenueConfigurations($this->session->user_logged_in['parent_consultant_id']);
                $consultant_amount=$consultant_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$consultant_revenueShares[0]['indirect_uf_amount'])/100,2):round($consultant_revenueShares[0]['indirect_uf_amount'],2);
                $dmf_amount=$dmf_revenueShares[0]['units']==1?round(($_POST['FranchiseLicenseFee']*$dmf_revenueShares[0]['direct_unit_amount'])/100,2):round($dmf_revenueShares[0]['direct_unit_amount'],2);
                $company_amount=round($_POST['FranchiseLicenseFee']-$consultant_amount-$dmf_amount,2);
                $revenue_data=array(
                    //'kf_amount'=>$_POST['FranchiseKitFee'],
                    'lf_amount'=>$_POST['FranchiseLicenseFee'],
                    'tax_amount'=>$_POST['FranchiseTax'],
                    'user_id'=>$userId,
                    'lf_consultant_amount'=>$consultant_amount,
                    'consultant_id'=>$this->session->user_logged_in['parent_smf_id'],
                    'lf_dmf_amount'=>$dmf_amount,
                    'dmf_id'=>$this->session->user_logged_in['id'],
                    'lf_company_amount'=>$company_amount,
                    'created_by_id'=>$this->session->user_logged_in['id']
                );
            }
        }
        $revenue_response=$this->franchisee->insertNewRecord('sea_franchise_revenue',$revenue_data);
        //End of revenue configuration shares
    }

    public function registrationAmountToBePaid(){
        $userId=$_POST['userId'];
        $data =$this->franchisee->getRegistrationFeeDetails($userId);
        $this->load->view('FranchiseeManagement/registrationAmountToBePaid',$data);
    }
}