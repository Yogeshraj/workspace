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
				  $this->load->library('UserInfo');
				  // $this->set_timezone();

        }

/*Time*/

public function timestamp(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			date_default_timezone_set('Asia/Kolkata');
			echo $GLOBALS['timestamp'] = date('h:i:s A');
		}
		else {
			redirect('Errors/show_404');
		}
}

public function timestamp_est(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			date_default_timezone_set('America/New_York');
			echo $timestamp_est = date('h:i:s A');
		}
		else {
			redirect('Errors/show_404');
		}
}


/*time*/




	public function index()
	{
		$ip = CI_UserInfo::get_ip();
		if($ip == '118.185.71.141' || '10.187.157.19' || '223.228.141.51'){
			// echo $ip;
		 // redirect('welcome/login');
			$this->load->view('login');
		}
		else{
			echo "You are not authorized!";
		}
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
				$this->index();
				// $this->load->view('login');
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
				's_uid' => $s_uid,
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
		// $this->get_data();
		// print_r($data);
		// exit();
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

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));




		$data=$this->report->get_records_tdy();
		$data22 = array();
		foreach ($data as $row) {
				$sub_array = array();
				$sub_array[] = $row['r_no'];
				$sub_array[] = $row['date'];
				$sub_array[] = $row['project_name'];
				$sub_array[] = $row['client_name'];
				$sub_array[] = $row['billing_status'];
				$sub_array[] = $row['service_line'];
				$sub_array[] = $row['job_type'];
				$sub_array[] = $row['job_nature'];
				$sub_array[] = $row['time_taken'];
				$sub_array[] = $row['comments'];
				$sub_array[] = '<button type="button" name="update" id="'.$row['r_no'].'" class="update"></button>  <button type="button" name="delete" id="'.$row['r_no'].'" class="delete"></button>';
//				$sub_array[] = '<button type="button" name="delete" id="'.$row['r_no'].'" class="delete"></button>';
				$data22[] = $sub_array;
		}
		$output = array(
					 "draw"                    =>     $draw,
					 "recordsTotal"          =>      $start,
					 "recordsFiltered"     =>     $length,
					"data"                    =>     $data22
		 );
				// print_r($data22);
				// exit();
				echo json_encode($output);
//			echo json_encode(array("data_table" => $output));
			}
			else{
			redirect('Errors/show_404');
			}
/**/
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

//			$timenow1 = $this->input->post('tstamp');
//			$timenow =  time();
//			 echo json_encode(time());

			$time1 = '12:00:00 AM';
			//echo json_encode(strtotime($time1));

			$time2 = '08:00:00 AM';
			//echo json_encode('<br>');
			//echo json_encode(strtotime($time2));



//			if(date("h:i:s A", time()) >= date("h:i:s A", "1514745000") && date("h:i:s A", time()) <= date("h:i:s A", "1893465000")){
				// if($timenow >= '02:00:00 AM' && $timenow <= '01:59:39 PM'){

			 if(time() >= strtotime($time1) && time() <= strtotime($time2)){
				$format = date('Y-m-d',strtotime("-1 days"));
				$before_date = $format;
//				echo json_encode($before_date);
////				 echo json_encode(date('h:i:s A',"1531074600"));
////				 echo json_encode('   ');
////				 echo json_encode(date('h:i:s A',"1531103400"));
//				 echo json_encode('<br>');
//				 echo json_encode('success');
			}

			else {
				$format = date('Y-m-d');
				$before_date = $format;
//				echo json_encode($before_date);
//				 echo json_encode(date('h:i:s A',"1514745000"));
//				 echo json_encode('   ');
//				 echo json_encode(date('h:i:s A',"1893465000"));
//				 echo json_encode('   ');
//				echo json_encode('fail');
			}
//		if($_POST["submit"] == "Submit") {
//		if (isset($_POST["submit"]) == "Submit") {

//		$value = $this->input->post('submit');
//			print_r($value);
//			var_dump($value);
//			exit();
//		if($value == "Submit"){
// $roll= $this->input->post('r_no');


		$idata = array(
		'date' => $before_date,
		'tstamp' => $this->input->post('tstamp'),
		'user_name' => $this->session->userdata('u_name'),
		'project_name' => $this->input->post('project_name'),
		'client_name' => $this->input->post('client_name'),
		'billing_status' => $this->input->post('billing_status'),
		'service_line' => $this->input->post('service_line'),
		'job_type' => $this->input->post('job_type'),
		'job_nature' => $this->input->post('job_nature'),
		'time_taken' => $this->input->post('time_taken'),
		'comments' => $this->input->post('comments'),
		'status' => 'enabled'
		);
		if (empty($this->input->post('r_no'))) {
			 echo json_encode($idata);
			$this->report->insert_data($idata);
		}
		else {
			$this->report->update_data($this->input->post('r_no'), $idata);
		}


		//echo 'Data Inserted';
		//return $idata;
		//print_r($data);
		//echo json_encode($data);

//		}
//			else{
//				return false;
//			}

		}
		else{
		redirect('Errors/show_404');
		}

}

	/*Logout*/
		public function logout()
    {
		$this->session->sess_destroy();
		$this->form_validation->set_message('logout_msg', "Logout succesfully");
		redirect('welcome/login');
    }


	/*June 21 2018*/
/*Get single record*/
	function fetch_single_user(){
	if ($this->input->server('REQUEST_METHOD') == 'POST'){
           $output = array();
           $data = $this->report->fetch_single_user($_POST["r_no"]);
           foreach($data as $rowdata)
           {
				$output['date'] = $rowdata->date;
				$output['project_name'] = $rowdata->project_name;
				$output['client_name'] = $rowdata->client_name;
				$output['billing_status'] = $rowdata->billing_status;
				$output['service_line'] = $rowdata->service_line;
				$output['time_taken'] = $rowdata->time_taken;
				$output['comments'] = $rowdata->comments;

           }
           echo json_encode($output);
      }

		else{
		redirect('Errors/show_404');
		}
}
/*Get single record*/


/*Delete*/
public function delete_single_record($r_no){
	if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$this->report->delete_by_id($r_no);
		echo json_encode(array("status" => TRUE));
}
else{
redirect('Errors/show_404');
}
}
/*Delete*/





	public function full_data(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$data=$this->report->get_records();
		$data22 = array();
		foreach ($data as $row) {
				$sub_array = array();
				$sub_array[] = $row['r_no'];
				$sub_array[] = $row['date'];
				$sub_array[] = $row['project_name'];
				$sub_array[] = $row['client_name'];
				$sub_array[] = $row['billing_status'];
				$sub_array[] = $row['service_line'];
				$sub_array[] = $row['time_taken'];
				$sub_array[] = $row['comments'];
//				$sub_array[] = '<button type="button" name="update" id="'.$row['r_no'].'" class="update"></button>';
//				$sub_array[] = '<button type="button" name="delete" id="'.$row['r_no'].'" class="delete"></button>';
				$data22[] = $sub_array;
		}
		$output = array(
					 "draw"                    =>     $draw,
					 "recordsTotal"          =>      $start,
					 "recordsFiltered"     =>     $length,
					"data"                    =>     $data22
		 );
				// print_r($data22);
				// exit();
				echo json_encode($output);
//			echo json_encode(array("data_table" => $output));
			}
			else{
			redirect('Errors/show_404');
			}

	}


/*Change Pwd*/
public function change_pwd(){
	if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$pwd_data = array(
		'u_id' => $this->input->post('u_id'),
		'pwd' => $this->input->post('pwd'),
		'pwd_new' => $this->input->post('pwd_new')
		);
		$this->report->change_pwd($pwd_data);
		echo json_encode(array("status" => TRUE));
}
else{
redirect('Errors/show_404');
}
}

/*Change Pwd*/

}
