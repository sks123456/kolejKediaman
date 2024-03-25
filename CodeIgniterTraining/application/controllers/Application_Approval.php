<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application_Approval extends CI_Controller
{
    public function index()
    {
        // Loading the view page with the array
        $this->load->helper('url');
        $this->load->model("Session_model");
        $this->load->model("Channel_model");

        // Fetch session data containing only session ID and session name
        $sessions = $this->Session_model->get_session_id_and_name();
        $channels = $this->Channel_model->get_channel_id_and_name();
        // Converting the model data into a list
        // SQL query to join kk_application and kk_student tables
        $query = $this->db->query("
        SELECT *
        FROM application AS a
        JOIN student_profile AS s ON a.stud_matric = s.stud_matric
        JOIN kk_session AS c ON a.session_id = c.session_id
        JOIN kk_channel AS k ON a.channel_id = k.channel_id
        ");
        $records = $query->result();

        // Pass the records to the view
        $data['records'] = $records;
        // Pass the session data to the view
        $data['sessions'] = $sessions;
        $data['channels'] = $channels;


        // Load the view
        $this->load->view('application_approval_index', $data);
    }
    public function query_list()
    {
        // Retrieve form inputs
        // Loading the view page with the array
        $this->load->helper('url');
        $this->load->model("Session_model");
        $this->load->model("Channel_model");

        // Fetch session data containing only session ID and session name
        $sessions = $this->Session_model->get_session_id_and_name();
        $channels = $this->Channel_model->get_channel_id_and_name();

        $data['sessions'] = $sessions;
        $data['channels'] = $channels;

        $session_selected = $this->input->post('session_selected');
        $channel_selected = $this->input->post('channel_selected');
        $room_type = $this->input->post('room_type');
        $gender = $this->input->post('gender');
        $status = $this->input->post('status');

        // Load model
        $this->load->model('Application_model');

        // Call a method in your model to perform the query
        $data['records'] = $this->Application_model->get_records($session_selected, $channel_selected, $room_type, $gender, $status);

        // Pass the data to the view
        $this->load->view('application_approval_index', $data);
    }

    public function download($application_id)
    {
        // Load necessary libraries and models
        $this->load->helper('url');
        $this->load->model("application_model");

        // Fetch data for the selected session
        $query = $this->application_model->get_application($application_id);

        if ($query->num_rows() > 0) {
            $sessionData = $query->row();

            // Check if the required fields are set
            if (isset($sessionData->DOCUMENT_NAME, $sessionData->DOCUMENT)) {
                // Set the headers for PDF download
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $sessionData->DOCUMENT_NAME . '.pdf"');

                // Output the blob data
                echo base64_decode($sessionData->DOCUMENT); // Assuming your blob data is stored as base64 in the database
                exit;
            } else {
                // Handle the case where data is not available or blob data is not found
                http_response_code(404);
                echo "Fail tidak dijumpai";
            }
        } else {
            // Handle the case where the session with the given ID is not found
            http_response_code(404);
            echo "Sesi tidak dijumpai";
        }
    }

    public function approve($application_id)
    {
        $this->load->helper('url');
        $this->load->model("application_model");

        // Update the application status to 'Approved' in the database
        $this->application_model->updateStatus($application_id, 'APPROVED');
        // Redirect or display success message
        $this->index();
    }

    public function reject($application_id)
    {
        $this->load->helper('url');
        $this->load->model("application_model");

        // Update the application status to 'Rejected' in the database
        $this->application_model->updateStatus($application_id, 'REJECTED');
        // Redirect or display success message
        $this->index();
    }
}
