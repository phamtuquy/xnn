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
		$this->load->model('entrymodel');
		
		$total_count = $this->entrymodel->get_total_count();
		$number_per_page = 50;
		
		$this->load->library('pagination');
		
		$open_tag = '<div class=paging_link_box>';
		$close_tag = "</div>";
		
		$config['total_rows'] = $total_count;
		$config['per_page'] = $number_per_page;
		$config['base_url'] = '/tuyet/';
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;
		
		$config['first_link'] = 'Đầu';
		$config['last_link'] = 'Cuối';
		$config['full_tag_open'] = '<div class=paging_container>';
		$config['full_tag_close'] = '</div>';
		
		$config['num_tag_open'] = $config['first_tag_open'] = $config['last_tag_open']
			= $config['next_tag_open'] = $config['prev_tag_open'] = $open_tag;
		$config['num_tag_close'] = $config['first_tag_close'] = $config['last_tag_close']
			= $config['next_tag_close'] = $config['prev_tag_close'] = $close_tag;
		
		$config['cur_tag_open'] = '<div class=paging_cur_box>';
		$config['cur_tag_close'] = '</div>';

		$this->pagination->initialize($config);

		$data["pagination"] = $this->pagination->create_links();
		
		$data["postentry"] = $this->entrymodel->get_multiple_by_paging($config['per_page'], $page);
		
		$this->loadView('entry/multiple', $data);
	}
}
