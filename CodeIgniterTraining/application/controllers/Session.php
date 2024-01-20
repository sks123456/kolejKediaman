<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -d
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('session_index');
	}
	public function login_admin()
	{
        echo 'login for admin';
	}
    public function login_student()
	{
        $this->load->view('login');
	}
	public function main(){
		$this->load->view('home');
	}

	public function blank(){
		$this->load->view('blank');
	}
}
