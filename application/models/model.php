<?php

class Model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function authenticate_user($uname, $pword){
        $query = $this->db->select('*')
                          ->from("users")
                          ->where("username", $uname)
                          ->where("password", $pword)
                          ->get();
        return $query->result_array();
    }

    public function get_user($id) {
        $query = $this->db->select('*')
                          ->from("users")
                          ->where("id", $id)
                          ->get();
        return $query->result_array();
    }

    public function get_user_id($meter) {
        $query = $this->db->select('id')
                          ->from("users")
                          ->where("meter", $meter)
                          ->get();
        return $query->result_array()[0]['id'];
    }

    public function get_meter($id){
        $query = $this->db->select('meter')
            ->from("users")
            ->where("id", $id)
            ->get();
        return $query->result_array()[0]['meter'];
    }

    public function get_price($id){
        $query = $this->db->select('limit')
            ->from("users")
            ->where("id", $id)
            ->get();
        return $query->result_array()[0]['limit'];
    }

    public function update_price($id, $price) {
        $data["limit"] = $price;
        $this->db->where("id", $id)
                 ->update("users", $data);
    }

    public function get_kwh($id){

    }


//    APPLIANCES

    public function get_appliance_list(){
        $query = $this->db->select('*')
                          ->from("appliances")
                          ->get();
        return $query->result_array();
    }

    public function update_appliance($user_id, $list){
        $this->db->where("user_id", $user_id)
                 ->delete('user_appliances');

        foreach($list as $item) {
            $data = array(
                "user_id" => $user_id,
                "appliance_id" => $item
            );
            $this->db->insert('user_appliances', $data);
        }
    }

    public function get_user_appliances($user_id) {
        $query = $this->db->select('appliance_id')
            ->from("user_appliances")
            ->where("user_id", $user_id)
            ->get();
        $ret = $query->result_array();

        $list = [];
        foreach ($ret as $item) {
            array_push($list, $item["appliance_id"]);
        }
        return $list;
    }


//  CHARGES

    public function get_charges(){
        $query = $this->db->select('*')
            ->from("charges")
            ->get();
        return $query->result_array();
    }

    public function get_charge($id) {
        $query = $this->db->select('*')
            ->from("charges")
            ->where("id", $id)
            ->get();
        return $query->result_array();
    }

    public function update_charge($id, $amount) {
        $data = array(
            "amount" => $amount
        );
        $this->db->where('id', $id)
                 ->update('charges', $data);
    }

    public function get_total_charge(){
        $query = $this->db->select('SUM(amount) as total')
                          ->from("charges")
                          ->get();
        return $query->result_array();
    }
//   READINGS

    public function insert_reading($data){
        $this->db->insert('readings', $data);
    }

    public function get_latest_reading($id, $limit = 1) {
        $query = $this->db->select('date, kwh')
                          ->from("readings")
                          ->where("user_id", $id)
                          ->order_by("date", "desc")
                          ->limit($limit)
                          ->get();
        return $query->result_array();
    }

    public function get_reading_meter($meter) {
        $id = $this->get_user_id($meter);
        return $this->get_reading_user($id);
    }

    public function get_reading_user($user_id) {
        $query = $this->db->select('date, kwh')
                         ->from("readings")
                         ->where('user_id', $user_id)
                         ->get();
        return $query->result_array();
    }

    public function get_daily_record($meter){
        $id = $this->get_user_id($meter);
        $query = $this->db->select('DATE(date) as date, SUM(kwh) as kwh')
                         ->from("readings")
                         ->where('user_id', $id)
                         ->group_by("DAY(date), MONTH(date), YEAR(date)")
                         ->get();
        return $query->result_array();
    }

    public function get_monthly_record($meter){
        $id = $this->get_user_id($meter);
        $query = $this->db->select('DATE(date) as date, SUM(kwh) as kwh')
            ->from("readings")
            ->where('user_id', $id)
            ->group_by("MONTH(date), YEAR(date)")
            ->get();
        return $query->result_array();
    }

    public function get_reading_date($from, $to, $meter) {
        $id = $this->get_user_id($meter);
        $query = $this->db->select('DATE(date) as date, SUM(kwh) as kwh')
            ->from("readings")
            ->where('user_id', $id)
            ->where("date >=", $from)
            ->where("date <=", $to)
            ->group_by("user_id")
            ->get();
        return $query->result_array();
    }

    public function get_reading_days($days, $meter) {
        $id = $this->get_user_id($meter);
        $query = $this->db->select('DATE(date) as date, SUM(kwh) as kwh', false)
            ->from("readings")
            ->where('user_id', $id)
            ->where("DATEDIFF(NOW() - 1, date) BETWEEN " . " 1 AND " . $days)
            ->group_by("user_id")
            ->get();
        return $query->result_array();
    }

    public function get_reading_days_today($days, $meter) {
        $id = $this->get_user_id($meter);
        $query = $this->db->select('DATE(date) as date, SUM(kwh) as kwh', false)
            ->from("readings")
            ->where('user_id', $id)
            ->where('date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $days . ' DAY) AND NOW()')
            ->group_by("user_id")
            ->get();
        return $query->result_array();
    }

}

?>