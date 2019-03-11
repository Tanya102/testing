<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Cont extends CI_Controller {

	public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('user_model');
			$this->load->database();

    }

    public function index(){
			$this->load->view('user_view');
			if($this->input->post()){
                $status = $this->insertion();
				if($status){
					$this->fetch();
		    }
		}
	}

    public function insertion(){
		    $data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
				);
			if($this->user_model->form_insert($data)){
				return true;}else{
				return false;}
        }
     public function fetch(){
	    	    echo "<pre>";
				print_r($this->user_model->getreq());
	}

		
}

	

	

?>
