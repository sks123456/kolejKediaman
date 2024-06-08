<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoomAllocation_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fetch all room allocations with related details grouped by ROOM_CODE
    public function get_all_allocations() {
        $this->db->select('*');
        $this->db->from('kk_room_allocation r');
        $this->db->join('kk_room k', 'r.ROOM_CODE = k.ROOM_CODE','left');
        $this->db->group_by('r.ROOM_CODE');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fetch details of a specific allocation
    public function get_allocation_details($ROOM_CODE) {
        $this->db->select('s.*, a.*, c.CHANNEL_NAME, a.SUBMITTED_BY');
        $this->db->from('kk_room_allocation r');
        $this->db->join('application a', 'r.APPLICATION_ID = a.APPLICATION_ID', 'left');
        $this->db->join('student_profile s', 'a.STUD_MATRIC = s.STUD_MATRIC');
        $this->db->join('kk_room k', 'r.ROOM_CODE = k.ROOM_CODE', 'left');
        $this->db->join('kk_channel c', 'a.CHANNEL_ID = c.CHANNEL_ID', 'left');
        $this->db->where('r.ROOM_CODE', $ROOM_CODE);
        $query = $this->db->get();
        return $query->result_array();
    }
}
