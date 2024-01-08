<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudChannel extends CI_Controller {
    public function index()
    {
        $this->load->helper('url');

        // Pulling data into model
        $this->load->model("channel_model");

        // Converting the model data into a list
        $list = $this->channel_model->get_all_channel();

        // Injecting list data into an array
        $data = [
            "list" => $list
        ];

        // Loading the view page with the array
        $this->load->view('channel_index', $data);
    }

    public function save(){
        $this->load->model("channel_model");
        $this->channel_model->save_session();
        redirect(base_url('CodeIgniterTraining/index.php/crudsession/index'));
    }

    public function delete($channel_id){
        //load the url using helper
        $this->load->helper('url');
        
        //injecting data from model to $this
        $this->load->model("channel_model");
        
        //delete operations
        $this->channel_model->delete_session_id($channel_id);

        redirect(base_url('CodeIgniterTraining/index.php/crudchannel/index'));

    }

}
