<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class User extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('userModel');
		
	}

    public function profil(){
        $this->load->view('home/profil');
    }

    public function update_profil(){
		$form_data = $this->input->post();
        $user_id = $_SESSION['user_id'];
        $this->userModel->update_user($form_data, $user_id);
		$user    = $this->userModel->get_user($user_id);
        // set session user datas
        $_SESSION['username']     = (string)$user->username;
        $_SESSION['email']        = (string)$user->email;
        $_SESSION['avatar']       = (string)$user->avatar;
        $_SESSION['logged_in']    = (bool)true;
        $_SESSION['poids']        = (float)$user->poids;
        $_SESSION['taille']       = (int)$user->taille;
        $this->load->view('home/profil');
    }

    public function wallet(){
        $this->load->view('home/wallet');
    }
}
?>