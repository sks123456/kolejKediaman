<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the database library
        $this->load->database();
        $this->load->model("Session_model");
        $this->load->model("Application_model");
    }


    public function index()
    {
        //get application for bar chart
        $data['applications'] = $this->Application_model->getApplicationsByChannelAndStatus();

        // Get student count
        $studentCountQuery = $this->db->query("SELECT COUNT(*) as count FROM student_profile");
        $data['studentCount'] = $studentCountQuery->row()->count;

        // Get application count
        $applicationCountQuery = $this->db->query("
        SELECT COUNT(*) as count 
        FROM application 
        JOIN kk_session ON application.SESSION_ID = kk_session.SESSION_ID 
        WHERE kk_session.SESSION_STATUS = 'Active'
    ");
        $data['applicationCount'] = $applicationCountQuery->row()->count;

        // Get rejected application count
        $rejectedCountQuery = $this->db->query("
        SELECT COUNT(*) as count 
        FROM application 
        JOIN kk_session ON application.SESSION_ID = kk_session.SESSION_ID 
        WHERE kk_session.SESSION_STATUS = 'Active'
        AND application.APPLICATION_STATUS = 'Rejected';

        ");
        $data['rejectedCount'] = $rejectedCountQuery->row()->count;

        // Get room count
        $roomCountQuery = $this->db->query("SELECT COUNT(*) as count FROM kk_room JOIN kk_session ON kk_room.KOD_SESI = kk_session.ACADEMIC_ID 
");
        $data['roomCount'] = $roomCountQuery->row()->count;

        // Get pie chart data based on selected semester (e.g., 2022, 2023, etc.)
        $sessions = $this->Session_model->get_active_session(null);
        if ($sessions->num_rows() > 0) {
            $sessionData = $sessions->row();
            $data['sessions'] = $sessionData; // Assign fetched session data to $data['sessions']
        }
        $data['semester'] = $sessions;
        $data['pieChartData'] = $this->getPieChartData();

        if ($this->getMaleCount() >= $this->getFemaleCount()) {

            $data['highest_gender'] = round(($this->getMaleCount() / $data['applicationCount']) * 100, 2);
            $data['highest_gender2'] = "Male";
        } else {
            $data['highest_gender'] = round(($this->getFemaleCount() / $data['applicationCount']) * 100, 2);
            $data['highest_gender2'] = "Female";
        }
        // Load the view and pass the data
        $this->load->view('home', $data);
    }
    
    public function getPieChartData()
    {
        // Query to get male count
        $totalMale = $this->getMaleCount();

        // Query to get female count
        $totalFemale = $this->getFemaleCount();

        // Data for the pie chart
        $pieChartData = [
            'labels' => ['Male', 'Female'],
            'datasets' => [
                [
                    'data' => [$totalMale, $totalFemale],
                    'backgroundColor' => ['#36A2EB', '#FF6384']
                ]
            ]
        ];

        return $pieChartData;
    }

    private function getMaleCount()
    {
        $this->db->select('COUNT(*) as totalMale');
        $this->db->from('application');
        $this->db->join('student_profile', 'application.STUD_Matric = student_profile.STUD_MATRIC');
        $this->db->join('kk_session', 'application.SESSION_ID = kk_session.SESSION_ID');
        $this->db->where('student_profile.gender', 'M');
        $this->db->where('kk_session.SESSION_STATUS', 'Active');
        $query = $this->db->get();
        return $query->row()->totalMale;
    }

    private function getFemaleCount()
    {
        $this->db->select('COUNT(*) as totalFemale');
        $this->db->from('application');
        $this->db->join('student_profile', 'application.STUD_Matric = student_profile.STUD_MATRIC');
        $this->db->join('kk_session', 'application.SESSION_ID = kk_session.SESSION_ID');
        $this->db->where('student_profile.gender', 'F');
        $this->db->where('kk_session.SESSION_STATUS', 'Active');
        $query = $this->db->get();
        return $query->row()->totalFemale;
    }
}
