<?php
defined("BASEPATH") or exit("No direct access script allowed");

use Model\User\Types as Usertypes;
use Model\Staff;
use Model\Users;

class Account extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function users()
	{
		$staff = Staff::all();
		$user_data_table = [];
		if ($staff) {
			$counter = 1;
			foreach ($staff as $member) {
				$user = Users::first($member->staff_user_id);
				// echo "<pre>";print_r($user);
				$user_type = $status = "Not Defined";
				if ($user) {
					$user_type = Usertypes::first($user->user_type_id)->user_type;
					echo $user->user_type_id . "<br/>";
					if($user->user_is_active == 1):
						$status = "<a href = '#' class = 'label label-success'>Active</a>";
					else:
						$status = "<a href = '#' class = 'label label-danger'>Deactivated</a>";
					endif;
				}
				$user_data_table[] = [
					$counter,
					$member->staff_firstname,
					$member->staff_lastname,
					$user_type,
					$member->staff_emailaddress,
					$member->staff_phonenumber,
					"TBA",
					$status,
					"<a href = '".base_url('Account/edituser/' . $member->uuid)."'><i class = 'fa fa-pencil'></i> Edit</a> | <a href = '#'><i class = 'fa fa-trash-o'></i> Delete</a>"
				];
				$counter++;
			}
			die;
		}

		

		$data['assets']['css'] = [
			"backend/plugins/datatables/media/css/jquery.dataTables.min.css",
			"backend/plugins/datatables/media/css/dataTables.bootstrap.min.css"
		];


		$data['assets']['js'] = [
			"backend/plugins/datatables/media/js/jquery.dataTables.min.js",
			"backend/plugins/datatables/media/js/dataTables.bootstrap.min.js"
		];

		$data['javascript'] = [
			"js"	=>	"Account/partials/users",
			"data"	=>	[
						"users_data"	=>	 json_encode($user_data_table)
			]
		];

		$data['user_types_select'] = $this->createUserTypesSelect();

		$data['content_view'] = "Account/users_list_v";

		$this->template->call_admin_template($data);
	}

	function createuser()
	{
		$data['genders'] = $this->createGenderSelect();
		$data['user_types'] = $this->createUserTypesSelect();
		$data['content_view'] = 'Account/create_user_account_v';
		$this->template->call_admin_template($data);
	}

	function edituser($uuid)
	{
		if($this->input->post()):
			$staff = Staff::find_by_uuid($uuid, FALSE);
			if ($staff) :
				$staff->staff_firstname = $this->input->post('staff_firstname');
				$staff->staff_lastname = $this->input->post('staff_lastname');
				$staff->staff_othernames = $this->input->post('staff_othernames');
				$staff->staff_emailaddress = $this->input->post('staff_emailaddress');
				$staff->staff_phonenumber = $this->input->post('staff_phonenumber');
				$staff->staff_gender = $this->input->post('staff_gender');

				$staff->updated = date('Y-m-d H:i:s');

				$user = Users::first($staff->id);

				$user->user_type_id = $this->input->post("staff_user_type");

				$user->save();

				$staff->save();

				redirect(base_url('Account/edituser/' . $uuid));
			else:
				die("There was an error updating user details. Please try again!");
			endif;
		else:
			$staff = Staff::find_by_uuid($uuid, FALSE);
			if (count($staff) == 1) :
				$user = Users::first($staff->staff_user_id);
				if($user):
					$data['user_details'] = $staff;
					$data['user_types'] = $this->createUserTypesSelect($user->user_type_id);
					$data['genders'] = $this->createGenderSelect($staff->staff_gender);
					$data['content_view'] = 'Account/create_user_account_v';

					$this->template->call_admin_template($data);
				endif;
			endif;
		endif;
	}

	function adduser()
	{
		if ($this->input->post()) {

			// echo "<pre>";print_r($this->mailer);die;
			$this->load->library('Uuid');
			$this->load->library('Hashing');

			$password = $this->hashing->randomnumberpassword();

			$user = new Users();

			$user->uuid = $this->uuid->v4();
			$user->username = $this->input->post('staff_emailaddress');
			$user->password = $this->encryption->encrypt($password);
			$user->user_type_id = $this->input->post('staff_user_type');
			$user->user_is_active = 0;
			$user->active_hash = $this->hashing->createActivationHash();

			$user->save();

			$user_id = Users::last_created()->id;

			$staff = new Staff();

			$staff->staff_firstname = $this->input->post('staff_firstname');
			$staff->staff_lastname = $this->input->post('staff_lastname');
			$staff->staff_othernames = $this->input->post('staff_othernames');
			$staff->staff_emailaddress = $this->input->post('staff_emailaddress');
			$staff->staff_phonenumber = $this->input->post('staff_phonenumber');
			$staff->staff_gender = $this->input->post('staff_gender');
			$staff->uuid = $this->uuid->v4();
			$staff->staff_user_id = $user_id;

			$staff->save();

			$data = [
				"firstname"	=>	$this->input->post('staff_firstname'),
				"lastname"	=>	$this->input->post('staff_lastname'),
				"password"	=>	$password
			];

			$body = $this->load->view('mailing/account_created_v', $data, TRUE);

			$message['subject'] = "Welcome On Board";

			$message['body'] = $body;

			$sender = [
				'email'	=>	"accounts@ovaldental.com",
				'name'	=>	"Oval Dental Account"
			];

			$recepient = [
				'email'	=>	$this->input->post('staff_emailaddress'),
				'name'	=>	$this->input->post('staff_firstname') . " " . $this->input->post('staff_lastname')
			];

			$response = $this->mailer->sendmail($sender, $recepient, $message);

			if ($response['type'] == FALSE) {
				
			}
			else
			{
				redirect(base_url('Account/users'));
			}
		}
	}

	//	Common create functions

	function createUserTypesSelect($selected = NULL)
	{
		// echo $selected;die;
		$user_types = Usertypes::all();
		$user_types_select = "";

		if ($user_types) {
			foreach ($user_types as $type) {
				if(isset($selected) && $selected == $type->id):
					$user_types_select .= "<option value = '{$type->id}' selected>{$type->user_type}</option>";
				else:
					$user_types_select .= "<option value = '{$type->id}'>{$type->user_type}</option>";
				endif;
			}
		}

		return $user_types_select;
	}

	function createGenderSelect($selected = NULL)
	{
		$gender = ['Male', 'Female', 'Both'];

		$gender_select = "";
		foreach ($gender as $sex) {
			if(isset($selected) && $selected == $sex):
				$gender_select .= "<option value = '{$sex}' selected>{$sex}</option>";
			else:
				$gender_select .= "<option value = '{$sex}'>{$sex}</option>";
			endif;
		}

		return $gender_select;
	}
}