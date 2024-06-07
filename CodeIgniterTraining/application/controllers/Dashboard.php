<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the database library
        $this->load->database();
    }

    public function index() {
        // Get student count
        $studentCountQuery = $this->db->query("SELECT COUNT(*) as count FROM student_profile");
        $data['studentCount'] = $studentCountQuery->row()->count;

        // Get application count
        $applicationCountQuery = $this->db->query("SELECT COUNT(*) as count FROM application");
        $data['applicationCount'] = $applicationCountQuery->row()->count;

        // Get rejected application count
        $rejectedCountQuery = $this->db->query("SELECT COUNT(*) as count FROM application WHERE APPLICATION_STATUS = 'REJECTED'");
        $data['rejectedCount'] = $rejectedCountQuery->row()->count;

        // Get room count
        $roomCountQuery = $this->db->query("SELECT COUNT(*) as count FROM kk_room");
        $data['roomCount'] = $roomCountQuery->row()->count;

        // Load the view and pass the data
        $this->load->view('home', $data);
    }
}
?>
