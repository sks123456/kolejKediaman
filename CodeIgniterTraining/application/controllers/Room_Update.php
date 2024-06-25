<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room_update extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->model('Room_Model');
        $this->load->library("session");
        $this->load->helper('url');
    }

    public function index()
    {
        // Load necessary helpers and models
        $this->load->helper('url');
        $this->load->model("Room_model");

        // Fetch room codes and IDs from the database
        $data['room_codes'] = $this->Room_model->get_room_codes_with_id();

        // Fetch unique sessions
        $data['unique_sessions'] = $this->Room_model->get_unique_sessions();

        // Get sorting parameters from URL
        $sortColumn = $this->input->get('sort') ? $this->input->get('sort') : 'ROOM_CODE';
        $sortDirection = $this->input->get('dir') ? $this->input->get('dir') : 'asc';
        // Calculate offset based on page number

        $page = (int)$this->uri->segment(3, 1); // Get the 4th segment of the URI, default to 1 if not found

        // Load the pagination library
        $this->load->library('pagination');

        // Pagination configuration
        $config['base_url'] = base_url('CodeIgniterTraining/index.php/room_update/index');
        $config['total_rows'] = $this->Room_model->count_all_rooms(); // Update this according to your model method
        $config['per_page'] = 10;
        $config['uri_segment'] = 0; // Segment containing the offset
        // Apply sorting parameters to the pagination links
        $config['reuse_query_string'] = TRUE;

        $config['use_page_numbers'] = true;
        $config['query_string_segment'] = 'page';

        // Pagination style customization
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

        // Load the pagination library and initialize with the config array
        $this->pagination->initialize($config);


        $offset = ($page - 1) * $config['per_page']; // Calculate offset based on page number

        // Retrieve records from the model with sorting parameters and pagination
        $records = $this->Room_model->get_paginated_rooms($config['per_page'], $offset, $sortColumn, $sortDirection);


        // Pass the records and pagination links to the view
        $data['records'] = $records;
        $data['pagination'] = $this->pagination->create_links();

        // Pass sorting parameters to the view
        $data['sortColumn'] = $sortColumn;
        $data['sortDirection'] = $sortDirection;

        // Load the view
        $this->load->view('room_update_index', $data);
    }
    public function search_room()
    {
        $room_code = $this->input->post('room_code');
        $this->load->model('Room_model');

        $data['records'] = $this->Room_model->search_room($room_code);
        $this->load->view('room_update_index', $data);
    }

    // Room_update Controller
    public function updateRoom() {
        $room_id = $this->input->post('room_id');
        $status_active = $this->input->post('status_active');
    
        // Check if FILLED_ROOM is not equal to 0
        $room_data = $this->Room_Model->get_room_by_id($room_id);
        if ($room_data->FILLED_ROOM!= 0 && $status_active == 0) {
            // Cannot update STATUS_ACTIVE to 0 if FILLED_ROOM is not 0
            $message = 'Cannot update room status to inactive if the room is filled.';
        } else {
            if ($this->Room_Model->update_room_status($room_id, $status_active)) {
                // Success
                $message = 'Room status updated successfully.';
            } else {
                // Error
                $message = 'Failed to update room status.';
            }
        }
    
        // Display a JavaScript prompt message
        echo '<script>alert("'.$message.'"); window.location.href="'.base_url('CodeIgniterTraining/index.php/room_update/index').'";</script>';
        exit;
    }



}
