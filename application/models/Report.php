<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Model{


public function __construct(){
	parent::__construct();
	$this->load->model('report');
}
public function check_login($data_value){
	$name=$data_value['email'];
	$pass=$data_value['pwd'];



	$con= "u_emailid =" . "'" . $data_value['email'] ."' AND " . "u_password =" . "'" . $data_value['pwd'] . "'";
	$con2= "rr_id =" . "'" . $data_value['email'] ."' AND " . "u_password =" . "'" . $data_value['pwd'] . "'";
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where("($con OR $con2)");
	$this->db->limit(1);
	$query_check = $this->db->get();



	if ($query_check->num_rows() == 1) {
//		return true;
		return $query_check->result_array();
	} else {
		return false;
	}


}


/*admin*/
public function get_full_records(){
	$u_name="Admin";
	$username = $this->session->userdata('u_name');
	$condition = $username. "=" . "'" . $u_name . "'";

	if ($username == "Admin"){

	$this->db->select('*');
	$this->db->from('dashboard');
//	$this->db->where($condition);
	$query = $this->db->get();
	//return $query->result(); //retuns results as object
	return $query->result_array(); //returns results as array
	//print_r($query);
	//exit();
	}
	else{
		return false;
	}

}



/*admin*/




public function get_records(){

//	$con_get= "user_name = $this->session->userdata('u_name')";
	$username = $this->session->userdata('u_name');
	$condition = "user_name =" . "'" . $username . "'";
	$this->db->select('*');
	$this->db->from('dashboard');
	$this->db->where($condition);
	$query = $this->db->get();
	//return $query->result(); //retuns results as object
	return $query->result_array(); //returns results as array
	//print_r($query);
	//exit();
}

// http://sqlfiddle.com/#!18/0738b/1

/*Get records by today*/
public function get_records_tdy(){
	$status ="enabled";
	$date = new DateTime("now");
	$curr_date = $date->format('Y-m-d');
	$username = $this->session->userdata('u_name');
	$condition = "user_name =" . "'" . $username . "'";
	$condition2 = "status =" . "'" . $status . "'";


	// $condition2 ="tstamp >=" ."'"  . DATE_ADD('HOUR',8, CONVERT(VARCHAR(10), GETDATE(),110)) ."'" AND "tstamp <=" . "'" . DATE_ADD('HOUR',8, CONVERT(VARCHAR(10), GETDATE()+1,110)) . "'";
	// $condition2 ="tstamp >=" . "'" . DATE_ADD('HOUR',8, CONVERT(VARCHAR(10), GETDATE(),110)) . "'"	;
	$this->db->select('*');
	$this->db->from('dashboard');
//	$this->db->where($condition);
	$this->db->where("($condition AND $condition2)");
	$query = $this->db->get();
	return $query->result_array(); //returns results as array

}
/**/


public function insert_data($idata){
	$this->db->insert('dashboard', $idata);
}


public function fetch_single_user($r_no)
  {
	   $this->db->where("r_no", $r_no);
	   $query=$this->db->get('dashboard');
	   return $query->result();
  }
	public function update_data($r_no, $idata){
		$this->db->where('r_no', $r_no);
		$this->db->update('dashboard', $idata);
	}
	public function delete_by_id($r_no)
{
		$this->db->where('r_no', $r_no);
		$this->db->delete('dashboard');
}

public function change_pwd($pwd_data)
{
	$dat = array('u_password' => $pwd_data['pwd_new'] );
	$con= "uid =" . "'" . $pwd_data['u_id'] ."' AND " . "u_password =" . "'" . $pwd_data['pwd'] . "'";
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where($con);
	$query_check = $this->db->get();
	if ($query_check->num_rows() == 1) {
		$this->db->where('uid', $pwd_data['u_id']);
		$this->db->update('user', $dat);
		return true;
	} else {
		return false;
	}
}
}
