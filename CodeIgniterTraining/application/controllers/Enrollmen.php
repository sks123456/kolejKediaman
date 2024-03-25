<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enrollmen extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->model("Session_model");
        $this->load->model("Student_model"); // Load the Student_model

        // Fetch session data containing only session ID and session name
        $sessions = $this->Session_model->get_session_id_and_name();

        // Pass the session data to the view
        $data['sessions'] = $sessions;

        // Get all students
        $data['students'] = $this->Student_model->get_all_students()->result(); // Call get_all_students() method

        // Load the view
        $this->load->view('enrollmen_index', $data); // Pass both session and student data to the view
    }

    public function search_student() {
        $student_id = $this->input->post('student_id');
        $this->load->model('Student_model');
    
        // Check if student exists
        if ($this->Student_model->check_student_existence($student_id)) {
            // Student exists, proceed with search
            $data['students'] = $this->Student_model->get_student($student_id)->result();
        } else {
            // Student does not exist
            $data['error'] = "Student with ID $student_id does not exist.";
            // Set an empty array for $students to avoid the undefined variable error
            $data['students'] = array();
        }
    
        // Load the view
        $this->load->view('enrollmen_index', $data);
    }
    

}
?>
