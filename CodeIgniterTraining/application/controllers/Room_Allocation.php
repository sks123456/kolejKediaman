<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class room_allocation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RoomAllocation_model');
    }

    // Fetch all room allocations and display
    public function index() {
        $data['allocations'] = $this->RoomAllocation_model->get_all_allocations();
        $this->load->view('room_allocation_index', $data);
    }

    // Fetch details of a specific allocation
    public function details($roomCode) {
        $data['allocations'] = $this->RoomAllocation_model->get_allocation_details($roomCode);
        echo json_encode($data);
    }
}
