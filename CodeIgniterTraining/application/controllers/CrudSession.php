<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudSession extends CI_Controller {
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

        // Displaying output
        echo 'no of rows: ' . $list->num_rows();

        // Injecting list data into an array
        $data = [
            "list" => $list
        ];

        // Loading the view page with the array
        $this->load->view('session_index', $data);
    }

    public function save(){
        $this->load->model("session_model");
        $this->session_model->save_session();
        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
    }

    public function delete($session_id){
        //load the url using helper
        $this->load->helper('url');
        
        //injecting data from model to $this
        $this->load->model("session_model");
        
        //delete operations
        $this->session_model->delete_session_id($session_id);

        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));

    }

}
