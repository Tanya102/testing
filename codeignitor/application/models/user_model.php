<?php
class User_Model extends CI_Model{

	function form_insert($data){
		if($this->db->insert('registration', $data)) {
			$data = $this->fetch();
			return $data;
		} else {
			return false;
		}

		}

	function fetch($id = 0){
		if ($id == 0) {
			        $row = $this->db->select('*')
						->get('registration')->result();
					return $row;
		} else {
			        $row = $this->db->select('*')
                        ->where('id',$id)
						->get('registration')->row();
		
			return $row;
		
	}}
	function delete($id){
		$this->db->where('id',$id)
		            ->delete('registration');}

	function update($update){
		$this->db->where('id',$update['id'])
		                 ->update('registration',$update);

	}
}
?>