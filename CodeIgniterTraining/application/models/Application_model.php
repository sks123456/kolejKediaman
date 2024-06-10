<?php
class Application_model extends CI_Model
{

    public function get_all_applications($file_content, $file_name)
    {
        //run query to get all student records from db
        $query = $this->db->get('application');
        return $query;
    }

    public function get_student_application($sessions_id, $student_matric)
    {
        $this->db->select('*');
        $this->db->from('application'); // Replace 'your_table_name' with your actual table name
        $this->db->where('session_id', $sessions_id);
        $this->db->where('STUD_MATRIC', $student_matric);
        $query = $this->db->get();

        // Check if any applications are found
        if ($query->num_rows() > 0) {
            // Return the result as an array of objects
            return $query->result();
        } else {
            // If no applications are found, return false or an empty array, depending on your preference
            return []; // You can also return false here if you prefer
        }
    }
    public function submit_application($file_content, $file_name)
    {
        $this->db->set("SESSION_ID", $this->input->post("session_id"));
        $this->db->set("CHANNEL_ID", $this->input->post("channel_selected"));
        $this->db->set("UNIT_ID", $this->input->post("unit_uniform"));
        $this->db->set("APPLICATION_STATUS", "SUBMITTED");
        $this->db->set("SUBMITTED_BY", date('Y-m-d H:i:s')); // Set submitted_by as current datetime
        $this->db->set("STUD_MATRIC", $this->input->post("stud_matric"));
        $this->db->set("DOCUMENT", $file_content);
        $this->db->set("APPLICATION_UPLOAD_NAME", $file_name);

        $this->db->insert('application'); // Assuming 'application' is your table name
    }

    public function get_application($application_id)
    {
        $query = $this->db
            ->where("APPLICATION_ID", $application_id)
            ->get('application');

        return $query;
    }


    // application_model.php
    public function updateStatus($application_id, $status)
    {
        $data = array(
            'APPLICATION_STATUS' => $status
        );
        $this->db->where('APPLICATION_ID', $application_id);
        $this->db->update('application', $data);
    }
    public function get_application_by_studentID_session_id($session_id, $stud_matric)
    {
        $query = $this->db
            ->where("SESSION_ID", $session_id)
            ->where("STUD_MATRIC", $stud_matric)
            ->get('application');

        return $query;
    }

    public function get_records($session_selected, $channel_selected, $room_type, $gender, $status)
    {
        // Start building the query
        $this->db->select('application.*, kk_session.SESSION_NAME, kk_channel.CHANNEL_NAME, student_profile.*');
        $this->db->from('application');
        $this->db->join('kk_session', 'application.SESSION_ID = kk_session.SESSION_ID', 'left');
        $this->db->join('kk_channel', 'application.CHANNEL_ID = kk_channel.CHANNEL_ID', 'left');
        $this->db->join('student_profile', 'application.STUD_MATRIC = student_profile.STUD_MATRIC', 'left');

        // Add conditions based on non-empty form inputs
        if (!empty($session_selected)) {
            $this->db->where('application.SESSION_ID', $session_selected);
        }
        if (!empty($channel_selected)) {
            $this->db->where('application.CHANNEL_ID', $channel_selected);
        }
        if (!empty($room_type)) {
            $this->db->where('student_profile.RELIGION', $room_type);
        }
        if (!empty($gender)) {
            $this->db->where('student_profile.GENDER', $gender);
        }
        if (!empty($status)) {
            $this->db->where('application.APPLICATION_STATUS', $status);
        }

        // Execute the query and retrieve data from the database
        $query = $this->db->get();
        return $query->result();
    }

    public function getStudentApplication()
    {
        $this->db->select('*');
        $this->db->from('application AS a');
        $this->db->join('student_profile AS s', 'a.stud_matric = s.stud_matric');
        $this->db->join('kk_session AS c', 'a.session_id = c.session_id');
        $this->db->join('kk_channel AS k', 'a.channel_id = k.channel_id');
        $query = $this->db->get();
        return $query;
    }
}
