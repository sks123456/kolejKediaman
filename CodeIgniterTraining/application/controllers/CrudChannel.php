<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudChannel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('channel_model');
        $this->load->library('pagination');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');


        // Pagination configuration
        $config['base_url'] = base_url('CodeIgniterTraining/index.php/crudchannel/index');
        $config['total_rows'] = $this->channel_model->count_all_channels(); // Update this according to your model method
        $config['per_page'] = 10;
        $config['uri_segment'] = 0; // Segment containing the offset

        $this->pagination->initialize($config);

        /*
      start 
      add boostrap class and styles
    */
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        /*
  end 
  add boostrap class and styles
*/
        $this->pagination->initialize($config);

        // Get current page from URI segment
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Converting the model data into a list
        $list = $this->channel_model->get_all_channel2($config['per_page'], $page);

        // Injecting list data into an array
        $data = [
            "list" => $list,
            "update" => null,
            'pagination_links' => $this->pagination->create_links(), // Pass pagination links to the view

        ];

        // Loading the view page with the array
        $this->load->view('channel_index', $data);
    }

    public function save()
    {
        // Load necessary components
        $this->load->model("channel_model");

        // Check if the channel already exists
        $channelFound = $this->channel_model->valid_channel();

        if ($channelFound) {
            // If channel exists, set flashdata error message
            $this->session->set_flashdata('error', 'Channel already exists!');
        } else {
            // Save the channel
            $this->channel_model->save_channel();

            // Optionally, set a success flashdata message
            $this->session->set_flashdata('success', 'Channel saved successfully!');
        }

        redirect(base_url('CodeIgniterTraining/index.php/channel')); // Redirect to channel index page
    }


    public function delete($channel_id)
    {
        // Load necessary components
        $this->load->helper('url');
        $this->load->model("channel_model");

        // Delete operations
        $result = $this->channel_model->delete_channel_id($channel_id);

        if ($result) {
            // Set success flashdata message
            $this->session->set_flashdata('success', 'Channel deleted successfully.');
        } else {
            // Set error flashdata message
            $this->session->set_flashdata('error', 'Failed to delete channel.');
        }

        redirect(base_url('CodeIgniterTraining/index.php/crudchannel/index')); // Redirect to channel index page
    }


    public function updateChannel($channel_id)
    {
        // Load the necessary model or perform database operations to retrieve the channel details
        $this->load->model("channel_model");
        $channel_details = $this->channel_model->get_channel($channel_id);
        $list = $this->channel_model->get_all_channel();

        $data = [
            "channel" => $channel_details,
            "update" => true,
            "list" => $list
        ];
        // Load your update view with the channel data
        $this->load->view('channel_index', $data);
    }

    public function update()
    {
        // Load necessary components
        $this->load->model("channel_model");

        // Update channel status
        $result = $this->channel_model->update_channel_status();

        if ($result) {
            // Set success flashdata message
            $this->session->set_flashdata('success', 'Channel status updated successfully.');
        } else {
            // Set error flashdata message
            $this->session->set_flashdata('error', 'Failed to update channel status.');
        }

        redirect(base_url('CodeIgniterTraining/index.php/crudchannel/index')); // Redirect to channel index page
    }

}
