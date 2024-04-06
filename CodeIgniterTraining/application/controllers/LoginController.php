<?php
class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->library('session');

    }

    public function index()
    {
        // Display login form
        $this->load->view('login_view');
    }

    public function login()
    {
        $student_id = $this->input->post('student_id');

        // Query the database to check if the student ID exists
        $student_exists = $this->Student_model->check_student_existence($student_id);

        if ($student_exists) {
            // Student ID exists, get student data
            $student_data = $this->Student_model->get_student($student_id)->row_array();
            $data['student_data'] = $student_data;
            $this->session->set_userdata('student_data', $student_data);


            // Student exists, redirect to next page
            $this->load->view('stud_main');
        } else {
            // If student does not exist, redirect back to login page with error message
            $data['error'] = 'Invalid student ID';
            $this->load->view('login_view', $data);
        }
    }

    public function logout() {
        // Destroy session on logout
        $this->session->unset_userdata('student_data');
        // Redirect to login page
        $this->load->view('login_view');
    }
}
