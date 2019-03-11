<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_cont extends CI_Controller {
     function __construct() {
	    parent:: __construct();
	    $this->load->helper('url');
	    $this->load->database();
	    $this->load->model('Blog_model');
  	}
	
	 public function index() {
		$this->load->view('blog_view');
		
	
	}
	public function user(){
		    $up['data1']=$this->blog_model->fetch();
		    $this->load->view('blog_view',$up);
		    }

	
}
?>