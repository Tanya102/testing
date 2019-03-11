<?php 
  
  $mysqli = new mysqli('localhost','root','','homework') or die(mysql_error($mysqli));

  
 
  $name ='';
  $age ='';
  $addr ='';
  $mob ='';
  $city ='';

 
if (isset($_GET['submit'])) {
	$name = $_GET['name'];
	$age = $_GET['age'];
  $mob = $_GET['mob'];
  $city = $_GET['city'];
  $addr = $_GET['addr'];
  
 if(!empty($name)||
     !empty($age)||
     !empty($mob)||
     !empty($city)||
     !empty($addr)){
        $mysqli->query("INSERT INTO  userdetailsG(name, age , mob ,city, addr)
                       VALUES ('$name', '$age' , '$mob','$city','$addr')") 
                       or die($mysqli->error());
        header('location: showuserG.php');}else{
          header('location:edituserG.php');
        }
 }   
 ?>