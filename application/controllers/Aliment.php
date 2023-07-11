<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aliment extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		// $this->load->library(array('session'));
		// $this->load->helper(array('url'));
		$this->load->model('AlimentAdmin');
		
	}

    public function get_aliment(){
        $data['data'] = $this->AlimentAdmin->get_list();
        $this->load->view('admin/Aliment/liste',$data);
    }

    public function Ajout_Aliment(){
        $data['data'] = $this->AlimentAdmin->get_type_plat();
        $data['d'] = $this->AlimentAdmin->get_type_regime();
        $this->load->view('admin/Aliment/ajout',$data);
    }

    public function traitement_ajout(){

        $vi = $this->input->post('viande');
        $p =$this->input->post('poisson');
        $vo =$this->input->post('volaille');
        $total = $vi+$p+$vo;
        var_dump($total);

        if($total <= 100){
            
        $data = array(
            'nom' => $this->input->post('nom'),
            'ingredients' => $this->input->post('ingredients'),
            'prix' => $this->input->post('prix'),
            'regime' => $this->input->post('regime')
        );

        $datas = array(
            'viande' => $vi,
            'poisson' => $p,   
            'volaille' => $vo
        );
        $this->AlimentAdmin->ajout_aliment($data);
        $this->AlimentAdmin->ajout_pourcentage($datas);
        redirect('Aliment/get_aliment');
        }else {
            redirect('Aliment/update');
        }
        // $data = array(
        //     'nom' => $this->input->post('nom'),
        //     'ingredients' => $this->input->post('ingredients'),
        //     'prix' => $this->input->post('prix'),
        //     'regime' => $this->input->post('regime'),
        //     'viande' => $vi,
        //     'poisson' => $p,   
        //     'volaille' => $vo
        // );
        // $this->AlimentAdmin->ajout_aliment($data);
        // redirect('Aliment/get_aliment');
    }

    public function delete(){
		$id = $_GET['id'];
		$this->AlimentAdmin->delete_Aliment($id);
		redirect('Aliment/get_aliment');
   }

    public function update(){
        $id = $_GET['id'];
        $data['data'] = $this->AlimentAdmin->get_type_plat();
        $data['d'] = $this->AlimentAdmin->get_type_regime();
        $data['da'] = $this->AlimentAdmin->liste($id);
        $this->load->view('admin/Aliment/update',$data);
    }

    public function traitement_update(){
        $id = $_GET['id'];
        $data = array(
            'nom' => $this->input->post('nom'),
            'ingredients' => $this->input->post('ingredients'),
            'prix' => $this->input->post('prix'),
            'plat' => $this->input->post('plat'),
            'regime' => $this->input->post('regime')
        );
        $this->AlimentAdmin->updateAliment($data,$id);
        redirect('Aliment/get_aliment');
    }

}
