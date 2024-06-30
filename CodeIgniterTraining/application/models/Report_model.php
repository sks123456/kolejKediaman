<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    public function getAllApplications($session_id = null)
    {
        // Start building the query
        $this->db->select('application.*, kk_session.SESSION_NAME, kk_channel.CHANNEL_NAME, student_profile.*');
        $this->db->from('application');
        $this->db->join('kk_session', 'application.SESSION_ID = kk_session.SESSION_ID', 'left');
        $this->db->join('kk_channel', 'application.CHANNEL_ID = kk_channel.CHANNEL_ID', 'left');
        $this->db->join('student_profile', 'application.STUD_MATRIC = student_profile.STUD_MATRIC', 'left');
        if ($session_id) {
            $this->db->where('session_id', $session_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getFilteredApplications($session_selected, $status, $gender, $channel)
    {
        $this->db->select('application.*, kk_session.SESSION_NAME, kk_channel.CHANNEL_NAME, student_profile.*');
        $this->db->from('application');
        $this->db->join('kk_session', 'application.SESSION_ID = kk_session.SESSION_ID', 'left');
        $this->db->join('kk_channel', 'application.CHANNEL_ID = kk_channel.CHANNEL_ID', 'left');
        $this->db->join('student_profile', 'application.STUD_MATRIC = student_profile.STUD_MATRIC', 'left');

        // Apply filters if they are set
        if (!empty($session_selected)) {
            $this->db->where('application.session_id', $session_selected);
        }
        if (!empty($status)) {
            $this->db->where('application.APPLICATION_STATUS', $status);
        }

        if (!empty($gender)) {
            $this->db->where('student_profile.gender', $gender);
        }
        if (!empty($channel)) {
            $this->db->where('application.channel_id', $channel);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function getAllRoomType()
    {
        $this->db->select('*');
        $this->db->from('kk_room');
        $this->db->group_by('BLOCK');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllApplicationStatus()
    {
        $this->db->select('*');
        $this->db->from('application');
        $this->db->group_by('APPLICATION_STATUS');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllChannels()
    {
        $this->db->select('*');
        $this->db->from('kk_channel');
        $query = $this->db->get();
        return $query->result();
    }

    public function getFilteredRoomAllocations($session_selected, $block, $gender, $room_type, $channel)
    {
        $this->db->select('*');
        $this->db->from('kk_room_allocation');
        $this->db->join('application', 'kk_room_allocation.application_id = application.application_id');
        $this->db->join('kk_room', 'kk_room_allocation.room_code = kk_room.room_code');
        $this->db->join('kk_session', 'application.session_id = kk_session.SESSION_ID');
        $this->db->join('kk_channel', 'application.channel_id = kk_channel.CHANNEL_ID');
        $this->db->join('student_profile', 'application.STUD_MATRIC = student_profile.STUD_MATRIC');

        // Apply filters if they are set
        if (!empty($session_selected)) {
            $this->db->where('application.session_id', $session_selected);
        }
        if (!empty($block)) {
            $this->db->where('kk_room.BLOCK', $block);
        }

        if (!empty($gender)) {
            $this->db->where('kk_room.room_gender', $gender);
        }
        if (!empty($channel)) {
            $this->db->where('application.channel_id', $channel);
        }
        if (!empty($room_type)) {
            if ($room_type == 'Muslim') {
                $this->db->where('kk_room.room_type', 'Muslim');
            } else {
                $this->db->where('kk_room.room_type !=', 'Muslim');
            }
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function getRoomAllocations($session_id = null)
    {
        $this->db->select('*');
        $this->db->from('kk_room_allocation');
        $this->db->join('application', 'kk_room_allocation.application_id = application.application_id');
        $this->db->join('kk_room', 'kk_room_allocation.room_code = kk_room.room_code');
        $this->db->join('kk_session', 'application.session_id = kk_session.SESSION_ID');
        $this->db->join('kk_channel', 'application.channel_id = kk_channel.CHANNEL_ID');
        $this->db->join('student_profile', 'application.STUD_MATRIC = student_profile.STUD_MATRIC');

        if ($session_id) {
            $this->db->where('kk_session.session_id', $session_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getApplicantsWithoutRoom($session_id = null)
    {
        $this->db->select('*');
        $this->db->from('applicants_without_room');
        if ($session_id) {
            $this->db->where('session_id', $session_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRooms($session_id = null)
    {
        $this->db->select('*');
        $this->db->from('kk_room');
        if ($session_id) {
            $this->db->join('kk_session', 'kk_room.KOD_SESI = kk_session.ACADEMIC_ID');
            $this->db->where('kk_session.session_id', $session_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getChannelGenderStats($session_id = null, $status = null)
    {
        $this->db->select('c.CHANNEL_NAME');
        $this->db->select('SUM(CASE WHEN s.GENDER = "M" THEN 1 ELSE 0 END) AS MALE');
        $this->db->select('SUM(CASE WHEN s.GENDER = "F" THEN 1 ELSE 0 END) AS FEMALE');
        $this->db->select('SUM(CASE WHEN s.GENDER IS NULL THEN 1 ELSE 0 END) AS UNKNOWN_GENDER');
        $this->db->select('COUNT(*) AS TOTAL_APPLICATION');

        $this->db->from('application a');
        $this->db->join('kk_channel c', 'a.CHANNEL_ID = c.CHANNEL_ID');
        $this->db->join('student_profile s', 'a.STUD_MATRIC = s.STUD_MATRIC');

        if ($session_id) {
            $this->db->where('a.SESSION_ID', $session_id);
        }
        if ($status) {
            $this->db->where('a.APPLICATION_STATUS', $status);
        }
        $this->db->group_by('c.CHANNEL_NAME');

        $query = $this->db->get();
        return $query->result();
    }

    public function getVacantRooms($session_id = null)
    {
        $this->db->select('KOLEJ, BLOCK, ROOM_LEVEL, ROOM_GENDER, ROOM_TYPE, SUM(CAPACITY) AS TOTAL_CAPACITY, SUM(CAPACITY - FILLED_ROOM) AS TOTAL_EMPTY_SPOTS');
        $this->db->from('kk_room');
        $this->db->where('FILLED_ROOM < CAPACITY'); // Filter for rooms with empty spots
        $this->db->group_by('KOLEJ, BLOCK, ROOM_LEVEL, ROOM_GENDER, ROOM_TYPE'); // Group by kolej, block, room level, room gender, and room type

        if ($session_id) {
            $this->db->join('kk_session', 'kk_room.KOD_SESI = kk_session.ACADEMIC_ID');
            $this->db->where('kk_session.session_id', $session_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getValidationStats($session_id = null)
    {
        // Load the database library
        $this->load->database();

        // List all possible statuses
        $possible_statuses = [
            'Have not Validate',
            'Validated',
            'Staff Rejected',
            'Waiting Staff Approve',
            'Student Rejected'
        ];

        // Create an array to store the results
        $results = [];

        // Loop through each status and count the corresponding records
        foreach ($possible_statuses as $status) {
            // Select query with subquery simulation
            $this->db->select("
        '$status' AS VALIDATION_STATUS,
        COALESCE(SUM(CASE WHEN s.GENDER = 'M' THEN 1 ELSE 0 END), 0) AS MALE,
        COALESCE(SUM(CASE WHEN s.GENDER = 'F' THEN 1 ELSE 0 END), 0) AS FEMALE,
        COALESCE(SUM(CASE WHEN s.GENDER = 'NULL' THEN 1 ELSE 0 END), 0) AS UNDEFINED_GENDER,
        COALESCE(COUNT(a.STUD_MATRIC), 0) AS TOTAL
    ", FALSE);
            $this->db->from('application a');
            $this->db->join('student_profile s', 'a.STUD_MATRIC = s.STUD_MATRIC', 'left');
            $this->db->where("(
        (a.APPLICATION_STATUS = 'Approved' AND '$status' = 'Have not Validate') OR
        (a.APPLICATION_STATUS = 'complete' AND '$status' = 'Validated') OR
        (a.APPLICATION_STATUS = 'rejected' AND '$status' = 'Staff Rejected') OR
        (a.APPLICATION_STATUS = 'SUBMITTED' AND '$status' = 'Waiting Staff Approve') OR
        (a.APPLICATION_STATUS = 'NO-ACCEPT' AND '$status' = 'Student Rejected')
    )", NULL, FALSE);

            if ($session_id !== null) {
                $this->db->where('a.SESSION_ID', $session_id);
            }
            $query = $this->db->get();
            $results[] = $query->row_array();
        }

        return $results;
    }
}
