<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	public function __construct()
	{
		// session_start();
		parent::__construct();
	}

    public function index(){
        $this->load->view('auth/login');
    }
}