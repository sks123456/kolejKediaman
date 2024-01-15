<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudSession extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
            
        // Pulling data into model
        $this->load->model("session_model");
    
        // Converting the model data into a list
        $list = $this->session_model->get_all_session();
    
        // Check if the current date is between start date and end date
        foreach ($list->result() as $row) {
            $currentDate = date('Y-m-d');
            if ($currentDate >= $row->START_DATE && $currentDate <= $row->END_DATE) {
                $row->SESSION_STATUS = 'Active';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Active');
            } else {
                $row->SESSION_STATUS = 'Inactive';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Inactive');
            }
        }

        // Injecting list data into an array
        $data = [
            "list" => $list,
            "update" => null
        ];

        // Loading the view page with the array
        $this->load->view('session_index', $data);
    }

    public function save()
    {
        $this->load->model("session_model");
        $this->load->helper('download'); // Load the download helper

        // File Upload Configuration
        $config['upload_path']   = FCPATH . 'uploads/'; // use server path
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 5048; // 100 MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('pdf_document')) {
            $upload_data = $this->upload->data();

            // Check file size before encoding
            if ($upload_data['file_size'] > 5048) {
                // File size exceeds 5 MB, display popup and return to index
                echo '<script>alert("File is too large. Maximum allowed size is 5 MB.");</script>';
                redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
                return;
            }

            // Get the file content and convert it to base64
            $file_content = base64_encode(file_get_contents($upload_data['full_path']));
            $file_name = $upload_data['file_name'];

            // Save the session along with the file content in the database
            $this->session_model->save_session($file_content, $file_name);

            // After successful save, attempt to delete the uploaded file
            $file_path = realpath($upload_data['full_path']);
            if (file_exists($file_path)) {
                unlink($file_path);
            } else {
                // Log or handle the error if the file doesn't exist
                log_message('error', 'File not found for deletion: ' . $file_path);
            }

            redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));

            // Redirecting is not necessary if you're triggering a download
        } else {
            $error_message = $this->upload->display_errors();
            // Handle $error_message appropriately (e.g., show a flash message or log the error)
            echo $error_message;
        }
    }


    public function delete($session_id)
    {
        //load the url using helper
        $this->load->helper('url');

        //injecting data from model to $this
        $this->load->model("session_model");

        //delete operations
        $this->session_model->delete_session_id($session_id);

        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
    }

    public function updateSession($session_id)
    {
        // Load the necessary model or perform database operations to retrieve the session details
        $this->load->model("session_model");
        $session_details = $this->session_model->get_session($session_id);
        $list = $this->session_model->get_all_session();
        // Check if the current date is between start date and end date
        foreach ($list->result() as $row) {
            $currentDate = date('Y-m-d');
            if ($currentDate >= $row->START_DATE && $currentDate <= $row->END_DATE) {
                $row->SESSION_STATUS = 'Active';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Active');
            } else {
                $row->SESSION_STATUS = 'Inactive';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Inactive');
            }
        }
        $data = [
            "session" => $session_details,
            "update" => true,
            "list" => $list
        ];
        // Load your update view with the session data
        $this->load->view('session_index', $data);
    }

    public function update()
    {
        $this->load->model("session_model");
        $this->session_model->update_session();

        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
    }

    public function download($session_id)
    {
        // Load necessary libraries and models
        $this->load->helper('url');
        $this->load->model("session_model");

        // Fetch blob data for the selected session
        $blobData = $this->session_model->get_blob_data($session_id); // Replace with your actual model method

        if ($blobData) {
            // Set the headers for PDF download
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="downloaded_file.pdf"');

            // Output the blob data
            echo base64_decode($blobData); // Assuming your blob data is stored as base64 in the database
            exit;
        } else {
            // Handle the case where blob data is not available (e.g., show an error message)
            echo "File not found";
        }
    }
}
