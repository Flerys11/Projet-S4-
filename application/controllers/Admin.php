<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Admin extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('userModel');
		
	}

    public function index(){
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
            $this->load->view('admin/dashboard');
        } else {
            redirect('auth/login');
        }
    }
}