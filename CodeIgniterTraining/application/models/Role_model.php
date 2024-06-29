<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Function to insert data into kk_role_model table
    public function insert_role($data)
    {
        return $this->db->insert('kk_role_model', $data);
    }

    // Function to get all roles
    public function get_all_role()
    {
        $this->db->select('kk_role_model.*, student_profile.*');
        $this->db->from('kk_role_model');
        $this->db->join('student_profile', 'kk_role_model.STUD_MATRIC = student_profile.STUD_MATRIC', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    // Function to check for duplicate role entry
    public function checkDuplicateRole($session_id, $student_id, $studrole_role)
    {
        $this->db->where('CODE_SEM', $session_id);
        $this->db->where('STUD_MATRIC', $student_id);
        $this->db->where('ROLE', $studrole_role);
        $query = $this->db->get('kk_role_model');
        return $query->num_rows() > 0;
    }

    // Function to update role status
    public function update_role()
    {
        $role_id = $this->input->post('role_id');
        $status = $this->input->post('status');

        $this->db->set('STATUS', $status);
        $this->db->where('STUD_MATRIC', $role_id);
        return $this->db->update('kk_role_model');
    }

    // Function to delete role by ID
    public function delete_role_id($role_id)
    {
        $this->db->where('ROLE_MODEL_ID', $role_id);
        return $this->db->delete('kk_role_model');
    }
}
