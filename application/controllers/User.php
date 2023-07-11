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
        $wallet_user = $this->codeModel->code_en_attente();
        $count_walletEnAttente = count($wallet_user);
        if ($count_walletEnAttente == 0) {
            $this->load->view('home/null_validation');
        } else{
            foreach ($wallet_user as $wallet) {
                $data['attente'][] = $wallet;
                $data['username'][] = $this->codeModel->get_user_wallet($wallet->id_user);
                $valeur = $this->codeModel->get_valeur($wallet->id_valeur);
                $data['valeur'][] = $valeur->valeur;
            }
            $this->load->view('home/validation_wallet', $data);
        }
        
    }

    public function validation_admin(){
        $wallet_user = $this->codeModel->code_en_attente();
        if (isset($_GET['id_user'])) {
            $id_user = $_GET['id_user'];
        }
        if (isset($_GET['id_code'])) {
            $id_code = $_GET['id_code'];
        }
        if (isset($_GET['valeur'])) {
            $valeur = $_GET['valeur'];
        }
        $this->codeModel->transaction_validation($id_user, $id_code, $valeur);
        $this->wallet_user();
    }
}
?>