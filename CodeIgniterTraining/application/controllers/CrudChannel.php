<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudChannel extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        
        // Pulling data into model
        $this->load->model("channel_model");

        // Converting the model data into a list
        $list = $this->channel_model->get_all_channel();

        // Injecting list data into an array
        $data = [
            "list" => $list,
            "update" => null
        ];

        // Loading the view page with the array
        $this->load->view('channel_index', $data);
    }

    public function save()
    {
        $this->load->model("channel_model");
        $channelFound = $this->channel_model->save_channel();
        
        if ($channelFound) {
            // Display an error alert
            echo '<script>';
            echo 'alert("Channel already exists!");';
            echo 'window.location.href = "' . base_url('CodeIgniterTraining/index.php/channel') . '";';
            echo '</script>';
        } else {
            $this->db->set("CHANNEL_NAME", $this->input->post("channel_name"));
            $this->db->set("CHANNEL_STATUS", $this->input->post("channel_status"));
            $this->db->insert('kk_channel');
            redirect(base_url('CodeIgniterTraining/index.php/crudchannel/index'));
        }
        
    }

    public function delete($channel_id)
    {
        //load the url using helper
        $this->load->helper('url');

        //injecting data from model to $this
        $this->load->model("channel_model");

        //delete operations
        $this->channel_model->delete_channel_id($channel_id);

        redirect(base_url('CodeIgniterTraining/index.php/crudchannel/index'));
    }

    public function updateChannel($channel_id)
    {
        // Load the necessary model or perform database operations to retrieve the session details
        $this->load->model("channel_model");
        $channel_details = $this->channel_model->get_channel($channel_id);
        $list = $this->channel_model->get_all_channel();

        $data = [
            "channel" => $channel_details,
            "update" => true,
            "list" => $list
        ];
        // Load your update view with the session data
        $this->load->view('channel_index', $data);
    }

    public function update()
    {
        $this->load->model("channel_model");
        $this->channel_model->update_channel_status();
    
        redirect(base_url('CodeIgniterTraining/index.php/crudchannel/index'));

    }
    
}
