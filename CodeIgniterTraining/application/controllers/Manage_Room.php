<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_room extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->library("session");
        $this->load->helper('url');
    }

    public function index()
    {
        // Load necessary helpers and models
        $this->load->helper('url');
        $this->load->model("Room_model");

        // Get sorting parameters from URL
        $sortColumn = $this->input->get('sort') ? $this->input->get('sort') : 'ROOM_CODE';
        $sortDirection = $this->input->get('dir') ? $this->input->get('dir') : 'asc';
        // Calculate offset based on page number

        $page = (int)$this->uri->segment(3, 1); // Get the 4th segment of the URI, default to 1 if not found

        // Load the pagination library
        $this->load->library('pagination');

        // Pagination configuration
        $config['base_url'] = base_url('CodeIgniterTraining/index.php/manage_room/index');
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
        $this->load->view('manage_room_index', $data);
    }
    public function search_room()
    {
        $room_code = $this->input->post('room_code');
        $this->load->model('Room_model');

        $data['records'] = $this->Room_model->search_room($room_code);
        $this->load->view('manage_room_index', $data);
    }
    // public function query_list()
    // {
    //     // Retrieve form inputs
    //     $room_type = $this->input->post('room_type');
    //     $status = $this->input->post('status');
    //     $kolej = $this->input->post('kolej');
    //     $gender = $this->input->post('gender');

    //     // Load model
    //     $this->load->model('Room_model');

    //     // Call a method in your model to perform the query
    //     $records = $this->Room_model->get_records($room_type, $gender, $status, $kolej);

    //     // Get sorting parameters from URL (if any)
    //     $sortColumn = $this->input->get('sort') ? $this->input->get('sort') : 'ROOM_CODE';
    //     $sortDirection = $this->input->get('dir') ? $this->input->get('dir') : 'asc';

    //     // Load the pagination library
    //     $this->load->library('pagination');

    //     // Pagination configuration
    //     $config['base_url'] = base_url('CodeIgniterTraining/index.php/manage_room/query_list');
    //     $config['total_rows'] = count($records); // Update total_rows with filtered records count
    //     $config['per_page'] = 10;
    //     $config['uri_segment'] = 3; // Segment containing the offset
    //     $config['reuse_query_string'] = TRUE;
    //     $config['use_page_numbers'] = true;
    //     $config['query_string_segment'] = 'page';

    //     $encoded_params = array(
    //         'room_type' => rawurlencode($room_type),
    //         'status' => rawurlencode($status),
    //         'kolej' => rawurlencode($kolej),
    //         'gender' => rawurlencode($gender)
    //     );

    //     // Build the query string with '=' replaced by '%3D'
    //     $query_string = str_replace('=', '%3D', http_build_query($encoded_params));

    //     // Append the query string to the base URL
    //     $config['base_url'] = base_url('CodeIgniterTraining/index.php/manage_room/query_list') . '?' . $query_string;


    //     // Pagination style customization
    //     $config['full_tag_open'] = '<ul class="pagination">';
    //     $config['full_tag_close'] = '</ul>';
    //     $config['first_link'] = 'First';
    //     $config['last_link'] = 'Last';
    //     $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['first_tag_close'] = '</span></li>';
    //     $config['prev_link'] = '&laquo';
    //     $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['prev_tag_close'] = '</span></li>';
    //     $config['next_link'] = '&raquo';
    //     $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['next_tag_close'] = '</span></li>';
    //     $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['last_tag_close'] = '</span></li>';
    //     $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    //     $config['cur_tag_close'] = '</a></li>';
    //     $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['num_tag_close'] = '</span></li>';

    //     // Load the pagination library and initialize with the config array
    //     $this->pagination->initialize($config);

    //     // Calculate offset based on page number
    //     $page = (int)$this->uri->segment(3, 1); // Get the 4th segment of the URI, default to 1 if not found
    //     $offset = ($page - 1) * $config['per_page'];

    //     // Retrieve paginated records based on offset and per_page
    //     $paginated_records = array_slice($records, $offset, $config['per_page']);

    //     // Pass the data to the view including filter parameters
    //     $data['records'] = $paginated_records;
    //     $data['pagination'] = $this->pagination->create_links();
    //     $data['sortColumn'] = $sortColumn;
    //     $data['sortDirection'] = $sortDirection;

    //     // Load the view
    //     $this->load->view('manage_room_index', $data);
    // }
}
