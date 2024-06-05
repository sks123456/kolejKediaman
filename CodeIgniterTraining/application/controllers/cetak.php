<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model("Session_model");
        $this->load->model("Student_model");
        $this->load->model("Application_model");
        $this->load->model("Room_model");
    }

    public function index($student_id)
    {
        //$sessions = $this->Session_model->get_active_session()->row_array();
        $student_data = $this->Student_model->get_student($student_id)->row_array();
        // Fetch multiple application records for the student
        $applications = $this->db->query("
        SELECT *
        FROM application AS a
        JOIN student_profile AS s ON a.stud_matric = s.stud_matric
        JOIN kk_session AS c ON a.session_id = c.session_id
        JOIN kk_channel AS k ON a.channel_id = k.channel_id
        LEFT JOIN kk_uniform AS u ON a.UNIT_ID = u.UNIFORM_ID
        WHERE a.stud_matric = '$student_id'
    ")->result_array();
        // Pass the session data and applications array to the view
        //$data['sessions'] = $sessions;
        $data['student_data'] = $student_data;
        $data['applications'] = $applications;
        
        

        $this->load->model("application_model");
        $this->load->view('stud_print', $data);
    }

    public function stud_status($student_id)
    {

        // Fetch active session data
        $sessions = $this->Session_model->get_active_session($student_id)->row_array();

        // Fetch student data
        $student_data = $this->Student_model->get_student($student_id)->row_array();

        // Fetch multiple application records for the student
        $applications = $this->db->query("
            SELECT *
            FROM application AS a
            JOIN student_profile AS s ON a.stud_matric = s.stud_matric
            JOIN kk_session AS c ON a.session_id = c.session_id
            JOIN kk_channel AS k ON a.channel_id = k.channel_id
            LEFT JOIN kk_uniform AS u ON a.UNIT_ID = u.UNIFORM_ID
            WHERE a.stud_matric = '$student_id'
            AND c.SESSION_STATUS = 'Active'
        ")->result_array();

        // Pass the session data, student data, and applications array to the view
        $data['sessions'] = $sessions;
        $data['student_data'] = $student_data;
        $data['applications'] = $applications;

        // Load the view
        $this->load->view('stud_status', $data);
    }

    public function pengesahan($student_id)
{
    // Fetch active session data
    $sessions = $this->Session_model->get_active_session($student_id)->row_array();

    // Check if sessions data is empty
    if (empty($sessions)) {
        $data['no_sessions'] = true;
    } else {
        // Fetch student data
        $student_data = $this->Student_model->get_student($student_id)->row_array();
        $room2 = $this->Room_model->getAvailableRoom(2, $student_data['RELIGION'], $student_data['GENDER']);
        $room3 = $this->Room_model->getAvailableRoom(3, $student_data['RELIGION'], $student_data['GENDER']);
        $room4 = $this->Room_model->getAvailableRoom(4, $student_data['RELIGION'], $student_data['GENDER']);

        // Fetch multiple application records for the student
        $applications = $this->db->query("
            SELECT *
            FROM application AS a
            JOIN student_profile AS s ON a.stud_matric = s.stud_matric
            JOIN kk_session AS c ON a.session_id = c.session_id
            JOIN kk_channel AS k ON a.channel_id = k.channel_id
            LEFT JOIN kk_uniform AS u ON a.UNIT_ID = u.UNIFORM_ID
            WHERE a.stud_matric = '$student_id'
            AND c.SESSION_STATUS = 'Active'
            AND a.APPLICATION_STATUS = 'APPROVED'
        ")->result_array();

        // Pass the session data, student data, and applications array to the view
        $data['sessions'] = $sessions;
        $data['student_data'] = $student_data;
        $data['applications'] = $applications;
        $data['room2'] = $room2;
        $data['room3'] = $room3;
        $data['room4'] = $room4;
    }

    // Load the view
    $this->load->view('stud_pengesahan', $data);
}

}
