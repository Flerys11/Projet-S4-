<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->helper(array('url'));
        $this->load->model('PlatModel');
        $this->load->model('SportModel');
	}

    public function index(){
        
    }

    public function generate($id_type, $poids_objectif){
        $plat = $this->PlatModel->get_plat_by_type_regime($id_type);
        $sport = $this->SportModel->get_sport_by_type_regime($id_type);

        $nbJours = abs($_SESSION['poids'] - $poids_objectif)    ;

        $dateDebut = new DateTime();
        $dateFin = clone $dateDebut->add(new DateInterval('P' . $nbJours . 'D'));

        $periode_regime['id_user'] = $$_SESSION['user_id'];
        $periode_regime['id_type'] = $id_type;
        $periode_regime['poids_objectif'] = $poids_objectif;
        $periode_regime['date_debut'] = $dateDebut->format('Y-m-d');
        $periode_regime['date_fin'] = $dateFin->format('Y-m-d');
        $periode_regime['regime'] = [];
        $platJournee = array_fill(0, 3, null); //tableau avec 3 éléments null

        for ($i=0; $i < $nbJours; $i++) { 
            
        }
    }

}