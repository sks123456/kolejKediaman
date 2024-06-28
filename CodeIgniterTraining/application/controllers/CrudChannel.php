<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudChannel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('channel_model');
        $this->load->library('pagination');
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
        $this->load->model("channel_model");
        $channelFound = $this->channel_model->valid_channel();

        if ($channelFound) {
            // Display an error alert
            echo '<script>';
            echo 'alert("Channel already exist!");';
            echo 'window.location.href = "' . base_url('CodeIgniterTraining/index.php/channel') . '";';
            echo '</script>';
        } else {
            $channelFound = $this->channel_model->save_channel();
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
        $this->load->model("channel_model");
        $this->channel_model->update_channel_status();

        redirect(base_url('CodeIgniterTraining/index.php/crudchannel/index'));
    }
}
