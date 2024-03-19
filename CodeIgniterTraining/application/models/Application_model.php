<?php
class Application_model extends CI_Model
{ 
    // private $application_ID;
    // private $session_ID;
    // private $channel_ID;
    // private $unit_ID;
    // private $document;
    // private $application_status;
    // private $submitted_by;
    // private $approved_by;
    // private $validate_by;
    // private $petition;
    // private $merit;
    // private $merit_kolej;
    // private $vehicle;
    // private $stud_matric;
    // private $validation_status;

    public function get_all_applications($file_content, $file_name)
    {
        //run query to get all student records from db
        $query = $this->db->get('application');
        return $query;
    }

    public function submit_application($file_content, $file_name){
        $this->db->set("SESSION_ID", $this->input->post("session_id"));
        $this->db->set("CHANNEL_ID", $this->input->post("channel_selected"));
        $this->db->set("UNIT_ID", $this->input->post("unit_uniform"));
        $this->db->set("APPLICATION_STATUS", "SUBMITTED");
        $this->db->set("SUBMITTED_BY", date('Y-m-d H:i:s')); // Set submitted_by as current datetime
        $this->db->set("STUD_MATRIC", $this->input->post("stud_matric"));
        $this->db->set("DOCUMENT", $file_content);
        $this->db->set("DOCUMENT_NAME", $file_name);
        
        $this->db->insert('application'); // Assuming 'application' is your table name
    }
    


}