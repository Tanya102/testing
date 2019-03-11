<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_page extends CI_Controller {
     function __construct() {
	    parent:: __construct();
	    $this->load->helper('url');
	    $this->load->database();
	    // $this->load->model('Blog_model');
  	}
	
	 public function index() {
	    $this->load->view('header_view');
	    $this->load->view('body_view');
	    $this->load->view('footer_view');
	}
}
?>