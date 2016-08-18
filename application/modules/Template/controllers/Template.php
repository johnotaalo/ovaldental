<?php
defined('BASEPATH') or exit("No direct access to script");

class Template extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("Assets");
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
			"Events" => [
				"icon"	=>	"fa fa-calendar",
				"link"	=>	"Event/eventlist"
			],
			"Insurance Companies"	=>	[
				"icon"	=>	"fa fa-umbrella",
				"link"	=>	"Settings/Insurance/companies"
			],
			"Users"	=>	[
				"icon"	=>	"fa fa-users",
				"link"	=>	"Account/users"
			]
		];

		$list = "";
		foreach ($sidebar_items as $item => $detail) {
			$list .= "<li><a href = '".base_url($detail['link'])."'><i class = '{$detail['icon']}'></i> <span>{$item}</span></a></li>";
		}

		$data['sidebar_items'] = $list;
		$sidebar = $this->load->view("Template/backend_sidebar", $data, TRUE);

		return $sidebar;
	}
}