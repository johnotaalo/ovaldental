<?php

class Thumbnail
{
	function makeThumbnails($filename, $temp_name)
	{
		$final_width_of_image = 100;
		$path_to_thumbs_directory = './uploads/thumbs/';
		$stored_path = base_url() . 'uploads/thumbs/';
		if(preg_match('/[.](jpg)$/', $filename)) {
			$im = imagecreatefromjpeg($temp_name);
		} else if (preg_match('/[.](gif)$/', $filename)) {
			$im = imagecreatefromgif($temp_name);
		} else if (preg_match('/[.](png)$/', $filename)) {
			$im = imagecreatefrompng($temp_name);
		}

		$ox = imagesx($im);
		$oy = imagesy($im);

		$nx = $final_width_of_image;
		$ny = floor($oy * ($final_width_of_image / $ox));

		$nm = imagecreatetruecolor($nx, $ny);

		imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);

		if(!file_exists($path_to_thumbs_directory)) {
			if(!mkdir($path_to_thumbs_directory)) {
				die("There was a problem. Please try again!");
			} 
		}

		imagejpeg($nm, $path_to_thumbs_directory . $filename);
		
		return $stored_path . $filename;
	}
}