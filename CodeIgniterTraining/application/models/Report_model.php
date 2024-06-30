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

    public function getChannelGenderStats($session_id = null)
    {
        $this->db->select('*');
        $this->db->from('channel_gender_stats');
        if ($session_id) {
            $this->db->where('session_id', $session_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getVacantRooms($session_id = null)
    {
        $this->db->select('*');
        $this->db->from('vacant_rooms');
        if ($session_id) {
            $this->db->where('session_id', $session_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getValidationStats($session_id = null)
    {
        $this->db->select('*');
        $this->db->from('validation_stats');
        if ($session_id) {
            $this->db->where('session_id', $session_id);
        }
        $query = $this->db->get();
        return $query->result();
    }
}
