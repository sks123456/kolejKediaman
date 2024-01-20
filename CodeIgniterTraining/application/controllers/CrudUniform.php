<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudUniform extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');

        // Pulling data into model
        $this->load->model("uniform_model");

        // Converting the model data into a list
        $list = $this->uniform_model->get_all_uniform();

        // Injecting list data into an array
        $data = [
            "list" => $list,
            "update" => null
        ];

        // Loading the view page with the array
        $this->load->view('uniform_index', $data);
    }

    public function save()
    {
        $this->load->model("uniform_model");
        $this->uniform_model->save_uniform();
        redirect(base_url('CodeIgniterTraining/index.php/cruduniform/index'));
    }

    public function delete($uniform_id)
    {
        //load the url using helper
        $this->load->helper('url');

        //injecting data from model to $this
        $this->load->model("uniform_model");

        //delete operations
        $this->uniform_model->delete_uniform_id($uniform_id);

        redirect(base_url('CodeIgniterTraining/index.php/cruduniform/index'));
    }

    public function updateUniform($uniform_id)
    {
        // Load the necessary model or perform database operations to retrieve the session details
        $this->load->model("uniform_model");
        $uniform_details = $this->uniform_model->get_uniform($uniform_id);
        $list = $this->uniform_model->get_all_uniform();

        $data = [
            "uniform" => $uniform_details,
            "update" => true,
            "list" => $list
        ];
        // Load your update view with the session data
        $this->load->view('uniform_index', $data);
    }

    public function update()
    {
        $this->load->model("uniform_model");
        $this->uniform_model->update_uniform_status();
    
        redirect(base_url('CodeIgniterTraining/index.php/cruduniform/index'));

    }
    
}
