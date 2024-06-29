<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model {

public function getAllApplications($session_id = null) {
    $this->db->select('*');
    $this->db->from('application');
    if ($session_id) {
        $this->db->where('session_id', $session_id);
    }
    $query = $this->db->get();
    return $query->result();
}

public function getRoomAllocations($session_id = null) {
    $this->db->select('*');
    $this->db->from('kk_room_allocation');
    $this->db->join('application', 'kk_room_allocation.application_id = application.application_id');
    $this->db->join('kk_room', 'kk_room_allocation.room_code = kk_room.room_code');
    $this->db->join('kk_session', 'application.session_id = kk_session.SESSION_ID');
    $this->db->join('student_profile', 'application.STUD_MATRIC = student_profile.STUD_MATRIC');

    if ($session_id) {
        $this->db->where('kk_session.session_id', $session_id);
    }
    $query = $this->db->get();
    return $query->result();
}

public function getApplicantsWithoutRoom($session_id = null) {
    $this->db->select('*');
    $this->db->from('applicants_without_room');
    if ($session_id) {
        $this->db->where('session_id', $session_id);
    }
    $query = $this->db->get();
    return $query->result();
}

public function getRooms($session_id = null) {
    $this->db->select('*');
    $this->db->from('kk_room');
    if ($session_id) {
        $this->db->join('kk_session', 'kk_room.KOD_SESI = kk_session.ACADEMIC_ID');
        $this->db->where('kk_session.session_id', $session_id);
    }
    $query = $this->db->get();
    return $query->result();
}

public function getChannelGenderStats($session_id = null) {
    $this->db->select('*');
    $this->db->from('channel_gender_stats');
    if ($session_id) {
        $this->db->where('session_id', $session_id);
    }
    $query = $this->db->get();
    return $query->result();
}

public function getVacantRooms($session_id = null) {
    $this->db->select('*');
    $this->db->from('vacant_rooms');
    if ($session_id) {
        $this->db->where('session_id', $session_id);
    }
    $query = $this->db->get();
    return $query->result();
}

public function getValidationStats($session_id = null) {
    $this->db->select('*');
    $this->db->from('validation_stats');
    if ($session_id) {
        $this->db->where('session_id', $session_id);
    }
    $query = $this->db->get();
    return $query->result();
}
}
