<?php
  $mysqli = new mysqli('localhost','root','','blogcollection') or die(mysql_error($mysqli));
  $result=array();
  $row=array();
  $states=array();
  $state_name='';
  $str1='';
  $arr=array();
  $search = isset($_POST['search']) ? $_POST['search']:'';

  $query = "SELECT title,description,user.user_name as user,category.cat_name as category,views,date_of_update FROM article join category on article.cat_id = category.id JOIN user ON article.user_id = user.id";

  if(isset($_POST['search']) && $_POST['search']!='') {
  	$query = "SELECT title,description,user.user_name as user,category.cat_name as category, views,date_of_update FROM article join category on article.cat_id = category.id JOIN user ON article.user_id = user.id WHERE title like '%$search%'";
  } 

  $result=$mysqli->query($query)or die($mysqli->error());
  if($result->num_rows>0) {
  	while($row=$result->fetch_assoc()){ $articles[]=$row; }
	echo json_encode($articles);
  } else {
  	echo json_encode(array());
  }
?>
...............................................................................................

