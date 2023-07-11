<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlimentAdmin extends CI_Model {
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}

    public function get_list() {
        $sql = "SELECT p.id as id_plat, p.nom as nom, p.ingredients as ingredients,p.prix as prix,tp.type as type_plat,rt.type as type_regime FROM plat as p join 
        type_plat as tp on p.id_type_plat = tp.id join regime_type as rt on p.id_type_regime = rt.id";
        $query = $this->db->query($sql); 
        return $query->result_array(); 
    }

    public function get_type_plat() {
        $sql = "SELECT * from type_plat";
        $query = $this->db->query($sql); 
        return $query->result_array(); 
    }

        
     public function liste($id) {
        $sql = "SELECT * from plat where id = $id";
        $query = $this->db->query($sql); 
        return $query->result_array(); 
    }

    public function get_type_regime() {
        $sql = "SELECT * FROM regime_type";
        $query = $this->db->query($sql); 
        return $query->result_array(); 
    }

    public function ajout_aliment($data){
        $query="INSERT INTO plat(id_type_regime,nom,ingredients,prix) values(%s,%s,%s,%s,%s)";
        $query = sprintf(
            $query,
            $this->db->escape($data['regime']),
            $this->db->escape($data['nom']),
            $this->db->escape($data['ingredients']),
            $this->db->escape($data['prix'])
        );
        $this->db->query($query);
    }

    public function delete_Aliment($id){
        $query = "DELETE from plat where id = $id";
        $this->db->query(sprintf($query));
    }

    public function updateAliment($data,$id){
        $sql="UPDATE plat SET id_type_plat ='%s',id_type_regime ='%s',nom ='%s',ingredients='%s', prix=%s WHERE id =%s";
        $sql = sprintf($sql,$data['plat'],$data['regime'],$data['nom'],$data['ingredients'],$data['prix'],$id);
        $this->db->query($sql);
    }
}