<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_aboutus extends MX_Controller 
{

	function __construct() 
	{
		parent::__construct();
	}

	function _insert($data)
	{
		$table = "tbl_info_service";
		$this->db->insert($table, $data);
	}

	function get_where($id)
	{
		$table = "tbl_info_service";
		$this->db->where('id', $id);
		$query=$this->db->get($table);
		return $query;
	}

	function _update($id, $data)
	{
		$table = "tbl_info_service";
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}
}