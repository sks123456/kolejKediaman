<?php
class Student_model extends CI_Model
{

    // public $title;
    // public $content;
    // public $date;

    public function get_all_students()
    {
        //run query to get all student records from db
        $query = $this->db->get('student_profile');
        return $query;
    }

    public function delete_student_id($id_pelajar)
    {

        //delete query prep and having pipeline to specify which to delete
        $query = $this->db
            ->where("id_pelajar", $id_pelajar)
            ->delete('student_profile');

        //return query to execute
        return $query;
    }

    public function save_student(){

        $this->db->set("NAMA_PELAJAR",$this->input->post("name"));
        $this->db->set("PROGRAM",$this->input->post("program"));
        $this->db->set("ICNO",$this->input->post("icno"));
        
        $this->db->insert('student_profile');
    }

    public function get_student($id_pelajar)
    {
        $query = $this->db
        ->where("id_pelajar",$id_pelajar)
        ->get('student_profile');
        
        return $query;
    }
}
