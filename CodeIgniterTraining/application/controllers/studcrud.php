<?php
defined('BASEPATH') or exit('No direct script access allowed');

class studcrud extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('stud_main');
    }

    public function rules()
    {
        // Load necessary libraries and models
        // Retrieve user data from session
        $student_data = $this->session->userdata('student_data');
        $this->load->helper('url');
        $this->load->model("session_model");

        // Get the active session data
        $query = $this->session_model->get_active_session($student_data['STUD_MATRIC']);

        // Check if the query returned any rows
        if ($query->num_rows() > 0) {
            // Assuming the columns are named file_name and file_content
            $row = $query->row();

            // Retrieve BLOB data and other details from the database
            $base64BlobData = $row->DOCUMENT; // Replace 'DOCUMENT' with your actual BLOB column name
            $fileName = $row->DOCUMENT_NAME;

            // Decode base64-encoded BLOB data
            $blobData = base64_decode($base64BlobData);

            // Check if decoded BLOB data is not empty
            if (!empty($blobData)) {
                // Set headers for PDF content
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . $fileName . '"');
                header('Content-Length: ' . strlen($blobData));

                // Output the decoded BLOB data as a PDF
                echo $blobData;
            } else {
                echo "There are no current active Session to register";
            }
        } else {
            echo "No active session found.";
        }
    }

    public function viewPeraturan()
    {
        // Get the student data from session
        $student_data = $this->session->userdata('student_data');
    
        // Load necessary helpers and models
        $this->load->helper('url');
        $this->load->model("session_model");
    
        // Check if student data exists in the session
        if (!isset($student_data['STUD_MATRIC'])) {
            // Handle the case where student data is not available (redirect or show an error)
            show_error('Student data not found in session.');
        }
    
        // Get the active session data for the student
        $query = $this->session_model->get_active_session($student_data['STUD_MATRIC'])->row_array();
    
       
        // Pass the query data to the view
        $data['active_session'] = $query;
    
        // Load the view and pass the data
        $this->load->view('stud_peraturan', $data);
    }
    

    // Example usage in a CodeIgniter controller method
    public function generatePdf()
    {
        // Load FPDF library
        require_once APPPATH . 'third_party/fpdf/fpdf.php';

        // Create an instance of FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Hello, World!');

        // Output the PDF
        $pdf->Output();
    }
}
