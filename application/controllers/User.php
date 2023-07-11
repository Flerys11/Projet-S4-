<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class User extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('userModel');
        $this->load->model('UsersAdmin');
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

    private function insertCodesIntoData(){
        $codes = $this->codeModel->get_code();
        foreach ($codes as $code) {
            $data['code'][] = $code->codes;
            $data['status'][] = $this->getStatus($code);
            $valeur = $this->codeModel->get_valeur($code->id_valeur);
            $data['valeur'][] = $valeur->valeur;
        }
        return $data;
    }

    private function getStatus($code){
        if ($this->codeModel->correspondant_code($code->codes)->is_valide == 1 && !$this->codeModel->attente_validation($code->id, $_SESSION['user_id'])) {
            return 1;//valide
        } elseif($this->codeModel->correspondant_code($code->codes)->is_valide == 1 && $this->codeModel->attente_validation($code->id, $_SESSION['user_id'])) {
            return 2;//en attente
        } else {
            return 0;//non valide
        }
        
    }

    public function wallet(){
        $data['list_codes'] = $this->insertCodesIntoData();
        $this->load->view('home/wallet', $data);
    }

    public function validation_user(){
		$code = $this->input->post('code');
        $code = trim($code);
        if ($this->codeModel->getCountRow($code) == 0) {
            $data['error'] = "Le code saisi n'existe pas";
            $data['value'] = $code;
        } else {
            $id_code = $this->codeModel->correspondant_code($code)->id;
            if ($this->codeModel->correspondant_code($code)->is_valide == 0) {
                $data['error'] = "Le code saisi n'est plus valide";
            } elseif ($this->codeModel->attente_validation($id_code, $_SESSION['user_id'])) {
                $data['error'] = "Le code saisi est deja en attente de validation";
            } else {
                $this->codeModel->insert_validation_code($id_code, (int)$_SESSION['user_id']);
            }
        }
        $data['list_codes'] = $this->insertCodesIntoData();
        
        $this->load->view('home/wallet', $data);
    }

    //--------------ADMIN
    public function wallet_user(){
		$this->load->view('home/validation_wallet');
    }

    public function list_user(){
        $data['data'] = $this->UsersAdmin->get_list_user();
        $this->load->view('admin/utilisateur/liste',$data);
    }

	public function delete_user(){
		$id = $_GET['id'];
		$this->UsersAdmin->deleteUser($id);
		redirect('User/list_user');
    }

	public function updateUser(){
		$id = $_GET['id'];
		$data['data'] = $this->UsersAdmin->get_list($id);
		$this->load->view('admin/utilisateur/update',$data);
	}

	public function traitement_update(){
		$id = $_GET['id'];
        // var_dump($id);

		// $a = $this->input->post('username');
		// $b = $this->input->post('email');
		// $c = $this->input->post('taille');
		// $d = $this->input->post('poids');
		// var_dump($id,$a,$b,$c,$d);
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'taille' => $this->input->post('taille'),
			'poids' => $this->input->post('poids')
	);


	$this->UsersAdmin->update_user($data,$id);
	redirect('User/list_user');
	}
}
?>