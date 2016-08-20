<?php
defined('BASEPATH') or exit("No direct access to script");

class Template extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("Assets");
		$this->load->model('Template/M_Template');
	}

	public function call_admin_template($data = array())
	{
		if (isset($data['content_view'])) {
			
			if(isset($data['assets']['css'])):
				$data['css']		=	$this->appendCss($data['assets']['css']);
			endif;

			if(isset($data['assets']['js'])):
				$data['js']			=	$this->appendJs($data['assets']['js']);
			endif;

			if(isset($data['javascript'])):
				$data['javascript']	=	$this->addJavascript($data['javascript']);
			endif;

			$data['sidebar'] = $this->getsidebar();
			
			$this->load->view('Template/backend_template_v', $data);
		}
	}

	private function appendCss($assets)
	{
		$css_links = "";

		foreach ($assets as $asset) {
			if(is_array($asset))
				$css_links .= "<link rel='stylesheet' type='text/css' href='{$asset['link']}' />\r\n";
			else
				$css_links .= "<link rel='stylesheet' type='text/css' href='".$this->config->item('assets_url') . $asset."' />\r\n";
		}

		return $css_links;
	}

	private function appendJs($assets)
	{
		$js_links = "";

		foreach ($assets as $asset) {
			if(is_array($asset))
				$js_links .= "<script src = '{$asset['link']}'></script>\r\n";
			else
				$js_links .= "<script src = '" . $this->config->item('assets_url') . $asset . "'></script>\r\n";
		}

		return $js_links;
	}

	private function addJavascript($view)
	{
		$link_page = $this->load->view($view['js'], $view['data'], TRUE);

		return $link_page;
	}

	private function getsidebar()
	{
		$sidebar_items = [
			"Events" 				=> [
				"icon"	=>	"fa fa-calendar",
				"link"	=>	"Event/eventlist",
				"users"	=>	[2]
			],
			"Insurance Companies"	=>	[
				"icon"	=>	"fa fa-umbrella",
				"link"	=>	"Settings/Insurance/companies",
				"users"	=>	[2]
			],
			"Users"					=>	[
				"icon"	=>	"fa fa-users",
				"link"	=>	"Account/users",
				"users"	=>	[2]
			],
			"Patients"				=>	[
				"icon"	=>	"ion ion-android-people fa-2x",
				"link"	=>	"Patients/all",
				"users"	=>	[3]
			],
			"Appointments"			=>	[
				"icon"	=>	"fa fa-clock-o",
				"link"	=>	"Appointments/all",
				"users"	=>	[3]
			]
		];

		$user_details = $this->M_Template->getUserDetails($this->session->userdata('user_id'));
		if ($user_details) {
			$user_type = $this->M_Template->getUserTypeByUser($user_details->user_type_id);
			$list = "";
			foreach ($sidebar_items as $item => $detail) {
				if (in_array($user_details->user_type_id, $detail['users'])) {
					$list .= "<li><a href = '".base_url($detail['link'])."'><i class = '{$detail['icon']}'></i> <span>{$item}</span></a></li>";
				}
			}
			$data['user_role'] = $user_type->user_type;
			$data['sidebar_items'] = $list;
			$sidebar = $this->load->view("Template/backend_sidebar", $data, TRUE);

			return $sidebar;
		}
		else
		{
			redirect(base_url() . 'Account/Auth/signin');
		}
	}
}