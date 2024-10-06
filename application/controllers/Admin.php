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

	public function welcome(){
		// echo $this->session->userdata('s_role');
		$this->load->view('admin/admin_view');
	}

	function get_fulldata(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$data=$this->report->get_full_records();
		$data22 = array();
		foreach ($data as $row) {
				$sub_array = array();
				$sub_array[] = $row['r_no'];
				$sub_array[] = $row['user_name'];
				$sub_array[] = $row['date'];
				$sub_array[] = $row['project_name'];
				// $sub_array[] = $row['client_name'];
				$sub_array[] = $row['billing_status'];
				$sub_array[] = $row['service_line'];
				$sub_array[] = $row['job_type'];
				$sub_array[] = $row['job_nature'];
				$sub_array[] = $row['time_taken'];
				$sub_array[] = $row['comments'];
				$sub_array[] = '<button type="button" name="update" id="'.$row['r_no'].'" class="update"></button> <button type="button" name="delete" id="'.$row['r_no'].'" class="delete"></button>';
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
	
	
/*Insert Data Start*/	
	public function push_data(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$time1 = '12:00:00 AM';
			$time2 = '08:00:00 AM';			
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
		$idata = array(
		'date' => $before_date,
		'tstamp' => $this->input->post('tstamp'),
		'user_name' => $this->input->post('a_user_name'),
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

		}
		else{
			redirect('Errors/show_404');
		}

}	
/*Insert Date End*/	
/*Get single record*/
	function fetch_single_user(){
	if ($this->input->server('REQUEST_METHOD') == 'POST'){
           $output = array();
           $data = $this->report->fetch_single_user($_POST["r_no"]);
           foreach($data as $rowdata)
           {
				$output['date'] = $rowdata->date;
				$output['a_user_name'] = $rowdata->user_name;
				$output['project_name'] = $rowdata->project_name;
				$output['client_name'] = $rowdata->client_name;
				$output['job_type'] = $rowdata->job_type;
				$output['job_nature'] = $rowdata->job_nature;
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

	
}
?>
