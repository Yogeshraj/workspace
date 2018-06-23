<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                 $this->load->model('report');
				 $this->load->helper(array('form', 'url'));
				 $this->load->library('form_validation');
        }


	public function index()
	{
		// $this->load->view('login');
		$this->login();
	}
	public function login()
	{

		// $this->load->view('login');
		// $this->data();
		if ($this->session->userdata('currently_logged_in'))
				 {
			$this->welcome();
		}
			else {
				// echo "Access not granted!";
				redirect('/welcome');
			}
	}

	public function welcome()
	{
		// echo $this->session->userdata('s_role');
		$this->load->view('admin/admin_view');
	}
}
?>
