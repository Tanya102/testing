<?php
		  $mysqli = new mysqli('localhost','root','','project1') or die(mysql_error($mysqli));
		  $record=5;
		  $page='';
		  $output='';

		  if(isset($_POST['page'])){  
	      $page = $_POST["page"];  
	 		} else{  
	      $page = 1;  
	        }  

		 $start_from = ($page - 1)*$record_per_page;  
		 $query = "SELECT articles.id,title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id";  
		 $result = mysqli_query($connect, $query); 

		 while($row = mysqli_fetch_assoc($result))  
		 {  
		      $output .= "  
		         <div class='search-result-list'>"+
										"<div class='search-results__body'>"+
					 						"<div class='search-result'>"+
					 							"<div class='row'>"+
					 								"<div class='col-3'>"+
					 									"<img  class='search-result__image' src='https://via.placeholder.com/270x200' alt='meaningful description'>"+
				 									"</div>"+
					 								"<div class='col'>"+
					 									"<div class='search-result__main-info'>"+
					 										"<span class='search-result__date'>"+
				 												"<span class='search-result-field__text' id='date'>"+row['date_of_update']+"</span>"+
				 											"</span>"+
			 												"<span class='search-result__article-type'>"+
			 													"<span class='badge badge-primary' id='category'>"+row['category']+"</span>"+
			 												"</span>"+
				 											"<span class='search-result__author' id='user'>"+"Author:"+row['user']+"</span>"+
				 										"</div>"+
				 										"<h2 class='search-result__title'>"+
					 										"<a href='JavaScript:void(0)' name='title' onclick = 'myfunction("+row['id']+");' class ='single'>"+row['title']+"</a>"+
					 									"</h2>"+
					 									"<div class='search-result__description' id ='description'>"+row['description']+"</div>"+
				 										"<div class='search-result__add-info'>"+
				 											"<span class='search-result__comments-count'>Comments - 1719</span>"+
				 											"<span class='search-result__views-count' id='views'>Views -"+row['views']+ " </span>"+
				 										"</div>"+
				 									"</div>"+
				 								"</div>"+
				 							"</div>"+
				 						"</div>"+
				 					"</div>";   
		 }  
		 
		 $page_query = "SELECT articles.id,title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id";  
		 $page_result = mysqli_query($connect, $page_query);  
		 $total_records = mysqli_num_rows($page_result);  
		 $total_pages = ceil($total_records/$record_per_page);  
		 for($i=1; $i<=$total_pages; $i++)  
		 {  
		      $output .= "<span class='page_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
		 }  
		 $output .= '</div><br /><br />';  
		 echo $output;  
		  
?>