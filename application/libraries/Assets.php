<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Assets
{

	function addCss($css_link, $external = FALSE)
	{
		echo $css_link . "<br/>";
	}
}