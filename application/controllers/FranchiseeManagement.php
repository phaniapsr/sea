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
        $bday=new DateTime($_POST['date_of_birth']);
        $pday=new DateTime('today');
        $age=$bday->diff($pday)->y;
        $data=array(
            'username'=>$_POST['franchiseeName'],
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],
            'first_name'=>$_POST['first_name'],
            'last_name'=>$_POST['last_name'],
            'middle_name'=>$_POST['middle_name'],
            'date_of_birth'=>date('Y-m-d',strtotime($_POST['date_of_birth'])),
            'gender'=>$_POST['gender'],
            'age'=>$age,
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
            'fees'=>$_POST['FranchiseFee'],
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
            if($this->session->user_logged_in['role_id']==1){
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
            // else if UMF login and creating Student
            elseif($this->session->user_logged_in['role_id']==4){
                $data_hierarchy=array(
                    'user_id'=>$result,
                    'consultant_id'=>$this->session->user_logged_in['parent_consultant_id'],
                    'smf_id'=>$this->session->user_logged_in['parent_smf_id'],
                    'dmf_id'=>$this->session->user_logged_in['parent_dmf_id'],
                    'uf_id'=>$this->session->user_logged_in['id'],
                    'created_by'=>$this->session->user_logged_in['id'],
                );
            }
            $role=$this->franchisee->insertNewRecord('sea_user_hierarchy',$data);
            //End of hierarchy table data insertion

            //Inserting record into revenue configuration table
            //todo : This code has to recheck once payment gateway integration is done
            $revenueShares=$this->franchisee->getFranchiseRevenueConfigurations();
            $revenue_data=array(

            );
            //End of revenue configuration shares
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
        $data5=array(
            'user_id'=>$result,
            'counsultant_id'=>$ca,
            'smf_id'=>$cw,
            'dmf_id'=>$ci,
            'uf_id'=>$cf,
        );
        $result5=$this->franchisee->insertNewRecord('sea_user_hierarchy',$data5);
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
//class close

}