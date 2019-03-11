<?php
class Blog_model extends CI_Model{

	function fetch(){
	
			        $row = $this->db->select('*')
						->get('articles')->result();
						return $row;
		
	}
}
?>