<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application extends CI_Controller
{
    public function index()
    {
        $this->load->model("application_model");
        $application = $this->application_model->get_application_by_studentID_session_id($student_id,$session_id);    
        $data["application"] = $application;
        $this->load->view('cetak_index', $data);
    }

}
