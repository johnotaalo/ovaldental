<?php

defined("BASEPATH") or exit("No direct access allowed for this script");

class M_Companies extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function getAllCompanies($order_by = NULL, $direction = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		if($order_by != NULL || $direction != NULL || $limit_start != NULL || $limit_length != NULL){
			$sql = "SELECT * FROM insurance_company ORDER BY {$order_by} {$direction} LIMIT {$limit_start}, {$limit_length}";

			$query = $this->db->query($sql);
		}
		else
		{
			$query = $this->db->get('insurance_company');
		}

		return $query->result();
	}

	function getCompaniesBySearchTerm($search_term)
	{
		$sql = "SELECT * FROM insurance_company
		WHERE company_name LIKE '%{$search_term}%'
		OR company_main_contact LIKE '%{$search_term}%'
		OR company_alternate_contact LIKE '%{$search_term}%'
		OR company_main_email LIKE '%{$search_term}%'
		OR company_alternate_email LIKE '%{$search_term}%'";

		$query = $this->db->query($sql);

		return $query->result();
	}

	function getCompaniesByAllParameters($search_term, $order_by, $direction, $limit_start, $limit_length)
	{
		$sql = "SELECT * FROM insurance_company
		WHERE company_name LIKE '%{$search_term}%'
		OR company_main_contact LIKE '%{$search_term}%'
		OR company_alternate_contact LIKE '%{$search_term}%'
		OR company_main_email LIKE '%{$search_term}%'
		OR company_alternate_email LIKE '%{$search_term}%'
		ORDER BY {$order_by} {$direction}
		LIMIT {$limit_start}, {$limit_length}";

		$query = $this->db->query($sql);

		return $query->result();
	}

	function addCompany($new_data)
	{
		return $this->db->insert('insurance_company', $new_data);
	}

	function getCompanyById($company_id)
	{
		$this->db->where('id', $company_id);
		$query = $this->db->get('insurance_company');

		return $query->row();
	}
}