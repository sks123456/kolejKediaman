<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->model("Session_model");

        // Fetch session data containing only session ID and session name
        $sessions = $this->Session_model->get_session_id_and_name();

        // Pass the session data to the view
        $data['sessions'] = $sessions;

        // Load the view
        $this->load->view('application_index', $data);
    }

    public function check_student_id()
    {
        // Load necessary libraries and models
        $this->load->library('form_validation');
        $this->load->model('Student_model');
        $this->load->model('Session_model');
        $this->load->model("Channel_model");
        $this->load->model("Uniform_model");

        $channels = $this->Channel_model->get_channel_id_and_name();
        $uniforms = $this->Uniform_model->get_unit_id_and_name();

        $data['channels'] = $channels;
        $data['uniforms'] = $uniforms;


        // Set validation rules
        $this->form_validation->set_rules('student_id', 'Student ID', 'required');

        // Get selected session value
        $selected_session_id = $this->input->post('session_selected');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the form with validation errors
            $data['message'] = 'Invalid Input, Please Try Again';

            $this->load->view('application_index', $data);
        } else {
            // Form validation passed, proceed to check if the student ID exists
            $student_id = $this->input->post('student_id');

            // Query the database to check if the student ID exists
            $student_exists = $this->Student_model->check_student_existence($student_id);

            if ($student_exists) {
                // Student ID exists, get student data
                $student_data = $this->Student_model->get_student($student_id)->row_array();

                // Pass student data to the view
                $data['message'] = 'Student ID exist';
                $data['student_data'] = $student_data;
                $data['sessions'] = $this->Session_model->get_session_name($selected_session_id); // Pass selected session ID to the view



                $this->load->view('application_index', $data);
            } else {
                // Student ID does not exist, load a view displaying a message
                $data['message'] = 'Student ID does not exist';
                $data['sessions'] = $this->Session_model->get_all_session(); // Load sessions again
                $this->load->view('application_index', $data);
            }
        }
    }

    public function submit_application()
    {
        $this->load->model("application_model");
        $this->load->helper('download'); // Load the download helper

        // Call the file upload method
        $upload_result = $this->handleFileUpload();

        if ($upload_result['success']) {
            // Extract necessary data from the upload result
            $file_content = $upload_result['file_content'];
            $file_name = $upload_result['file_name'];

            // Save the session along with the file content in the database
            $this->application_model->submit_application($file_content, $file_name);

            // After successful save, attempt to delete the uploaded file
            $file_path = realpath($upload_result['full_path']);
            $this->handleAfterUpload($file_path);

            redirect(base_url('CodeIgniterTraining/index.php/application'));
        } else {
            // Handle the error appropriately (e.g., show a flash message or log the error)
            $this->application_model->submit_application(null,null);
            redirect(base_url('CodeIgniterTraining/index.php/application'));

        }
    }

    private function handleFileUpload()
    {
        $config['upload_path']   = FCPATH . 'uploads/'; // use server path
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 5048; // 5 MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('pdf_document')) {
            $upload_data = $this->upload->data();

            // Check if the file is moved successfully
            $file_path = $upload_data['full_path'];
            log_message('debug', 'Uploaded file path: ' . $file_path);

            // Get the file content and convert it to base64
            $file_content = base64_encode(file_get_contents($file_path));
            $file_name = $upload_data['file_name'];

            // Log file name for verification
            log_message('debug', 'Uploaded file name: ' . $file_name);

            // Return the upload result
            return array(
                'success' => true,
                'file_content' => $file_content,
                'file_name' => $file_name,
                'full_path' => $file_path
            );
        } else {
            // Return the upload result with an error message
            return array('success' => false, 'error_message' => $this->upload->display_errors());
        }
    }

    public function handleAfterUpload($file_path)
    {
        if (file_exists($file_path)) {
            unlink($file_path);
        } else {
            // Log or handle the error if the file doesn't exist
            log_message('error', 'File not found for deletion: ' . $file_path);
        }

        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
    }
    
}
