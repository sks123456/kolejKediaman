<?php

class AcademicSess_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_academic_sess() {
        $query = $this->db->get('academic_session');
        return $query->result();
    }
}

?>