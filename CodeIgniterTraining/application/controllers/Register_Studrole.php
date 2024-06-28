<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_Studrole extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->model("AcademicSess_model");
        $this->load->model("Role_model");

        // Fetch session data containing only session ID and session name
        $sessions = $this->AcademicSess_model->get_all_academic_sess();

        $role_models = $this->Role_model->get_all_role();

        // Pass the session data to the view
        $data['sessions'] = $sessions;
        $data['roles'] = $role_models;
        // Load the view
        $this->load->view('studrole_index', $data); // Pass both session and student data to the view
    }

    // Function to handle form submission and insert data
    public function save()
    {
        $this->load->model("Role_model");

        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('session_id', 'CODE_SEM', 'required');
        $this->form_validation->set_rules('student_id', 'STUD_MATRIC', 'required');
        $this->form_validation->set_rules('studrole_role', 'ROLE', 'required');
        $this->form_validation->set_rules('studrole_status', 'STATUS', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form view with errors
            $this->load->view('studrole_form');
        } else {
            // Validation passed, prepare data for insertion
            $data = array(
                'CODE_SEM' => $this->input->post('session_id'),
                'STUD_MATRIC' => $this->input->post('student_id'),
                'ROLE' => $this->input->post('studrole_role'),
                'STATUS' => $this->input->post('studrole_status')
            );

            // Insert data into database
            if ($this->Role_model->insert_role($data)) {
                // Insert successful, redirect or load success view
                redirect(base_url('CodeIgniterTraining/index.php/register_studrole/index')); // Create this view or adjust the path
            } else {
                // Insert failed, show error
                $this->load->view('error'); // Create this view or adjust the path
            }
        }
    }
    public function check_student_id() {
        // Load necessary models
        $this->load->model('Student_model');

        // Get the student ID from the POST request
        $student_id = $this->input->post('student_id');

        // Check if the student ID exists
        $student_exists = $this->Student_model->check_student_existence($student_id);

        if ($student_exists) {
            // Student ID exists
            $student_data = $this->Student_model->get_student($student_id)->row_array();
            $response = [
                'status' => 'success',
                'message' => 'Student ID exists',
                'student_data' => $student_data
            ];
        } else {
            // Student ID does not exist
            $response = [
                'status' => 'error',
                'message' => 'Student ID does not exist'
            ];
        }

        // Return the response in JSON format
        echo json_encode($response);
    }
}
