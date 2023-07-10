<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class User extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('userModel');
		$this->load->model('codeModel');
		
	}

    public function profil(){
        $this->load->view('home/profil');
    }

    public function histo_morphology($user_id, $poids){
		$user = $this->userModel->get_user($user_id);
        if ((float)$user->poids != $poids) {
            $this->userModel->insert_histo_morphology((float)$user->poids, $user_id);
        }
    }

    public function update_profil(){
		$form_data = $this->input->post();
        $user_id = $_SESSION['user_id'];
        $poids = $this->input->post('poids');

        $this->histo_morphology($user_id, $poids);

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
        $codes = $this->codeModel->get_code();
        $data['codes'] = $codes;
        foreach ($codes as $code) {
            $data['code'][] = $code->codes;
            $data['is_valide'][] = $code->is_valide;
            $valeur = $this->codeModel->get_valeur($code->id_valeur);
            $data['valeur'][] = $valeur->valeur;
        }
        $this->load->view('home/wallet', $data);
    }

    public function validation_user(){
		$code = $this->input->post('code');
        $id_code = $this->codeModel->correspondant_code($code)->id;
        $this->codeModel->insert_validation_code($id_code, (int)$_SESSION['user_id']);
        $this->wallet();
    }
}
?>