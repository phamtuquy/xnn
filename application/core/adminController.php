<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class adminController extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$template = 'layouts/master_admin';
	}
}
?>