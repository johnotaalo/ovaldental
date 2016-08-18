<?php

defined("BASEPATH") or exit("No direct access script allowed");

class M_Account extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getUserType($user_type_id)
	{
		$this->db->where('id', $user_type_id);

		$query = $this->db->get('user_types');

		return $query->row();
	}

	function getAllUsers()
	{
		$query = $this->db->get('users');

		return $query->result();
	}

	function getUserById($id)
	{
		$this->db->where('id', $id);

		$query = $this->db->get('users');

		return $query->row();
	}
}