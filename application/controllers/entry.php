<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entry extends userController {

	public function index($action = null, $last_msg_id = null)
	{
		if ($action != null || $this->input->post())
		{
			$last_msg_id = $last_msg_id + 1;
			$data['last_msg_id'] = $last_msg_id;
			
			$this->load->model('entrymodel');
			$data['nextentries'] = $this->entrymodel->get_next_ten_post($last_msg_id);
			
			$this->load->view('entry/loadcontinuous', $data);
		}
		else {
			$this->load->model('entrymodel');

        	$data['firstentries'] = $this->entrymodel->get_last_ten_post();
			$this->loadView('entry/index', $data);	
		}
	}
	
	public function view($id = null)
	{
	    $this->load->model('entrymodel');
	    
	    $data["postentry"] = $this->entrymodel->get_by_id($id);
	    
	    $this->loadView('entry/view', $data);
	}
	
	public function zoom($id = null)
	{
	    $this->load->model('entrymodel');
	    
	    $data["postentry"] = $this->entrymodel->get_by_id($id);
	    
	    $this->load->view('entry/zoom', $data);
	}
	
	public function multiple($page = null)
	{
		$this->load->library('pagination');

		$config['total_rows'] = 200;
		$config['per_page'] = 20;

		$this->pagination->initialize($config);

		$data["pagination"] = $this->pagination->create_links();
		
		$this->load->model('entrymodel');
		
		$data["postentry"] = $this->entrymodel->get_multiple_by_paging($page);
		
		$this->loadView('entry/multiple', $data);
		
		
	}
}
