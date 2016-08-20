<?php
defined('BASEPATH') or exit("No direct access to script");

class M_Template extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getUserDetails($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');

		return $query->row();
	}

	function getUserTypeByUser($type_id)
	{
		$this->db->where('id', $type_id);
		$query = $this->db->get('user_types');

		return $query->row();
	}
	
}