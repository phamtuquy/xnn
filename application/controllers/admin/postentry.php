<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class PostEntry extends adminController {

	public function index() {

	}

	public function newentry() {

		if (!empty($_FILES)) {

			$tempFile = $_FILES['file']['tmp_name'];

			//$targetPath = dirname(__FILE__) . base_url() . 'public/upload/';
			$targetPath = base_url() . 'public/upload/';

			$targetFile = $_SERVER['DOCUMENT_ROOT'] . $targetPath . $_FILES['file']['name'];
			//header('Location: http://google.com/' . realpath($targetFile));

			move_uploaded_file($tempFile, $targetFile);
			
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

}
