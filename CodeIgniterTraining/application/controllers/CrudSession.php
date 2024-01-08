<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudSession extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');

        // Pulling data into model
        $this->load->model("session_model");

        // Converting the model data into a list
        $list = $this->session_model->get_all_session();

        // Check if the current date is between start date and end date
        foreach ($list->result() as $row) {
            $currentDate = date('Y-m-d');
            if ($currentDate >= $row->START_DATE && $currentDate <= $row->END_DATE) {
                $row->SESSION_STATUS = 'Active';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Active');
            } else {
                $row->SESSION_STATUS = 'Inactive';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Inactive');
            }
        }

        // Injecting list data into an array
        $data = [
            "list" => $list,
            "update" => null
        ];

        // Loading the view page with the array
        $this->load->view('session_index', $data);
    }

    public function save()
    {
        $this->load->model("session_model");
        $this->session_model->save_session();
        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
    }

    public function delete($session_id)
    {
        //load the url using helper
        $this->load->helper('url');

        //injecting data from model to $this
        $this->load->model("session_model");

        //delete operations
        $this->session_model->delete_session_id($session_id);

        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
    }

    public function updateSession($session_id)
    {
        // Load the necessary model or perform database operations to retrieve the session details
        $this->load->model("session_model");
        $session_details = $this->session_model->get_session($session_id);
        $list = $this->session_model->get_all_session();
        // Check if the current date is between start date and end date
        foreach ($list->result() as $row) {
            $currentDate = date('Y-m-d');
            if ($currentDate >= $row->START_DATE && $currentDate <= $row->END_DATE) {
                $row->SESSION_STATUS = 'Active';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Active');
            } else {
                $row->SESSION_STATUS = 'Inactive';

                // Update SESSION_STATUS in the database
                $this->session_model->update_session_status($row->SESSION_ID, 'Inactive');
            }
        }
        $data = [
            "session" => $session_details,
            "update" => true,
            "list" => $list
        ];
        // Load your update view with the session data
        $this->load->view('session_index', $data);
    }

    public function update()
    {
        $this->load->model("session_model");
        $this->session_model->update_session();
    
        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));

    }
    
}
