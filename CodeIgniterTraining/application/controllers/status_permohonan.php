<?php
defined('BASEPATH') or exit('No direct script access allowed');

class status_permohonan extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->model("Session_model");

        $sessions = $this->Session_model->get_session_id_and_name();

        // Pass the session data to the view
        $data['sessions'] = $sessions;
        
        $this->load->model("application_model");    
        $this->load->view('stud_status', $data);
    }

}
