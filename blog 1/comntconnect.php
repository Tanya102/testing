<?php 
  
  $mysqli = new mysqli('localhost','root','','blog') or die(mysql_error($mysqli));
  $id =0;
  $com='';
  



if (isset($_POST['submit'])) {
	
  $com = $_POST['comment'];
 
 
 $mysqli->query("INSERT INTO comment(comment) VALUES ('$com')") or die($mysqli->error());

     
}


?>