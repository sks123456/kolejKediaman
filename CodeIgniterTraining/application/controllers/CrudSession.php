<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudSession extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('session_model');
        $this->load->library('pagination');
        $this->load->model('AcademicSess_model');
    }

    public function index()
    {
        $this->load->helper('url');

        // Define the sort_by variable
        $sort_by = '';

        // Pagination configuration
        $config['base_url'] = base_url('CodeIgniterTraining/index.php/crudsession/index');
        $config['total_rows'] = $this->session_model->count_all_sessions(); // Update this according to your model method
        $config['per_page'] = 10;
        $config['uri_segment'] = 0; // Segment containing the offset

        $this->pagination->initialize($config);

        /*
      start 
      add boostrap class and styles
    */
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        /*
      end 
      add boostrap class and styles
    */
        $this->pagination->initialize($config);

        // Pulling data into model
        $this->load->model("session_model");

        // Get current page from URI segment
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Converting the model data into a list
        $list = $this->session_model->get_all_session($config['per_page'], $page);
        $listSem =$this->AcademicSess_model->get_all_academic_sess();

        // Check if the current date is between start date and end date
        $this->checkValidity($list);

        // Injecting list data into an array
        $data = [
            "listSem" => $listSem,
            "list" => $list,
            "update" => null,
            'pagination_links' => $this->pagination->create_links(), // Pass pagination links to the view
        ];

        // Loading the view page with the array
        $this->load->view('session_index', $data);
    }


    public function save()
    {
        $this->load->model("session_model");
        $this->load->helper('download'); // Load the download helper

        // Call the file upload method
        $upload_result = $this->handleFileUpload();

        if ($upload_result['success']) {
            // Extract necessary data from the upload result
            $file_content = $upload_result['file_content'];
            $file_name = $upload_result['file_name'];
    
            // Update the session along with the new file content in the database
            $this->session_model->save_session($file_content, $file_name);
    
            // After successful update, attempt to delete the uploaded file
            $file_path = FCPATH . 'uploads/' . $file_name;
            $this->handleAfterUpload($file_path);
        } elseif (isset($upload_result['no_file']) && $upload_result['no_file']) {
            // Handle case where no file was uploaded, just update the session without file content
            $this->session_model->save_session(null, null);
            redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
    
        } else {
            // Handle the error appropriately (e.g., show a flash message or log the error)
            echo $upload_result['error_message'];
        }
    }

    public function update()
{
    $this->load->model("session_model");

    // Call the file upload method
    $upload_result = $this->handleFileUpload();

    if ($upload_result['success']) {
        // Extract necessary data from the upload result
        $file_content = $upload_result['file_content'];
        $file_name = $upload_result['file_name'];

        // Update the session along with the new file content in the database
        $this->session_model->update_session($file_content, $file_name);

        // After successful update, attempt to delete the uploaded file
        $file_path = FCPATH . 'uploads/' . $file_name;
        $this->handleAfterUpload($file_path);
    } elseif (isset($upload_result['no_file']) && $upload_result['no_file']) {
        // Handle case where no file was uploaded, just update the session without file content
        $this->session_model->update_session(null, null);
        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));

    } else {
        // Handle the error appropriately (e.g., show a flash message or log the error)
        echo $upload_result['error_message'];
    }
}

// Abstracted method for handling file upload
private function handleFileUpload()
{
    $config['upload_path']   = FCPATH . 'uploads/'; // use server path
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 5048; // 5 MB

    $this->load->library('upload', $config);

    // Check if a file is being uploaded
    if (!isset($_FILES['pdf_document']) || $_FILES['pdf_document']['error'] == UPLOAD_ERR_NO_FILE) {
        return array('success' => false, 'no_file' => true);
    }

    if ($this->upload->do_upload('pdf_document')) {
        $upload_data = $this->upload->data();

        // Check file size before encoding
        if ($upload_data['file_size'] > 5048) {
            // File size exceeds 5 MB, display popup and return to index
            return array('success' => false, 'error_message' => 'File is too large. Maximum allowed size is 5 MB.');
        }

        // Get the file content and convert it to base64
        $file_content = base64_encode(file_get_contents($upload_data['full_path']));
        $file_name = $upload_data['file_name'];

        // Return the upload result
        return array(
            'success' => true,
            'file_content' => $file_content,
            'file_name' => $file_name,
            'full_path' => $upload_data['full_path']
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
        $this->checkValidity($list);
        $data = [
            "session" => $session_details,
            "update" => true,
            "list" => $list
        ];
        // Load your update view with the session data
        $this->load->view('session_index', $data);
    }

    public function checkValidity($list)
    {
        foreach ($list->result() as $row) {
            $currentDate = date('Y-m-d');
            if ($currentDate >= $row->START_DATE && $currentDate <= $row->END_DATE) {
                $row->SESSION_STATUS = 'Active';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Active');
            } else {
                $row->SESSION_STATUS = 'Non - Active';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Non-Active');
            }
        }
    }

    public function download($session_id)
    {
        // Load necessary libraries and models
        $this->load->helper('url');
        $this->load->model("session_model");

        // Fetch data for the selected session
        $query = $this->session_model->get_session($session_id);

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
                echo "File not found";
            }
        } else {
            // Handle the case where the session with the given ID is not found
            http_response_code(404);
            echo "Session not found";
        }
    }
}
