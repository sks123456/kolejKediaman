<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Function to insert data into kk_role_model table
    public function insert_role($data)
    {
        return $this->db->insert('kk_role_model', $data);
    }

    public function get_all_role()
    {
        $this->db->select('kk_role_model.*, student_profile.*');
        $this->db->from('kk_role_model');
        $this->db->join('student_profile', 'kk_role_model.STUD_MATRIC = student_profile.STUD_MATRIC', 'left');
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }
}
