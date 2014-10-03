<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_val_login extends CI_Model { 

	public function cari_user($username,$password) 
	{ 
		$password=md5($password);
		$this->query = $this->db->query("select  USERNAME, PASSWORD, NAMA, WEWENANG 
										from users 
										where  USERNAME='$username' AND PASSWORD='$password' ");
		return $this->query->row_array(); 
	}

	public function cek_jml_user($username,$password) 	
	{
		$password=md5($password);
		$query = $this->db->query("select USERNAME from users where  USERNAME='$username' AND PASSWORD='$password'");
		return $query->num_rows();
	}	
}