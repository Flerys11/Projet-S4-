<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		// $this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('userModel');
		
	}

    // public function index(){
    //     $user = new UserModel();
    //     $this->userModel->is_admin(1);
    //     if (isset($_SESSION['user_id'])) {
    //         $this->userModel->is_admin($_SESSION['user_id']);
    //     } else {
    //         redirect('auth/login');
    //     }
    //     $this->load->view('admin/dashboard');
    // }

    public function index(){
        $this->load->view('admin/dashboard');
    }

	public function get_list_user() {
		$this->load->view('admin/liste_user');
	}
}