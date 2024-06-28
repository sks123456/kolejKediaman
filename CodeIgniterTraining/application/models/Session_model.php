<?php
class Session_model extends CI_Model
{

    public function count_all_sessions()
    {
        return $this->db->count_all('kk_session');
    }

    public function get_all_session($limit, $offset)
    {
        // query to get paginated session records with a join
        $query = $this->db->select('*') // Select the columns you need
            ->from('kk_session') // Main table
            ->join('academic_session', 'kk_session.ACADEMIC_ID = academic_session.SEM_KOD_SESISEM', 'left') // Join condition
            ->limit($limit, $offset) // Pagination
            ->get(); // Execute the query
        return $query;
    }



    public function get_session_id_and_name()
    {
        $query = $this->db->select('session_id, session_name,academic_id')
            ->get('kk_session');
        return $query->result();
    }

    public function get_session_name($session_id)
    {
        $query = $this->db->select('session_id, session_name')
            ->where("session_id", $session_id)
            ->get('kk_session');
        return $query->result();
    }

    public function checkDuplicateSemester($semester, $session_id = null) {
        $this->db->where('ACADEMIC_ID', $semester);
        if ($session_id) {
            $this->db->where('SESSION_ID !=', $session_id);
        }
        $query = $this->db->get('kk_session'); 

        return $query->num_rows() > 0;
    }

    public function delete_session_id($session_ID)
    {

        //delete query prep and having pipeline to specify which to delete
        $query = $this->db
            ->where("session_ID", $session_ID)
            ->delete('kk_session');

        //return query to execute
        return $query;
    }

    public function save_session($file_content, $file_name)
    {
        $this->db->set("ACADEMIC_ID", $this->input->post("session_id"));
        $this->db->set("SESSION_NAME", $this->input->post("session_name"));
        $this->db->set("START_DATE", $this->input->post("start_date"));
        $this->db->set("END_DATE", $this->input->post("end_date"));

        if ($file_content != null) {
            $this->db->set("DOCUMENT", $file_content);
            $this->db->set("DOCUMENT_NAME", $file_name);
        }

        // Check if the start date is after the current date
        $current_date = date('Y-m-d'); // Corrected the date format
        $session_status = ($this->input->post("start_date") <= $current_date) ? 'Active' : 'Inactive';
        $this->db->set("SESSION_STATUS", $session_status);

        $this->db->insert('kk_session');
    }

    public function get_session($session_ID)
    {
        $query = $this->db
            ->where("session_ID", $session_ID)
            ->get('kk_session');

        return $query;
    }

    public function get_active_session($sem)
    {
        // Determine the SEM_PERINGKAT value based on the first character of $sem
        $sem_peringkat = '';
        if (strpos($sem, 'D') === 0) {
            $sem_peringkat = 'DIPLOMA';
        } elseif (strpos($sem, 'S') === 0) {
            $sem_peringkat = 'SARJANA MUDA';
        }

        // Perform the query with the join and condition
        $query = $this->db
            ->select('kk_session.*, academic_session.*')
            ->from('kk_session')
            ->join('academic_session', 'kk_session.ACADEMIC_ID = academic_session.SEM_KOD_SESISEM')
            ->where('kk_session.SESSION_STATUS', 'Active')
            ->where('academic_session.SEM_PERINGKAT', $sem_peringkat)
            ->get();

        return $query;
    }



    public function update_session_status($session_ID, $status)
    {
        $this->db->where('SESSION_ID', $session_ID);
        $this->db->set('SESSION_STATUS', $status);
        $this->db->update('kk_session');
    }

    public function update_session($file_content, $file_name)
    {
        $session_id = $this->input->post("session_id");

        $this->db->set("START_DATE", $this->input->post("start_date"));
        $this->db->set("END_DATE", $this->input->post("end_date"));
        if ($file_content != null) {
            $this->db->set("DOCUMENT", $file_content);
            $this->db->set("DOCUMENT_NAME", $file_name);
        }


        // Check if the start date is after the current date
        $current_date = date('Y-m-d'); // Use 'Y-m-d' for date format
        $session_status = ($this->input->post("start_date") <= $current_date) ? 'Active' : 'Inactive';
        $this->db->set("SESSION_STATUS", $session_status);

        // Use where clause to specify the condition
        $this->db->where('SESSION_ID', $session_id);

        // Update the row in the 'kk_session' table
        $this->db->update('kk_session');
    }

    public function get_blob_data($session_id)
    {
        // Assuming your blob data is stored in a table named 'sessions' with a column 'pdf_blob'
        $this->db->select('DOCUMENT');
        $this->db->where('SESSION_ID', $session_id);
        $query = $this->db->get('kk_session');

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->DOCUMENT;
        } else {
            return null; // or handle the case where data is not found
        }
    }
}
