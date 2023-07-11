<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Model {
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}

    public function get_Aliment(){
        
            $this->db->from('aliment');
            return $this->db->get()->row();
        
    }
}