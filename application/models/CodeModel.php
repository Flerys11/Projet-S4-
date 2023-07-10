<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodeModel extends CI_Model {
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}

    public function get_valeur($valeur_id) {
		$this->db->from('valeur');
		$this->db->where('id', $valeur_id);
		return $this->db->get()->row();
	}

    public function get_code() {
		$query = $this->db->get('codes');
        return $query->result();
	}

    public function correspondant_code($code){
        $this->db->from('codes');
		$this->db->where('codes', $code);
		return $this->db->get()->row();
    }

    public function insert_validation_code($id_code, $id_user){
        $data = array(
			'id_code'   => $id_code,
			'id_user'   => $id_user
		);
		
		return $this->db->insert('validation_codes', $data);
    }
}
?>