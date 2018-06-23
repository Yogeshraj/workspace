<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		//$this->login();
		 redirect('welcome/login');
	}
	public function login()
	{
		if ($this->session->userdata('currently_logged_in'))
				 {
//			$this->data();
					 redirect('welcome/data');
		}
			else {
				// echo "Access not granted!";
				$this->load->view('login');
			}
	}




	public function check_data(){


		$this->form_validation->set_rules('email', 'Email', 'required|callback_login_check');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				 //$this->login();
				 //$this->load->view('login');

//			$this->session->set_flashdata('message', 'Incorrect User ID or Password');

			$this->session->set_tempdata('success', 'Incorrect User ID or Password', 10);
			//redirect('tempdata');
				 //$this->session->set_tempdata('item','item-value',5);
				 redirect('welcome/login');
		}
		else
		{
//			 $sess_data = array('email' => $this->input->post('email'),
//			 'currently_logged_in' => 1);
//		 $this->session->set_userdata($sess_data);
		// print_r($sess_data);
		// $this->data();
//		redirect(welcome/data);

			if ($this->session->userdata('s_role') == 'admin'){

				redirect('/admin');
			}
			else{
				redirect('welcome/data');
//				redirect(welcome/data);
//				$this->data();

			}



		}
}

	public function login_check(){
		$data_value = array('email' => $this->input->post('email'),
		'pwd' => $this->input->post('password')
	 );
//		if($rtn_data = $this->report->check_login($data_value)==TRUE){
		if($rtn_data = $this->report->check_login($data_value)){

			 foreach($rtn_data as $val){
				 $s_uid = $val['uid'];
				 $s_u_name = $val['u_name'];
				 $s_u_emailid = $val['u_emailid'];
				 $s_role = $val['role'];
			 }

			$sess_data = array(
				'u_name' => $s_u_name,
				's_u_emailid' => $s_u_emailid,
				's_role' => $s_role,
				'currently_logged_in' => 1
			);
			$this->session->set_userdata($sess_data);
//			echo $this->session->userdata('u_name');
//			print_r($sess_data);

//			print_r($rtn_data);
//			echo $s_role;
//			exit();
			return true;
		}
		else {
			$this->form_validation->set_message('login_check', "Incorrect username/password");
			return false;
		}
}


	public function data()
	{
		//$data['tests']=$this->report->get_records();
		//print_r($data);
	//	$this->load->view('dashboard', $data);

		if ($this->session->userdata('currently_logged_in') && ($this->session->userdata('s_role') !== 'admin') )
		{
			$this->load->view('dashboard');
		}

		else if ($this->session->userdata('s_role') == 'admin') {
			redirect('/admin');
		}

		else{
			redirect('welcome/login');
		}

	}

	public function get_data(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$data=$this->report->get_records();
				echo json_encode(array("data_table" => $data));
			}
			else{
			redirect('Errors/show_404');
			}


		//	$result = array('data' => array());
		//print_r($data);
		//exit();
		// foreach ($data as $key => $value) {
		// 	$result['data'][$key] = array(
		// 		$value['r_no'],
		// 		$value['date'],
		// 		$value['project_name'],
		// 		$value['client_name'],
		// 		$value['billing_status'],
		// 		$value['time_taken'],
		// 		$value['comments']
		// 	);
		// }
			//print_r($result);
			//exit();
		// echo json_encode($result);

		// var_dump(json_encode($data));
		// var_dump( json_last_error());
	}



	public function push_data(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$idata = array(
		'date' => $this->input->post('date'),
		'user_name' => $this->session->userdata('u_name'),
		'project_name' => $this->input->post('project_name'),
		'client_name' => $this->input->post('client_name'),
		'billing_status' => $this->input->post('billing_status'),
		'service_line' => $this->input->post('service_line'),
		'time_taken' => $this->input->post('time_taken'),
		'comments' => $this->input->post('comments'),
		);
		$this->report->insert_data($idata);
		//echo 'Data Inserted';
		//return $idata;
		//print_r($data);
		//echo json_encode($data);
		}
		else{
			echo "Access Denied !" ;
		}
	}

		public function logout()
    {
		$this->session->sess_destroy();
		$this->form_validation->set_message('logout_msg', "Logout succesfully");
		redirect('welcome/login');

    }



}
