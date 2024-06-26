<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Block_update extends CI_Controller
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
        $data['room_codes'] = $this->Room_model->get_block();

        // Get sorting parameters from URL
        $sortColumn = $this->input->get('sort') ? $this->input->get('sort') : 'ROOM_CODE';
        $sortDirection = $this->input->get('dir') ? $this->input->get('dir') : 'asc';
        // Calculate offset based on page number

        $page = (int)$this->uri->segment(3, 1); // Get the 4th segment of the URI, default to 1 if not found

        // Load the pagination library
        $this->load->library('pagination');

        // Pagination configuration
        $config['base_url'] = base_url('CodeIgniterTraining/index.php/block_update/index');
        $config['total_rows'] = count($this->Room_model->get_block()); // Update this according to your model method
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
        $records = $this->Room_model->get_block();


        // Pass the records and pagination links to the view
        $data['records'] = $records;
        $data['pagination'] = $this->pagination->create_links();

        // Pass sorting parameters to the view
        $data['sortColumn'] = $sortColumn;
        $data['sortDirection'] = $sortDirection;

        // Load the view
        $this->load->view('block_update_index', $data);
    }
    public function updateBlock()
    {
        $session = $this->input->post('session');
        $kolej = $this->input->post('kolej');
        $block = $this->input->post('block');
        $status = $this->input->post('status');

        if ($this->Room_Model->update_block_status($session, $kolej, $block, $status)) {
            // Success
            $this->session->set_flashdata('success', 'Block status updated successfully.');
        } else {
            // Error
            $this->session->set_flashdata('error', 'Failed to update block status.');
        }

        redirect(base_url('CodeIgniterTraining/index.php/block_update/index'));
    }
}
