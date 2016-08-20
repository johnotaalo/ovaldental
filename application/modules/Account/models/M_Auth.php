<?php

defined("BASEPATH") or exit("No direct script access alloweds");

class M_Auth extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function findUser($identifier, $value)
	{
		if ($identifier!= NULL && $value != NULL) {
			$this->db->where($identifier, $value);

			$query = $this->db->get('users');

			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function findStaffByUserId($user_id)
	{
		$this->db->where('staff_user_id', $user_id);
		$query = $this->db->get('staff');

		return $query->row();
	}
}