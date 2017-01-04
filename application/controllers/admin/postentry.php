<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class PostEntry extends adminController {

	public function index() {

	}

	public function newentry() {

		if (!empty($_FILES)) {

			$tempFile = $_FILES['file']['tmp_name'];

			$targetPath = $_SERVER['DOCUMENT_ROOT'] . parse_url(base_url() . 'public/upload/', PHP_URL_PATH);
			$thumbPath = $_SERVER['DOCUMENT_ROOT'] . parse_url(base_url() . 'public/upload/small/', PHP_URL_PATH);
			
			$targetFile = $targetPath . $_FILES['file']['name'];
			$thumbFile = $thumbPath . $_FILES['file']['name'];
			
			move_uploaded_file($tempFile, $targetFile);
            
			$image_size = getimagesize($targetFile);
			$image_width = $image_size[0];
			$image_height = $image_size[1];

			if ($image_width > $image_height)
			{
				$new_width = 800;
				$new_height = $image_height * (800 / $image_width);
			}
			else
			{
				$new_width = $image_width * (800 / $image_height);
				$new_height = 800;
			}
            
			$this->createThumbnail($targetFile, $thumbFile, $new_width, $new_height, false);
			
			$this->load->model('entrymodel');
			
			$entry = array (
				'caption' => basename($targetFile),
				'imageurl' => basename($targetFile),
				'originalimageurl' => basename('original/' . $targetFile),
				'userid' => '0',
				'like' => 0,
				'comment' => 0,
				'postdate' => date('Y-m-d H:i:s'),
				'status' => 1
			);
			
			$this->entrymodel->add($entry);

		} else {
			$this -> loadView('admin/entry/newentry');
		}
	}
	
	public function genallthumb()
	{
		return;
		$targetPath = '/home/xnn/public_html/public/upload/';
		$thumbPath = '/home/xnn/public_html/public/upload/small/';
			
		$files = scandir($targetPath);
		//var_dump($files);
		foreach ($files as $file )
		{

			if ($file == '.') continue;
			if ($file == '..') continue;

			if (file_exists($thumbPath . $file))
			{
				continue;
			}

			if (!file_exists($targetPath . $file))
			{
				echo 'skip: ' . $targetPath . $file;
				continue;
			}

			
			$image_size = getimagesize($targetPath . $file);
			
			$image_width = $image_size[0];
			$image_height = $image_size[1];
			
			if ($image_width > $image_height)
			{
				$new_width = 800;
				$new_height = $image_height * (800 / $image_width);
			}
			else
			{
				$new_width = $image_width * (800 / $image_height);
				$new_height = 800;
			}
			
			echo '<br>';
			
			$this->createThumbnail($targetPath . $file, $thumbPath . $file, $new_width, $new_height, false);
		}
	}
	
	public function test()
	{
		return;
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . parse_url(base_url() . 'public/upload/', PHP_URL_PATH);
		$thumbPath = $_SERVER['DOCUMENT_ROOT'] . parse_url(base_url() . 'public/upload/small/', PHP_URL_PATH);
			
		$targetFile = $targetPath . '9651978558_7841aa6484_o.jpg';
		$thumbFile = $thumbPath . '9651978558_7841aa6484_o.jpg';

		echo $targetFile;
		echo '<br>';
		echo $thumbFile;
		
		$image_size = getimagesize($targetFile);
		var_dump($image_size);
		
        $image_width = $image_size[0];
        $image_height = $image_size[1];
            
        if ($image_width > $image_height)
        {
        	$new_width = 800;
        	$new_height = $image_height * (800 / $image_width);
		}
		else
		{
			$new_width = $image_width * (800 / $image_height);
			$new_height = 800;
		}
        
        echo 'uhuhuh<br>';
        
		$this->createThumbnail($targetFile, $thumbFile, $new_width, $new_height, false);
	}
	
	private function createThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $background=false) 
	{
		//list($original_width, $original_height, $original_type) = getimagesize($filepath);
		$image_size = getimagesize($filepath);
		$original_width = $image_size[0];
		$original_height = $image_size[1];
		$original_type = $image_size[2];
		if ($original_width > $original_height) 
		{
		    $new_width = $thumbnail_width;
		    $new_height = intval($original_height * $new_width / $original_width);
		} 
		else 
		{
		    $new_height = $thumbnail_height;
		    $new_width = intval($original_width * $new_height / $original_height);
		}
		
		$dest_x = intval(($thumbnail_width - $new_width) / 2);
		$dest_y = intval(($thumbnail_height - $new_height) / 2);
		
		if ($original_type === 1) 
		{
		    $imgt = "ImageGIF";
		    $imgcreatefrom = "ImageCreateFromGIF";
		} 
		else if ($original_type === 2) 
		{
		    $imgt = "ImageJPEG";
		    $imgcreatefrom = "ImageCreateFromJPEG";
		} 
		else if ($original_type === 3) 
		{
		    $imgt = "ImagePNG";
		    $imgcreatefrom = "ImageCreateFromPNG";
		} 
		else 
		{
		    return false;
		}
		echo 'den day';
		$old_image = $imgcreatefrom($filepath);
		$new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height); // creates new image, but with a black background
		
		// figuring out the color for the background
		if(is_array($background) && count($background) === 3) 
		{
		  list($red, $green, $blue) = $background;
		  $color = imagecolorallocate($new_image, $red, $green, $blue);
		  imagefill($new_image, 0, 0, $color);
		// apply transparent background only if is a png image
		} 
		else if ($background === 'transparent' && $original_type === 3) 
		{
		  imagesavealpha($new_image, TRUE);
		  $color = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
		  imagefill($new_image, 0, 0, $color);
		}
		
		
		imagecopyresampled($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
		$imgt($new_image, $thumbpath);
		return file_exists($thumbpath);
	}
}
