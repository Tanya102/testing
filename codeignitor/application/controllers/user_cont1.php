<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Cont1 extends CI_Controller {
	function __construct() {
	    parent:: __construct();
	    $this->load->helper('url');
	    $this->load->database();
	    $this->load->model('user_model');
  	}
	public function index() {
		$this->load->view('user_view');
		
	}
	public function user($user=0){
		//echo $user;
		//return;
		if ($this->input->post('Register')) {
			$data = array(

				'username' =>$this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);}
		if($user==0){
			$result['data'] = $this->user_model->form_insert($data);
			if($result) {
				$this->load->view('user_view',$result);
			}
		}
		else{
			$data['id']=$user;
               $this->user_model->update($data);
				$up['data']=$this->user_model->fetch();
				$this->load->view('user_view',$up);
			}
		}
		public function delete($id){
			
			$this->user_model->delete($id);
			$del['data']=$this->user_model->fetch();
			$this->load->view('user_view',$del);
		}

		public function update($id) {
			    $up['data1']=$this->user_model->fetch($id);
				$this->load->view('user_view',$up);

		}

		
	}
?>