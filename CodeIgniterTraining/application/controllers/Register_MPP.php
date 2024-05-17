<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_MPP extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Studrole_model');
    }

    public function index() {
        $this->load->helper('url');
        
        $sessions = $this->Studrole_model->get_academic_session_id_and_name();
        $data['sessions'] = $sessions;
        $this->load->view('mpp_index', $data);
    }

    public function check_student_id() {
        $this->load->library('form_validation');
        $this->load->model('Student_model');
        $this->form_validation->set_rules('student_id', 'Student ID', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['message'] = 'Invalid Input, Please Try Again';
            $data['sessions'] = $this->Studrole_model->get_academic_session_id_and_name();
            $this->load->view('mpp_index', $data);
        } else {
            $student_id = $this->input->post('student_id');
            $selected_session_id = $this->input->post('session_selected');
            $student_exists = $this->Student_model->check_student_existence($student_id);

            if ($student_exists) {
                $student_data = $this->Student_model->get_student($student_id)->row_array();
                $data['message'] = 'Student ID exists';
                $data['student_data'] = $student_data;
                $data['sessions'] = $this->Studrole_model->get_academic_session_name($selected_session_id);
                $this->load->view('mpp_index', $data);
            } else {
                $data['message'] = 'Student ID does not exist';
                $data['sessions'] = $this->Studrole_model->get_academic_session_id_and_name();
                $this->load->view('mpp_index', $data);
            }
        }
    }

    public function submit_form() {
        $this->load->model('Student_model');
        $this->form_validation->set_rules('session_selected', 'Academic Session', 'required');
        $this->form_validation->set_rules('student_id', 'Student ID', 'required');
        $this->form_validation->set_rules('studrole_role', 'Role', 'required');
        $this->form_validation->set_rules('studrole_status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'SESI_AKADEMIK_ID' => $this->input->post('session_selected'),
                'STUD_MATRIC' => $this->input->post('student_id'),
                'STUDROLE_ROLE' => $this->input->post('studrole_role'),
                'STUDROLE_STATUS' => $this->input->post('studrole_status'),
            );

            $result = $this->Studrole_model->save_studrole($data);

            if ($result) {
                redirect('mpp_list'); // Redirect to the list page
            } else {
                echo "Error: Data insertion failed.";
            }
        }
    }
}
?>
