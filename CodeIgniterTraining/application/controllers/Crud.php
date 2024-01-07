<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function index()
	{
        $this->load->helper('url');

        //pulling data into model
        $this->load->model("student_model");
        
        //converting the model data into a list
        $list= $this->student_model->get_all_students();
        
        //displaying output
        echo 'no of rows: '.$list->num_rows();

        //injecting list data into an array
        $data = [
            "list"=>$list
        ];

        //loading the view page with the array
        $this->load->view('senarai_pelajar',$data);
    
    }

    public function delete($id_pelajar){
        //load the url using helper
        $this->load->helper('url');
        
        //injecting data from model to $this
        $this->load->model("student_model");
        
        //delete operations
        $this->student_model->delete_student_id($id_pelajar);

        redirect(site_url("crud/index"));

    }

    public function addnew(){
        $this->load->view('insert');
    }

    public function save(){
        $this->load->model("student_model");
        $this->student_model->save_student();
        redirect(site_url("crud/index"));
    }

    public function update($id_pelajar){
        $this->load->model("student_model");
        $pelajar = $this->student_model->get_student($id_pelajar);
        $this->load->view("update",$pelajar);
    }

}
