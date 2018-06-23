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
public function insert_data($idata){
	$this->db->insert('dashboard', $idata);
}
}
