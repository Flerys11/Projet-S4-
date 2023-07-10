<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function create_user($username, $email, $password) {
		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $password,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('users', $data);
	}
	
	public function resolve_user_login($email, $password) {
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$id = $this->db->get()->row('id');
		if (!empty($id)) {
			return true;
		}
		return false;
	}

	public function get_user_id_from_email($email) {
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email', $email);

		return $this->db->get()->row('id');
		
	}
	
	public function get_user($user_id) {
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
	}
	
	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}
	
	private function verify_password_hash($password, $hash) {
		return password_verify($password, $hash);
	}

	public function is_admin($id){
		$this->db->from('users');
		$this->db->where('id', $id);
		$user = $this->db->get()->row();
		if ($user->is_admin == 1) {
			return true;
		}
		return false;
	}
	
}
