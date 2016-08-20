<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{
	function __construct()
	{
		parent::__construct();

		//load the common modules here
		$this->load->module([
			"Template",
			"Account/Auth"
		]);

		$this->auth->checksignin();
	}
}