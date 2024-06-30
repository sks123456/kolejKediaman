<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_Studrole extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model("Role_model");
        $this->load->model("AcademicSess_model");
        $this->load->model("Student_model");
    }

    public function index()
    {
        // Fetch session data containing only session ID and session name
        $sessions = $this->AcademicSess_model->get_all_academic_ses();
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
            // Get student ID
            $student_id = $this->input->post('student_id');

            // Check if STUD_MATRIC starts with "S"
            if (strpos($student_id, 'S') !== 0) {
                // Not a degree student, set flashdata error message and redirect
                $this->session->set_flashdata('error', 'Only degree students can be added.');
                redirect(base_url('CodeIgniterTraining/index.php/register_studrole/index'));
            }

            // Prepare data for insertion
            $data = array(
                'CODE_SEM' => $this->input->post('session_id'),
                'STUD_MATRIC' => $student_id,
                'ROLE' => $this->input->post('studrole_role'),
                'STATUS' => $this->input->post('studrole_status')
            );

            // Check for duplicate entry
            if ($this->Role_model->checkDuplicateRole($data['CODE_SEM'], $data['STUD_MATRIC'])) {
                // Duplicate found, set flashdata error message and redirect
                $this->session->set_flashdata('error', 'This student with the selected role in the session already exists.');
                redirect(base_url('CodeIgniterTraining/index.php/register_studrole/index'));
            }

            // Insert data into database
            if ($this->Role_model->insert_role($data)) {
                // Insert successful, set success message and redirect
                $this->session->set_flashdata('success', 'Student leader saved successfully.');
                redirect(base_url('CodeIgniterTraining/index.php/register_studrole/index'));
            } else {
                // Insert failed, show error
                $this->session->set_flashdata('error', 'Failed to save student leader.');
                redirect(base_url('CodeIgniterTraining/index.php/register_studrole/index'));
            }
        }
    }


    public function check_student_id()
    {
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

    public function update()
    {
        $result = $this->Role_model->update_role();

        // Update role status in the database
        if ($result) {
            // Set success message
            $this->session->set_flashdata('success', 'Role status updated successfully.');
        } else {
            // Set error message
            $this->session->set_flashdata('error', 'Failed to update role status.');
        }

        // Redirect back to the role list page
        redirect(base_url('CodeIgniterTraining/index.php/register_studrole/index'));
    }

    public function delete($role_id)
    {
        $result = $this->Role_model->delete_role_id($role_id);

        if ($result) {
            // Set success flashdata message
            $this->session->set_flashdata('success', 'Student leader deleted successfully.');
        } else {
            // Set error flashdata message
            $this->session->set_flashdata('error', 'Failed to delete student leader.');
        }

        redirect(base_url('CodeIgniterTraining/index.php/register_studrole/index')); // Redirect to channel index page
    }
}

