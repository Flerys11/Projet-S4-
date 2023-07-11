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

    public function attente_validation($id_code, $user_id){
		$query = $this->db->get('validation_codes');
        $results = $query->result(); 

        foreach ($results as $row) {
            if ($row->id_code == $id_code && $row->id_user == $user_id) {
                return true;
            }
        }
        return false;
    }

    public function correspondant_code($code) {
        $this->db->from('codes');
        $this->db->where('codes', $code);
        $result = $this->db->get()->row();
    
        return $result;
    }    

    public function getCountRow($code) {
        $this->db->from('codes');
        $this->db->where('codes', $code);
        $result = $this->db->get()->num_rows();
    
        return $result;
    }   

    public function get_id_by_codes($codes){
        $this->db->select('id');
        $this->db->from('codes');
        $this->db->where('codes', $codes);
        return $this->db->get()->row();
    }

    public function insert_validation_code($id_code, $id_user){
        $data = array(
			'id_code'   => $id_code,
			'id_user'   => $id_user
		);
		
		return $this->db->insert('validation_codes', $data);
    }

    public function code_en_attente(){
        $query = $this->db->select('validation_codes.*, codes.*')
                  ->from('validation_codes')
                  ->join('codes', 'validation_codes.id_code = codes.id')
                  ->where('validation_codes.is_valide', 0)
                  ->where('codes.is_valide', 1)
                  ->get();

        $results = $query->result();
        return $result;
    }
}
?>