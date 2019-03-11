<?php
class Blog_model extends CI_Model{

	function fetch(){
			 $row = $this->db->select('*')
						->get('articles')->result();
						return $row;
		
	}
	function fetch_article($id){
	     	$row = $this->db->select('*')
					    ->where('id',$id)
						->get('articles')->row();
						return $row;
			}
    function fetch_comment($id){
			$row = $this->db->select('*')
		                ->where('id',$id)
						->get('comment')->result();
						return $row;
	}
	function form_insert($data){
			$row=$this->db->insert('comment', $data);
			           }
}
?>