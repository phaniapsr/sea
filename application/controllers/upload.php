<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $output_dir = "uploads/";
        $fn = $_FILES["hi"]["name"];
        $to = base_url() . $output_dir . $_FILES["hi"]["name"];
        //$to = "C:/xampp/htdocs/sea/uploads/". $_FILES["hi"]["name"];
        $pinfo = pathinfo($to);
        $dir = $_FILES["hi"]["name"];
        $toold = base_url() . $output_dir . $_FILES["hi"]["name"];
        if (!file_exists($to)) {
            move_uploaded_file($_FILES["hi"]["tmp_name"], $to);
            print json_encode($dir);

        } else {
            $pathinfo = pathinfo($to);
            $todays_date = date("mdYHis");
            $dir = $todays_date . '_' . $pathinfo['basename'];
            $tonew = $pathinfo['dirname'] . DIRECTORY_SEPARATOR . $todays_date . '_' . $pathinfo['basename'];
            move_uploaded_file($_FILES["hi"]["tmp_name"], $tonew);
            print json_encode($dir);
        }
    }
}