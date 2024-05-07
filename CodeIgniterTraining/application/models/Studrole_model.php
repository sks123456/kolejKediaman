<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studrole_model extends CI_Model {
    
    public function get_all_studroles()
    {
        // Run query to get all student roles from the database
        $query = $this->db->get('kk_studrole');
        return $query->result(); // Return the result as an array of objects
    }

    public function save_studrole($data)
    {
        // Insert data into the 'kk_studrole' table
        $this->db->insert('kk_studrole', $data);
    }

    public function get_academic_session_id_and_name() {
        $query = $this->db->select('sesi_akademik_id, sesi_akademik_desc')
        ->get('academic_session');
        return $query->result();
    }

    public function get_academic_session_name($sesi_akademik_id) {
        $query = $this->db->select('sesi_akademik_id, sesi_akademik_desc')
        ->where("sesi_akademik_id",$sesi_akademik_id)
        ->get('academic_session');
        return $query->result();
    }

}
