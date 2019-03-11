<?php
  $mysqli = new mysqli('localhost','root','','blogcollection') or die(mysql_error($mysqli));
$state_id='';
$result=array();
$row=array();


$search = isset($_POST['search']) ? $_POST['search']:'';
$result=$mysqli->query("SELECT title,description,user.name as user,category.name as category,views as views,date_of_update FROM article join category on article.cat_id = category.id JOIN user ON article.user_id = user.id WHERE title = '$search'")or die($mysqli->error());
while($row=$result->fetch_assoc()){
  $search[]=$row;}
  echo json_encode($search);
?>		
	}
