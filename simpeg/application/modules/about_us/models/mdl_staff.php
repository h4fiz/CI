<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_staff extends MX_Controller 
{

	function __construct() 
	{
		parent::__construct();
	}

	function get($order_by)
	{
		$table = "tbl_staff";
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}

	function _insert($data)
	{
		$table = "tbl_staff";
		$this->db->insert($table, $data);
	}

	function get_where($id)
	{
		$table = "tbl_staff";
		$this->db->where('id_staff', $id);
		$query=$this->db->get($table);
		return $query;
	}

	function _update($id, $data)
	{
		$table = "tbl_staff";
		$this->db->where('id_staff', $id);
		$this->db->update($table, $data);
	}

	function _delete($id)
	{
		$this->db->delete('tbl_staff', array('id_staff' => $id)); 

		// Produces:
		// DELETE FROM mytable 
		// WHERE id = $id
	}
}