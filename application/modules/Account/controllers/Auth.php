<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Auth extends MX_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('Account/M_Auth');
	}

	function signin()
	{
		if(!$this->input->post() || !$this->input->post('email_address'))
		{
			$this->session->sess_destroy();

			$this->load->view('Account/signin');
		}
		else{

			$post_data = $this->input->post();

			$email_address = $post_data['email_address'];
			$password = $post_data['password'];

			$user = $this->M_Auth->findUser('username', $email_address);

			if ($user == FALSE) {
				$_SESSION['error'] = 'Username or password is wrong! Please try again!';
			}
			else
			{
				if($user->user_is_active != 1)
				{
					$_SESSION['error'] = 'Please make sure you activate your account before signing in!';
				}
				else
				{
					$decrypted_password = $this->encryption->decrypt($user->password);
					if ($decrypted_password != $password) {
						$_SESSION['error'] = 'Username or password is wrong! Please try again';
					}
					else
					{
						$staff = $this->M_Auth->findStaffByUserId($user->id);

						if ($staff == NULL) {
							$_SESSION['error'] = 'Could not determine your identity. Contact your Administrator.';
						}
						else
						{
							$user_data = array(
								'user_id'		=>	$user->id,
								'staff_name'	=>	$staff->staff_firstname . ' ' . $staff->staff_lastname,
								'logged_in'		=>	1
							);

							$this->session->set_userdata($user_data);
						}
					}
				}
			}

			if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
				$_SESSION['username'] = $email_address;
				$this->session->mark_as_flash(['username', 'error']);
				redirect(base_url() . 'Account/Auth/signin');
			}
			else
			{
				redirect(base_url() . 'Home');
			}
		}
	}
	function checksignin()
	{
		$logged_in = $this->session->userdata('logged_in');

		if($logged_in == false):
			redirect(base_url() . 'Account/Auth/signin');
		else:
			return true;
		endif;
	}

	function signout()
	{
		redirect(base_url() . 'Account/Auth/signin');
	}
}
