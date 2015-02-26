<?php
class MY_Controller extends CI_Controller{
	public $template = null;
	public $title = null;
	
	public function __construct(){
		parent::__construct();
		
		if(is_null($this->template)){
            $this->template = 'layouts/master_page';
        }
		
		if(is_null($this->title)){
            $this->title = 'Xinh nhẹ nhàng';
        }
	}
	
	public function loadView($view, $data = null, $v = false){
		$data['content'] = $view;
		$data['title'] = $this->title;
		$this->load->view($this->template, $data, $v);
	}
	
}