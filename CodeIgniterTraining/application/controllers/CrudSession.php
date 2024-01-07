<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudSession extends CI_Controller {
    public function index()
    {
        $this->load->helper('url');

        // Load the session_model model
        $this->load->model("session_model");

        // Get all session data
        $list = $this->session_model->get_all_session();

        // Display the number of rows
        echo 'no of rows: '.$list->num_rows();

        // Injecting list data into an array
        $data = [
            "list" => $list
        ];

        // Load the view page with the array
        $this->load->view('session_list', $data);
    }

    public function save()
    {
        $this->load->model("session_model");

        // Call the save_session method in the session_model model
        $this->session_model->save_session();

        // Redirect to the index method of the Crud controller
        redirect(site_url("crudsession/index"));
    }
}
?>
