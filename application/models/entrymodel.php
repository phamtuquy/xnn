<?php

class EntryModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_post()
    {
    	$this->db->order_by('id', 'desc');
        $query = $this->db->get('postentry', 10);
        return $query->result();
    }
	
	function get_next_ten_post($last_msg_id)
    {
    	$this->db->order_by('id', 'desc');
		$this->db->where('id < ' . $last_msg_id);
        $query = $this->db->get('postentry', 10);
        return $query->result();
    }
    
    function get_multiple_by_paging($per_page, $page)
    {
        $start = ($page - 1) * $per_page;
        
        $query = $this->db->query("SELECT * FROM postentry ORDER BY Id DESC LIMIT $start, $per_page");
        return $query->result();
    }
    
    function get_total_count()
    {
        $query = $this->db->query('SELECT count(id) as totalcount FROM postentry');
        return $query -> row() -> totalcount;
    }
    
    function get_by_id($id)
    {
        $query = $this->db->query('SELECT * FROM postentry WHERE id = ' . $id);
        return $query -> row();
    }
	
	function add($entry)
	{
		$this->db->insert('postentry', $entry);
	}

	/*
    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
	 
	 */

}
?>