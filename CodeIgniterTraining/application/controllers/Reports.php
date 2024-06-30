<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->model('Session_model');
        $this->load->helper(['url', 'form']);
    }

    public function overall()
    {
        $session_id = $this->input->get('session_id');
        $data['listChannel'] = $this->Report_model->getAllChannels();
        $data['listStatus'] = $this->Report_model->getAllApplicationStatus();
        $data['applications'] = $this->Report_model->getAllApplications($session_id);
        $data['sessions'] = $this->Session_model->getAllSessions();
        $this->load->view('reports/overall', $data);
    }

    public function filterOverall()
    {
        // Get filter parameters from the form
        $session_selected = $this->input->post('session_selected');
        $status = $this->input->post('status');
        $channel = $this->input->post('channel');
        $gender = $this->input->post('gender');

        // Pass the filter parameters to the model
        $data['applications'] = $this->Report_model->getFilteredApplications($session_selected, $status, $gender, $channel);
        $data['listChannel'] = $this->Report_model->getAllChannels();
        $data['sessions'] = $this->Session_model->getAllSessions();
        $data['listStatus'] = $this->Report_model->getAllApplicationStatus();


        // Pass the filter parameters back to the view
        $data['session_selected'] = $session_selected;
        $data['status'] = $status;
        $data['gender'] = $gender;
        $data['channel'] = $channel;

        // Load the view with the filtered data
        $this->load->view('reports/overall', $data);
    }

    public function filter()
    {
        // Get filter parameters from the form
        $session_selected = $this->input->post('session_selected');
        $block = $this->input->post('block');
        $channel = $this->input->post('channel');
        $gender = $this->input->post('gender');
        $room_type = $this->input->post('room_type');

        // Pass the filter parameters to the model
        $data['room_allocations'] = $this->Report_model->getFilteredRoomAllocations($session_selected, $block, $gender, $room_type, $channel);
        $data['listBlock'] = $this->Report_model->getAllRoomType();
        $data['listChannel'] = $this->Report_model->getAllChannels();
        $data['sessions'] = $this->Session_model->getAllSessions();

        // Pass the filter parameters back to the view
        $data['session_selected'] = $session_selected;
        $data['block'] = $block;
        $data['gender'] = $gender;
        $data['room_type'] = $room_type;

        // Load the view with the filtered data
        $this->load->view('reports/room_allocation', $data);
    }

    public function room_allocation()
    {
        $session_id = $this->input->get('session_id');
        $data['listBlock'] = $this->Report_model->getAllRoomType();
        $data['listChannel'] = $this->Report_model->getAllChannels();
        $data['room_allocations'] = $this->Report_model->getRoomAllocations($session_id);
        $data['sessions'] = $this->Session_model->getAllSessions();
        $this->load->view('reports/room_allocation', $data);
    }



    // public function download_excel() {
    //     $session_id = $this->input->post('session_id');
    //     $data = $this->Report_model->getRoomAllocations($session_id);

    //     // Prepare data for Excel
    //     $excel_data = [];
    //     $excel_data[] = ['Application ID', 'Student Name', 'Room Name', 'Session Name'];
    //     foreach ($data as $allocation) {
    //         $excel_data[] = [
    //             $allocation->application_id,
    //             $allocation->student_name,
    //             $allocation->room_name,
    //             $allocation->SESSION_NAME
    //         ];
    //     }

    //     // Create and download Excel file
    //     create_excel($excel_data, 'room_allocation.xlsx');
    // }


    public function applicants_without_room()
    {
        $session_id = $this->input->get('session_id');
        $data['applicants'] = $this->Report_model->getApplicantsWithoutRoom($session_id);
        $data['sessions'] = $this->Session_model->getAllSessions();
        $this->load->view('reports/applicants_without_room', $data);
    }

    public function rooms()
    {
        $session_id = $this->input->get('session_id');
        $data['rooms'] = $this->Report_model->getRooms($session_id);
        $data['sessions'] = $this->Session_model->getAllSessions();
        $this->load->view('reports/rooms', $data);
    }

    public function channel_gender_stats()
    {
        $session_id = $this->input->post('session_selected');
        $status = $this->input->post('status');
        $data['stats'] = $this->Report_model->getChannelGenderStats($session_id,$status);
        $data['sessions'] = $this->Session_model->getAllSessions();
        $data['listStatus'] = $this->Report_model->getAllApplicationStatus();

        $this->load->view('reports/channel_gender_stats', $data);
    }

    public function vacant_rooms()
    {
        $session_id = $this->input->get('session_id');
        $data['vacant_rooms'] = $this->Report_model->getVacantRooms($session_id);
        $data['sessions'] = $this->Session_model->getAllSessions();
        $this->load->view('reports/vacant_rooms', $data);
    }

    public function validation_stats()
    {
        $session_id = $this->input->get('session_id');
        $data['validation_stats'] = $this->Report_model->getValidationStats($session_id);
        $data['sessions'] = $this->Session_model->getAllSessions();
        $this->load->view('reports/validation_stats', $data);
    }
}