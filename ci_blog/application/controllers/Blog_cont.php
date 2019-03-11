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
		$up['data1']=$this->Blog_model->fetch();
		    $this->load->view('blog_view',$up);
	}
	public function insert(){
		 if ($this->input->post('submit')) {
			$data = array(
                'comment' =>$this->input->post('comment'),
					);
		 $this->test->form_insert($data);
		}
	}
	public function post_data($id){
		    $article['data_article']=$this->Blog_model->fetch_article($id);
		    $comment['data_comment']=$this->Blog_model->fetch_comment($id);
            $data = array( 'article' => $article, 'comment' => $comment );
            $this->load->view('article_view',$data);
	}

	public function insert_comm(){
			 $comment = $this->input->post('comment');
			 $article_id = $this->input->post('article_id');
	         $data1 = array(
		        'comment' => $comment,
		        'article_id'=> $article_id
		          );
			// echo "<pre>";
			// print_r($data);
			// return;
		       $this->Blog_model->form_insert($data1);
		       $this->post_data($data1['article_id']);
		}


	
}
?>