<?php
class Uniform_model extends CI_Model
{

    public function count_all_uniforms()
    {
        return $this->db->count_all('kk_uniform');
    }

    public function get_all_uniforms2($limit, $offset)
    {
        // query to get paginated session records
        $query = $this->db->limit($limit, $offset)
            ->get('kk_uniform');
        return $query;
    }

    public function get_all_uniform()
    {
        // query to get all session records
        $query = $this->db->get('kk_uniform');
        return $query;
    }

    public function get_unit_id_and_name() {
        $query = $this->db->select('UNIFORM_ID, UNIFORM_NAME')
        ->where('UNIFORM_STATUS','Active')->get('kk_uniform');
        return $query->result();
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

    public function valid_uniform()
    {
        $this->load->model("uniform_model");
        $uniformResult = $this->uniform_model->get_all_uniform();

        // Assuming you have the input uniform_name via POST
        $inputUniformName = $this->input->post("uniform_name");

        // Convert query result to array
        $uniform = $uniformResult->result_array();

        $uniformFound = false;

        foreach ($uniform as $uniformDetail) {
            // Assuming each $uniform has a 'name' key
            $uniformName = $uniformDetail['UNIFORM_NAME'];

            if (strtoupper($inputUniformName) == $uniformName) {
                // Uniform name found in the list
                $uniformFound = true;
                break; // Exit the loop since we found a match
            }
        }
        return $uniformFound;
    }
    public function save_uniform()
    {
        $this->db->set("UNIFORM_NAME", strtoupper($this->input->post("uniform_name")));
            $this->db->set("UNIFORM_STATUS", $this->input->post("uniform_status"));
            $this->db->insert('kk_uniform');
            redirect(base_url('CodeIgniterTraining/index.php/cruduniform/index'));
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
