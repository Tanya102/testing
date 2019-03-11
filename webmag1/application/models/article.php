<?php
class Article extends CI_Model{
	


	function get_latest_article($limit=7, $offset=0){
		 $row = $this->db->select('*') 
		                 -> limit($limit)
		                 -> offset($offset)
		                 ->order_by("submit_date", "desc")
						 ->get('article')->result();
						return $row;
		}

    function get_promoted_article($limit=2, $offset=0){
		$row = $this->db->select('*') 
		                 -> limit($limit)
		                 -> offset($offset)
		                 ->order_by("views", "desc")
						->get('article')->result();
						return $row;
		}
	function get_selected_article($id){
		$row = $this->db->select('*') 
		                 ->where('id',$id)
						->get('article')->row();
						return $row;
	}
	function get_category_article($cat,$limit=3, $offset=0){
		$row = $this->db->select('*') 
		                 ->where('category',$cat)
		                 -> limit($limit)
		                 -> offset($offset)
						->get('article')->result();
						return $row;
	}
	function get_comments($id){
		$row = $this->db->select('*') 
		                 ->where('article_id',$id)
						->get('comment')->result();
						return $row;
	}
	function insert_comments($data){
		$this->db->insert('comment',$data);
	}



	
	
}
?>