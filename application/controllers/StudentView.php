<?PHP 
class StudentView extends CI_Controller {
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
		$this->load->view('includes/footer');
		$this->load->view('studentView');
	}

}

?>