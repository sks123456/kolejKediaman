<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room_generate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database(); // Load default database configuration (fyp_kk)
        $this->load->database('kk_db', TRUE); // Load kk_db database configuration
        $this->load->model('Session_model');
        $this->load->model('Room_model');
    }

    public function index()
    {
        // Fetch session data containing only session ID and session name
        $sessions = $this->Session_model->get_session_id_and_name();
        $data['sessions'] = $sessions;

        // Fetch room codes and IDs from the database
        $data['room_codes'] = $this->Room_model->get_room_codes_with_id();

        // Get KOD_SESI from kk_room table
        $data['kod_sesi'] = $this->Room_model->get_kod_sesi();

        // Get sorting parameters from URL
        $sortColumn = $this->input->get('sort') ? $this->input->get('sort') : 'ROOM_CODE';
        $sortDirection = $this->input->get('dir') ? $this->input->get('dir') : 'asc';

        // Calculate offset based on page number
        $page = (int)$this->uri->segment(3, 1); // Get the 4th segment of the URI, default to 1 if not found

        // Load the pagination library
        $this->load->library('pagination');

        // Pagination configuration
        $config['base_url'] = base_url('CodeIgniterTraining/index.php/room_generate/index');
        $config['total_rows'] = $this->Room_model->count_all_rooms(); // Update this according to your model method
        $config['per_page'] = 10;
        $config['use_page_numbers'] = true;
        $config['reuse_query_string'] = true;
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

        // Initialize pagination with config
        $this->pagination->initialize($config);

        // Calculate offset based on page number
        $offset = ($page - 1) * $config['per_page'];

        // Retrieve records from the model with sorting parameters and pagination
        $records = $this->Room_model->get_paginated_rooms($config['per_page'], $offset, $sortColumn, $sortDirection);

        // Pass the records and pagination links to the view
        $data['records'] = $records;
        $data['pagination'] = $this->pagination->create_links();

        // Pass sorting parameters to the view
        $data['sortColumn'] = $sortColumn;
        $data['sortDirection'] = $sortDirection;

        // Load the view
        $this->load->view('room_generate_index', $data);
    }

    public function create_room()
    {
        // Validate form input
        $this->form_validation->set_rules('session_id', 'Session ID', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, redirect back to index or show error
            redirect(base_url('CodeIgniterTraining/index.php/room_generate/index'));
        } else {
            // Form validation passed, proceed to create room

            // Get session ID from form submission
            $session_id = $this->input->post('session_id');

            // Get room data from kk_db where the session ID matches
            $this->db->db_select('kk_db'); // Switch to kk_db database
            $this->db->where('KOD_SESI', $session_id);
            $query = $this->db->get('k_room');
            $rooms = $query->result();

            // Insert the room data into fyp_kk in the kk_room table
            $this->db->db_select('fyp_kk'); // Switch back to fyp_kk database
            foreach ($rooms as $room) {
                $data = array(
                    'ROOM_CODE' => $room->ROOM_CODE,
                    'KOD_SESI' => $room->KOD_SESI,
                    'ROOM_TYPE' => $room->ROOM_TYPE,
                    'KOLEJ' => $room->KOLEJ,
                    'BLOCK' => $room->BLOCK,
                    'ROOM_LEVEL' => $room->ROOM_LEVEL,
                    'ROOM_DESC' => $room->ROOM_DESC,
                    'CAPACITY' => $room->CAPACITY,
                    'FILLED_ROOM' => $room->FILLED_ROOM,
                    'ROOM_STATUS' => $room->ROOM_STATUS,
                    'STATUS_ACTIVE' => $room->STATUS_ACTIVE,
                    'DAILY_CHARGE' => $room->DAILY_CHARGE,
                    'CHARGE_PER_SEM' => $room->CHARGE_PER_SEM,
                    'ROOM_GENDER' => $room->ROOM_GENDER
                );
                $this->db->insert('kk_room', $data); // Insert into kk_room table
            }

            // Redirect to the room generate list page
            redirect(base_url('CodeIgniterTraining/index.php/room_generate/index'));
        }
    }

    public function delete_room()
    {
        // Get session ID from form submission
        $kod_sesi = $this->input->post('kod_sesi');

        // Get all room data by session ID
        $rooms = $this->Room_model->get_rooms_by_session($kod_sesi);

        // Check if any room is filled
        $is_room_filled = false;
        foreach ($rooms as $room) {
            if ($room->FILLED_ROOM!= 0) {
                $is_room_filled = true;
                break;
            }
        }

        if (!$rooms) {
            // Room not found
            $message = 'Room not found.';
        } elseif ($is_room_filled) {
            // Cannot delete room with FILLED_ROOM not equal to 0
            $message = 'Cannot delete the filled room.';
        } else {
            // Delete the rooms
            $result = $this->Room_model->delete_room_by_session($kod_sesi);

            if ($result) {
                $message = 'Rooms deleted successfully.';
            } else {
                $message = 'Failed to delete rooms.';
            }
        }

        // Display a JavaScript prompt message
        echo '<script>alert("'.$message.'"); window.location.href="'.base_url('CodeIgniterTraining/index.php/room_generate/index').'";</script>';
        exit;

        // Always redirect after processing POST data
        redirect(base_url('CodeIgniterTraining/index.php/room_generate/index'));
    }

}
?>
