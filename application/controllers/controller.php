<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model');
	}

	public function check_logged_id() {
		if (!isset($this->session->userdata['logged_in'])) {
			echo "Not Authorized. Please Login";
			die();
		}
	}

	public function index(){
		
		$this->load->view('index');
	}

	public function base_template($content, $data){
		$this->load->view('header', $data);
		$this->load->view($content, $data);
		$this->load->view('footer', $data);
	}

	public function login() {
		$uname = $this->input->post('uname');
		$pword = $this->input->post('pass');

		$result = $this->model->authenticate_user($uname, $pword);

		if (count($result)) {
			$data["id"] = $result[0]['id'];
			$data["name"] = $result[0]['name'];
			$data["type"] = $result[0]['type'];

			$this->session->set_userdata('logged_in', "1");
			$this->session->set_userdata('user_id', $data["id"]);

			$this->load_home();
		} else {
			$data["message"] = "Invalid Credentials. Try Again";
			$this->load->view('index', $data);
		}
	}

	public function load_home() {
		$this->check_logged_id();
		$id = $this->session->userdata["user_id"];
		$data["charges"] = $this->model->get_charges();
		$data["appliances"] = $this->model->get_appliance_list();
		$data["user_appliances"] = array_values($this->model->get_user_appliances($id));
		$data["user"] = $this->model->get_user($id)[0];
		$data["total"] = $this->model->get_total_charge()[0]["total"];
		$this->base_template('home', $data);
	}

	public function load_realtime($limit = 10) {
		$this->check_logged_id();
		$id = $this->session->userdata["user_id"];
		$meter = $this->model->get_meter($id);
		$data["readings"] = $this->model->get_latest_reading($id, $limit);
		$data["current"] = $this->model->get_reading_days_today(date("d"), $meter);
		$this->base_template('realtime', $data);
	}

	public function load_daily() {
		$this->check_logged_id();
		$meter = $this->model->get_meter($this->session->userdata["user_id"]);
		$data["reading"] = $this->model->get_daily_record($meter);
		$data["total"] = $this->model->get_total_charge()[0]["total"];
		$this->base_template('daily', $data);
	}

	public function load_monthly() {
		$this->check_logged_id();
		$meter = $this->model->get_meter($this->session->userdata["user_id"]);
		$data["reading"] = $this->model->get_monthly_record($meter);
		$data["total"] = $this->model->get_total_charge()[0]["total"];
		$this->base_template('monthly', $data);
	}

	public function load_calculator() {
		$this->check_logged_id();
		$this->base_template('kwh', '');
	}

	public function load_estimation() {
		$this->check_logged_id();
		$id = $this->session->userdata["user_id"];
		$data["user"] = $this->model->get_user($id)[0];
		$this->base_template('estimation', $data);
	}

	public function get_meter($id){
		echo $this->model->get_meter($id);
	}

	public function get_latest_reading($limit = 1){
		$id = $this->session->userdata["user_id"];
		$data["readings"] = $this->model->get_latest_reading($id, $limit);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function get_percent() {
		$id = $this->session->userdata["user_id"];
		$meter = $this->model->get_meter($id);
		$from = date('Y-m-01');
		$to  = date('Y-m-d');
		$data["consumption"] = $this->model->get_reading_date($from, $to, $meter)[0]["kwh"];
		$data["price"] = $this->model->get_price($id);
		$data["rate"] = $this->model->get_total_charge()[0]["total"];
		$data["percent"] = (($data["consumption"] * $data["rate"]) / $data["price"]) * 100;
		header('Content-Type: application/json');
		echo json_encode($data);
	}


//	READINGS

	// insert by meter number
	public function insert_reading($meter, $kwh) {
		$date = date('Y-m-d H:i:s');

		$data = array(
			"user_id" => $this->model->get_user_id($meter),
			"kwh" => $kwh,
			"date" => $date
		);

		$this->model->insert_reading($data);
	}

	public function post_reading(){
		$meter = $_POST['meter'];
		$kwh = $_POST['kwh'];
		$date = date('Y-m-d H:i:s');

		$data = array(
			"user_id" => $this->model->get_user_id($meter),
			"kwh" => $kwh,
			"date" => $date
		);

		$this->model->insert_reading($data);
	}

	public function get_daily_reading($meter){
		print_r($this->model->get_daily_record($meter));
	}

	public function get_monthly_reading($meter){
		print_r($this->model->get_monthly_record($meter));
	}

	public function get_reading_date($from, $to, $price = null){
		$id = $this->session->userdata["user_id"];
		if ($price != null) {
			$this->model->update_price($id, $price);
		}

		$meter = $this->model->get_meter($id);

		$ret = $this->model->get_reading_date($from, $to, $meter);
		if (count($ret)){
			echo $ret[0]["kwh"];
		} else {
			echo "0.00";
		}
	}

	public function get_reading_days($days){
		$meter = $this->model->get_meter($this->session->userdata["user_id"]);
		$ret = $this->model->get_reading_days($days, $meter);
		if (count($ret)){
			echo $ret[0]["kwh"];
		} else {
			echo "0.00";
		}
	}

//	APPLIANCES

	public function update_appliance() {
		$checked = array_keys($_POST);
		$this->model->update_appliance($this->session->userdata["user_id"], $checked);
		redirect('/controller/load_home', 'refresh');
	}

	public function get_checked() {
		$id = $this->session->userdata["user_id"];
		$list = $this->model->get_user_appliances($id);
		header('Content-Type: application/json');
		echo json_encode($list);
	}

}
