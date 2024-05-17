<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studrole_model extends CI_Model {

    public function get_all_studroles() {
        // Run query to get all student roles from the database
        $query = $this->db->get('kk_studrole');
        return $query->result(); // Return the result as an array of objects
    }

    public function save_studrole($data) {
        // Insert data into the 'kk_studrole' table
        return $this->db->insert('kk_studrole', $data);
    }

    public function get_academic_session_id_and_name() {
        $query = $this->db->select('kk_studrole.*, student_profile.*, academic_session.*')
        ->from('kk_studrole')
        ->join('student_profile', 'student_profile.STUD_MATRIC = kk_studrole.STUD_MATRIC')
        ->join('academic_session', 'academic_session.SESI_AKADEMIK_ID = kk_studrole.SESI_AKADEMIK_ID')
        ->get(); // Execute the query
        return $query->result(); // Return the result as an array of objects
    }

    public function get_academic_session_name($sesi_akademik_id) {
        $query = $this->db->select('sesi_akademik_id, sesi_akademik_desc')
        ->where('sesi_akademik_id', $sesi_akademik_id)
        ->get('academic_session');
        return $query->result(); // Return the result as an array of objects
    }
}
