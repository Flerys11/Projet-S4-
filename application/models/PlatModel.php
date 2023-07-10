<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlatModel extends CI_Model {
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}

    public function get_plat_by_type_regime($id_type_regime){
        $this->db->from('plat');
        $this->db->where('id_type_regime', $id_type_regime);
        return $this->db->get();
    }

    public function get_plat_by_id($id){
        $this->db->from('plat');
        $this->db->where('id', $id);
        return $this->db->get();
    }
}