<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

    }
    public function index($student_id)
    {
        $this->load->helper('url');
        $this->load->model("Session_model");
        $this->load->model("Student_model");
        $this->load->model("Application_model");

        $sessions = $this->Session_model->get_active_session()->row_array();
        $student_data = $this->Student_model->get_student($student_id)->row_array();
        $application = $this->db->query("
    SELECT *
    FROM application AS a
    JOIN student_profile AS s ON a.stud_matric = s.stud_matric
    JOIN kk_session AS c ON a.session_id = c.session_id
    JOIN kk_channel AS k ON a.channel_id = k.channel_id
    WHERE a.stud_matric = '$student_id' AND a.session_id = '$sessions[SESSION_ID]'
")->row_array();


        // Pass the session data to the view
        $data['sessions'] = $sessions;
        // $data['student_data'] = $student_data;
        $data['application'] = $application;

        $this->load->model("application_model");
        $this->load->view('stud_print', $data);
    }
}
