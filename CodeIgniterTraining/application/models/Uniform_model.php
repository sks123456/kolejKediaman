<?php
class Uniform_model extends CI_Model
{

    public function get_all_uniform()
    {
        // query to get all session records
        $query = $this->db->get('kk_uniform');
        return $query;
    }

    public function delete_uniform_id($uniform_ID)
    {

        //delete query prep and having pipeline to specify which to delete
        $query = $this->db
            ->where("uniform_ID", $uniform_ID)
            ->delete('kk_uniform');

        //return query to execute
        return $query;
    }

    public function save_uniform()
    {

        $this->db->set("UNIFORM_NAME", $this->input->post("uniform_name"));
        $this->db->set("UNIFORM_STATUS", $this->input->post("uniform_status"));
        $this->db->insert('kk_uniform');

    }

    public function get_uniform($uniform_ID)
    {
        $query = $this->db
            ->where("uniform_ID", $uniform_ID)
            ->get('kk_uniform');

        return $query;
    }

    public function update_uniform_status()
    {
        $this->db->where('UNIFORM_ID', $this->input->post("uniform_id"));
        $this->db->set('UNIFORM_STATUS', $this->input->post("uniform_status"));
        $this->db->update('kk_uniform');
    }
}
