<?php
defined('BASEPATH') or exit("No direct access to script");

class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		// $data['assets']['css']	=	["css1.css", "css2.css"];
		// $data['assets']['js']	=	["js1.js", "js2.js"];
		$js_data = [];
		$data['javascript'] = [
			'js'		=>	"Home/partials/home_js",
			'data'		=>	$js_data
		];
		$data['content_view'] = "Home/home_v";
		$this->template->call_admin_template($data);
	}
}