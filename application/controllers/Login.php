<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('login_mod');
        //$this->load->model('merchant_mod');
        $this->load->library('form_validation');
    }
	public function index()
	{
		$this->load->view('login');
	}
	public function dashboard()
	{
		//$this->load->view('vv');
		$this->load->view('includes/header');
		//$this->load->view('includes/menu');
	    $this->load->view('dashboard');
		$this->load->view('includes/footer');
	}
	
	public function hostings()
	{
	   redirect('hostings/hostings');
	}
	
	public function logincheck()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == TRUE) {
			$data = array('email' => $this->input->post('email'),
						 'password' => $this->input->post('password'));
			$result = $this->login_mod->user_login_data($data);
			if ($result == TRUE) {
                //Get Level
                if($result[0]['role_id']!=1)
                    $level = $this->login_mod->user_level_data($result[0]['id']);
                $session_data = array(
                    'id' => $result[0]['id'],
                    'email' => $result[0]['email'],
                    'first_name' => $result[0]['first_name'],
                    'role_id' => $result[0]['role_id'],
                    'level_id' =>$level[0]['level_id'],
					'parent_consultant_id'=>$result[0]['counsultant_id'],
					'parent_smf_id'=>$result[0]['smf_id'],
					'parent_dmf_id'=>$result[0]['dmf_id'],
					'parent_uf_id'=>$result[0]['uf_id'],
					'created_by_id'=>$result[0]['created_by']
				);
				//setting session
			    $this->session->set_userdata('user_logged_in', $session_data);
                if($result[0]['role_id']=='1'||$result[0]['role_id']=='3'||$result[0]['role_id']=='2')
			    redirect('FranchiseeManagement');
			    elseif($result[0]['role_id']=='4'||$result[0]['role_id']=='5')
			    redirect('StudentManagement');
			}
			else
			{
				$data = array('error_message' => 'Invalid Username or Password');
				$this->load->view('login', $data);
			}
		}
		else{
			$data = array('error_message' => 'Please provide Username or Password');
			$this->load->view('login', $data);
		}
	}
	public function logout() {
        // Removing session data
        $sess_array = array('email' => '');
        $this->session->unset_userdata('user_logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        redirect('login');
    }
//class close
}
