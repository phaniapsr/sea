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
            //print_r($result);exit;
			if ($result == TRUE) {
                //Get Level
                if($result[0]['role_id']!=1)
                    $level = $this->login_mod->user_level_data($result[0]['id']);
                $session_data = array(
                    'id' => $result[0]['user_id'],
                    'email' => $result[0]['email'],
                    'first_name' => $result[0]['first_name'],
                    'role_id' => $result[0]['role_id'],
                    'level_id' =>$level[0]['level_id'],
					'parent_consultant_id'=>$result[0]['consultant_id'],
					'parent_smf_id'=>$result[0]['smf_id'],
					'parent_dmf_id'=>$result[0]['dmf_id'],
					'parent_uf_id'=>$result[0]['uf_id'],
					'created_by_id'=>$result[0]['created_by']
				);
				//print_r($session_data);exit;
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
	
	public function  reset_password(){
		
		$this->load->view('reset_password');
	}
	public function  changepassword(){

			$data = array();
			$npassword =  $this->input->post('npassword');
			$cpassword =  $this->input->post('cpassword');
			if(isset($_POST['save'])){
			if($npassword == $cpassword){
				
				$user_id = $this->session->user_logged_in['id'];
				$result = $this->login_mod->change_password($user_id,$npassword);
				$data['error_message']= 'password successfully changed';
				redirect(site_url().'FranchiseeManagement');
			}else{
				$data['error_message'] = 'Please Enter correct password';
			}
			}	
	
			$this->load->view('changepassword', $data);
		
	}
//class close
	
	
	public function forgotpassword()
	{
	    $this->load->helper('url');
		$email= $this->input->post('email');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required|trim');
		 $data = array();
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$this->load->model('login_mod');
			$user = $this->login_mod->get_user_by_email($email);
			$slug = md5($user->id . $user->email . date('Ymd'));
			$this->load->library('email');
			$this->email->from('noreply@example.com', 'Example App'); // Change these details
			$this->email->to($email); 
			$this->email->subject('Reset your Password');
			$this->email->message('To reset your password please click the link below and follow the instructions:<a href="'. site_url('reset/'. $user->id ) .'">reset Your password</a>
If you did not request to reset your password then please just ignore this email and no changes will occur.
Note: This reset code will expire after '. date('j M Y') .'.');	
			@$this->email->send();
			
			$data['success'] = true;
		}
		$this->load->view('forgotpassword', $data);
	}
	
	// reset password
	public function reset()
	{
		// Redirect to your logged in landing page here
		//if(user_logged_in()) redirect('FranchiseeManagement');
		 
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data['success'] = false;
		 
	    $user_id = $this->uri->segment(3);
		/*if(!$user_id) show_error('Invalid reset code.');
		$hash = $this->uri->segment(4);
		if(!$hash) show_error('Invalid reset code.');
		*/
		$this->load->model('login_mod');
		$user = $this->login_mod->get_user($user_id);
		if(!$user) show_error('Invalid reset code.');
		$slug = md5($user->id . $user->email . date('Ymd'));
		//if($hash != $slug) show_error('Invalid reset code.');
		
	 
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');
		
		if($this->form_validation->run()){
			$result = $this->login_mod->change_password($user_id, $this->input->post('password'));
			$data['success'] = true;
		}
		
		$this->load->view('reset_password', $data);
	}
	
}