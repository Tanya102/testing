<?php 
  
  $mysqli = new mysqli('localhost','root','','homework') or die(mysql_error($mysqli));

  $name ='';
  $age ='';
  $addr ='';
  $mob ='';
  $city ='';
  $search=0;
  $submit=0;


 
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
  $mob = $_POST['mob'];
  $city = $_POST['city'];
  $addr = $_POST['addr'];

  if(!empty($name)||
     !empty($age)||
     !empty($mob)||
     !empty($city)||
     !empty($addr)){
        $mysqli->query("INSERT INTO  userdetails(name, age , mob ,city, addr)
                       VALUES ('$name', '$age' , '$mob','$city','$addr')") 
                       or die($mysqli->error());
        header('location: showuser.php');}else{
          header('location:edituser.php');
        }
 }    
 if (isset($_POST['search'])) {
  $search=1;
  $name = $_POST['search1'];
  
  $mysqli->query("SELECT * FROM userdetails where name='$name'") 
                       or die($mysqli->error());
        header('location: showuser.php');}
 }    
?>