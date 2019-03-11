<?php
  $mysqli = new mysqli('localhost','root','','project1') or die(mysql_error($mysqli));
  $result=array();
  $row=array();
  $states=array();
  $state_name='';
  $str1='';
  $title='';
  $view='';
  $arr=array();
  $articles=array();


  $search = isset($_POST['search']) ? $_POST['search']:'';
  $selection = isset($_POST['selection']) ? $_POST['selection']:'';
  $query = "SELECT articles.id,title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id";
  // $sql="SELECT COUNT(id) FROM articles";
  // $result=$mysqli->query($query)or die($mysqli->error());
  // print_r($result);
  // return;


  if(isset($_POST['search']) && $_POST['search']!='') {
  	$query = "SELECT article.id,title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id WHERE title like '%$search%'";
  } 

  if (isset($_POST['selection']) && $_POST['selection']!='') {
    if($_POST['selection']=="latest"){
         $query = "SELECT title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id  ORDER BY date_of_update DESC LIMIT 10";}
    else if($_POST['selection']=="popularity"){
         $query = "SELECT article.id,title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id  ORDER BY views DESC LIMIT 10";}
       }

  if(isset($_POST['all']) && $_POST['all']!=''){
    if($_POST['all']=="serious"){
         $query = "SELECT title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id where category.type='all' LIMIT 10";}
    else if($_POST['all']=="light"){
         $query = "SELECT title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id where category.type='light' LIMIT 10";}
    else{
         $query = "SELECT title,description,users.uname as user,category.cname as category,no_of_views as views,date_of_update FROM articles join category on articles.cat_id = category.id JOIN users ON articles.user_id = users.id LIMIT 10";}
  }

  if(isset($_POST['id']) && $_POST['id']!='') {
    $id= $_POST['id'];
    $query = "SELECT no_of_views,date_of_update FROM articles WHERE id='$id'";
    $result=$mysqli->query($query)or die($mysqli->error());
    $row=$result->fetch_assoc();
    $views=$row['no_of_views'];
    $views++;

    $query = "UPDATE articles SET no_of_views='$views' where id='$id'";
    $result=$mysqli->query($query)or die($mysqli->error());
    
   // $row=$result->fetch_assoc(); $articles[]=$row; 
   // print_r($articles);
  } 

    

  $result=$mysqli->query($query)or die($mysqli->error());

  if($result->num_rows>0) {
  	while($row=$result->fetch_assoc()){ $articles[]=$row; }
	echo json_encode($articles);
  } else {
  	echo json_encode(array());
  }
?>