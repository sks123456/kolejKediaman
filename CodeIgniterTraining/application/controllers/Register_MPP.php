<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_MPP extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->model("Session_model");
        $this->load->model("Student_model"); // Load the Student_model

        // Fetch session data containing only session ID and session name
        $sessions = $this->Session_model->get_session_id_and_name();

        // Pass the session data to the view
        $data['sessions'] = $sessions;

        // Load the view
        $this->load->view('mpp_index', $data); // Pass both session and student data to the view
    }
}
?>
