<?php
class Session_model extends CI_Model
{

    public function get_all_session()
    {
        // query to get all session records
        $query = $this->db->get('kk_session');
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

    public function save_session()
    {

        $this->db->set("SESSION_NAME", $this->input->post("session_name"));
        $this->db->set("APPLICATION_TYPE", $this->input->post("application_type"));
        $this->db->set("START_DATE", $this->input->post("start_date"));
        $this->db->set("END_DATE", $this->input->post("end_date"));

        // Check if the start date is after the current date
        $current_date = date('dd-mm-yyyy');
        $session_status = ($this->input->post("start_date") <= $current_date) ? 'Active' : 'Inactive';
        $this->db->set("SESSION_STATUS", $session_status);
        $this->db->insert('kk_session');
    }

    public function get_session($session_ID)
    {
        $query = $this->db
            ->where("session_ID", $session_ID)
            ->get('kk_session');

        return $query;
    }
}
