<?php
class Session_model extends CI_Model
{

    private $session_ID;
    private $session_name;
    private $session_status;
    private $application_type;
    private $startdate;
    private $end_date;

    public function set_session_id($session_ID){
        $this->session_ID = $session_ID;
    }
    public function get_session_id(){
        return $this->session_ID;
    }
    public function set_session_name($session_name){
        $this->session_name = $session_name;
    }
    public function get_session_name(){
        return $this->session_name;
    }
    public function set_session_status($session_status){
        $this->session_status = $session_status;
    }
    public function get_session_status(){
        return $this->session_status;
    }
    public function set_application_type($application_type){
        $this->application_type = $application_type;
    }
    public function get_application_type(){
        return $this->application_type;
    }
    public function set_start_date($startdate){
        $this->startdate = $startdate;
    }
    public function get_start_date(){
        return $this->startdate;
    }
    public function set_end_date($end_date){
        $this->end_date = $end_date;
    }
    public function get_end_date(){
        return $this->end_date;
    }
    public function get_all_session()
    {
        // query to get all session records
        $query = $this->db->get('session');
        return $query;
    }

    public function delete_session_id($session_ID)
    {

        //delete query prep and having pipeline to specify which to delete
        $query = $this->db
            ->where("session_ID", $session_ID)
            ->delete('session');

        //return query to execute
        return $query;
    }

    public function save_session(){

        $this->db->set("SESSION_NAME",$this->input->post("session_name"));
        $this->db->set("SESSION_STATUS",$this->input->post("status"));
        $this->db->set("APPLICATION_TYPE",$this->input->post("application_type"));
        $this->db->set("START_DATE",$this->input->post("start_date"));
        $this->db->set("END_DATE",$this->input->post("end_date"));
        
        $this->db->insert('application_session');
    }

    public function get_session($session_ID)
    {
        $query = $this->db
        ->where("session_ID",$session_ID)
        ->get('application_session');
        
        return $query;
    }
}
