<?php

defined('BASEPATH') or exit("No direct access script allowed");

class Insurance extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Companies');
		$this->load->library('upload');
	}

	function companies()
	{
		$data['assets']['css'] = [
			"backend/plugins/datatables/media/css/jquery.dataTables.min.css",
			"backend/plugins/datatables/media/css/dataTables.bootstrap.min.css",
			"backend/plugins/sweetalert/sweetalert.css"
		];


		$data['assets']['js'] = [
			"backend/plugins/datatables/media/js/jquery.dataTables.min.js",
			"backend/plugins/datatables/media/js/dataTables.bootstrap.min.js",
			"backend/plugins/sweetalert/sweetalert.min.js"
		];

		$data["javascript"] = [
			'js'	=>	"Settings/partials/insurance_js",
			'data'	=>	NULL
		];

		$data['content_view'] = 'Settings/insurance_v';

		$this->template->call_admin_template($data);
	}

	function getCompanies()
	{
		$column_map = [
			0	=>	'id',
			2	=>	'company_name'
		];

		$search_term = $_GET['search']['value'];
		$limit_start = $_GET['start'];
		$limit_length = $_GET['length'];
		$draw = $_GET['draw'];
		$order_by = $column_map[$_GET['order'][0]['column']];
		$direction = $_GET['order'][0]['dir'];

		$companies = $this->M_Companies->getAllCompanies();
		$total_companies = count($companies);

		if ($search_term != "") {
			$filtered_data = $this->M_Companies->getCompaniesBySearchTerm($search_term);

			$actual_companies_data = $this->M_Companies->getCompaniesByAllParameters($search_term, $order_by, $direction, $limit_start, $limit_length);
		}
		else{
			$companies = $this->M_Companies->getAllCompanies($order_by, $direction, $limit_start, $limit_length);

			$actual_companies_data = $companies;
			$filtered_data = $companies;
		}

		$response_data = array();
		$sanitized_companies_array = array();

		if ($actual_companies_data) {
			$counter = 1;
			foreach ($actual_companies_data as $company) {
				$inner_data = [];
				if ($company->deleted == 0) {
					$delete_string = "<a class = 'delete-company' data-href = '".base_url('Settings/Insurance/deleteCompany/' . $company->id)."'>Delete</a>";
				}
				else
				{
					$delete_string = "<a class = 'restore-company' data-href = '".base_url('Settings/Insurance/restoreComapny/' . $company->id)."'>Restore</a>";
				}

				$inner_data = [
					$counter,
					"<img src = '{$company->company_logo_thumb}'/>",
					$company->company_name,
					$company->company_main_contact,
					$company->company_main_email,
					"<center><a class = 'quick-view' data-href = '".base_url('Settings/Insurance/getCompanyDetails/' . $company->id)."'>Quick View</a>&nbsp;|&nbsp;<a href = '".base_url('Settings/Insurance/editCompany/' . $company->id)."'>Edit</a>&nbsp;|&nbsp;{$delete_string}</center>"
				];

				$sanitized_companies_array[] = $inner_data;

				$counter++;
			}
		}

		$response_data = [
			'draw'				=>	$draw,
			'data'				=>	$sanitized_companies_array,
			'recordsTotal'		=>	$total_companies,
			'recordsFiltered'	=>	count($filtered_data)
		];

		echo json_encode($response_data);
	}

	function addCompany()
	{
		if (!$this->input->post()) {
			$data['assets']['css'] = [
				'backend/plugins/toast/jquery.toast.min.css'
			];

			$data['assets']['js'] = [
				'backend/plugins/toast/jquery.toast.min.js',
				'backend/plugins/jqueryUploadPreview/jquery.uploadPreview.min.js'
			];

			$data["javascript"] = [
				'js'	=>	"Settings/partials/insurance_js",
				'data'	=>	NULL
			];

			$data['content_view'] = 'Settings/add_company_v';

			$this->template->call_admin_template($data);
		}
		else{
			$config = $this->load->config('upload');
			$this->load->library('upload', $config);

			$this->load->library('Thumbnail');

			$thumbnail_path = $this->thumbnail->makeThumbnails($_FILES['image']['name'], $_FILES['image']['tmp_name']);
			if (!$this->upload->do_upload('image'))
			{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);die;
			}
			else
			{
				$upload_data = (object)$this->upload->data();

				$upload_path = $this->config->item('stored_upload_path') . $upload_data->file_name;

				$new_data = [
					'company_name'				=>	$this->input->post('company_name'),
					'company_main_contact'		=>	$this->input->post('company_main_contact'),
					'company_alternate_contact'	=>	$this->input->post('company_alternate_contact'),
					'company_main_email'		=>	$this->input->post('company_main_email'),
					'company_alternate_email'	=>	$this->input->post('company_alternate_email'),
					'company_logo'				=>	$upload_path,
					'company_logo_thumb'		=>	$thumbnail_path,
					'created_by'				=>	1
				];

				$this->M_Companies->addCompany($new_data);

				redirect(base_url('Settings/Insurance/companies'));
			}
		}
	}

	function getCompanyDetails($company_id)
	{
		$company = $this->M_Companies->getCompanyById($company_id);

		if($company):
			$data['company_details'] = $company;
			$page = $this->load->view('Settings/partials/display_insurance_company_v', $data, TRUE);

			$response['type'] = 'success';
			$response['page'] = $page;
		else:
			$response['type'] = "error";
			$response['message'] = "Could not get the company! Please try again";
		endif;

		echo json_encode($response);
	}
}