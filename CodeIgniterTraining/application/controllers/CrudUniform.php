<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudUniform extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('uniform_model');
        $this->load->library('pagination');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');

        // Pagination configuration
        $config['base_url'] = base_url('CodeIgniterTraining/index.php/uniform/index');
        $config['total_rows'] = $this->uniform_model->count_all_uniforms(); // Update this according to your model method
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
        $list = $this->uniform_model->get_all_uniforms2($config['per_page'], $page);

        // Injecting list data into an array
        $data = [
            "list" => $list,
            "update" => null,
            'pagination_links' => $this->pagination->create_links(), // Pass pagination links to the view

        ];

        // Loading the view page with the array
        $this->load->view('uniform_index', $data);
    }

    public function save()
    {
        $this->load->model("uniform_model");
        $uniformFound = $this->uniform_model->valid_uniform();

        if ($uniformFound) {
            // Display an error alert
            $this->session->set_flashdata('error', 'Uniform already exists!');
        } else {
            $uniformFound = $this->uniform_model->save_uniform();
            // Optionally, set a success flashdata message
            $this->session->set_flashdata('success', 'Uniform saved successfully!');
        }

        redirect(base_url('CodeIgniterTraining/index.php/uniform')); // Redirect to channel index page
    }

    public function delete($uniform_id)
    {
        // Load the URL helper
        $this->load->helper('url');

        // Load the model
        $this->load->model("uniform_model");

        // Perform delete operation
        $this->uniform_model->delete_uniform_id($uniform_id);

        // Set success message
        $this->session->set_flashdata('success', 'Uniform deleted successfully.');
        redirect(base_url('CodeIgniterTraining/index.php/cruduniform/index')); // Redirect to index
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

        // Set success message
        $this->session->set_flashdata('success', 'Uniform status updated successfully.');
        redirect(base_url('CodeIgniterTraining/index.php/cruduniform/index')); // Redirect to index
    }

}
