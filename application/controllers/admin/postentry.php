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
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . parse_url(base_url() . 'public/upload/', PHP_URL_PATH);

			//$targetFile = $_SERVER['DOCUMENT_ROOT'] . $targetPath . $_FILES['file']['name'];
			$targetFile = $targetPath . $_FILES['file']['name'];
			//header('Location: http://google.com/' . realpath($targetFile));

            //error_log ($tempFile . "\n", 3, "/home/phamtuquy/Web/application/logs/error.log");
            //error_log ($targetFile . "\n", 3, "/home/phamtuquy/Web/application/logs/error.log");
            //error_log ($_SERVER['DOCUMENT_ROOT'] . "\n", 3, "/home/phamtuquy/Web/application/logs/error.log");
            //error_log ("targetPath: " . $targetPath . "\n", 3, "/home/phamtuquy/Web/application/logs/error.log");
            //error_log ($_FILES['file']['name'] . "\n", 3, "/home/phamtuquy/Web/application/logs/error.log");

            //error_log ((is_dir($targetPath) ? "ok path" : "not good path") . "\n", 3, "/home/phamtuquy/Web/application/logs/error.log");

            move_uploaded_file($tempFile, $targetFile);
			//if (move_uploaded_file($tempFile, $targetFile))
			//    error_log ("File moved ok" . "\n", 3, "/home/phamtuquy/Web/application/logs/error.log");
			//else
			//    error_log ("got ERROR" . "\n", 3, "/home/phamtuquy/Web/application/logs/error.log");
			
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
