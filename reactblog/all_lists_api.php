<?php
$mysqli = new mysqli('localhost','root','','blogcollection') or die(mysql_error($mysqli));

$result=array();
$row=array();
$articles=array();
$users=array();
$categories=array();
$user_id='';
$cat_id='';
$arr=array();



$result=$mysqli->query("SELECT title,description,user.user_name,category.cat_name,views,date_of_update FROM article join category on article.cat_id = category.id JOIN user ON article.user_id = user.id");
while($row=$result->fetch_assoc()){
    $articles[]=$row;}

 
echo json_encode($articles); 
    


