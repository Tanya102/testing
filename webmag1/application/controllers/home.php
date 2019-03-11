<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
     function __construct() {
	    parent:: __construct();
	    $this->load->database();
	    $this->load->model('article');
  	}
	
	 public function index() {
	    $data['main_view'] = 'home_view';
	    $data['latest_articles'] = $this->article->get_latest_article();
	    $data['promoted_articles'] = $this->article->get_promoted_article();
	    $data['most_read'] = $this->article->get_promoted_article(4,3);
        $this->load->view('master', $data);
	}
	
     public function show_article($id) {
		 $data['main_view'] = 'show_article';
		 $data['latest_articles'] = $this->article->get_latest_article();
		 $data['selected_article'] = $this->article->get_selected_article($id);
		 $data['promoted_articles'] = $this->article->get_promoted_article();
	     $data['most_read'] = $this->article->get_promoted_article(4,0);
         $data['comments'] = $this->article->get_comments($id);

         $this->load->view('master', $data);
		}
	public function category($cat) {
		 $data['main_view'] = 'category';
		 $data['latest_articles'] = $this->article->get_latest_article();
		 $data['category_articles'] = $this->article->get_category_article($cat);
		 $data['most_read'] = $this->article->get_promoted_article(4,0);

         $this->load->view('master', $data);
		}

    public function contacts() {
		 $data['main_view'] = 'contacts';
		  $data['latest_articles'] = $this->article->get_latest_article();
         $this->load->view('master', $data);
		}
	public function about_us(){
		 $data['main_view'] = 'about_us';
		  $data['latest_articles'] = $this->article->get_latest_article();
          $data['most_read'] = $this->article->get_promoted_article(4,0);
         $this->load->view('master', $data);
		}
	public function insert(){
		 if ($this->input->post()) {
		    $user_name = $this->input->post('user_name');
		    $email = $this->input->post('email');
		    $website = $this->input->post('website');
            $comment = $this->input->post('comment');
			$article_id = $this->input->post('article_id');
            $data = array( 'user_name' => $user_name,'email' => $email,'comment' => $comment ,'website'=> $website, 'article_id' => $article_id );
            
            $this->article->insert_comments($data);
           
        }
    }
	
		
}

?>