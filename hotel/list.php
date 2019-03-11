<?php 
  
  

  $mysqli = new mysqli('localhost','root','','hotelmngmnt') or die(mysql_error($mysqli));
  $id =0;
  $update = false;
  $name ='';
  $room ='';
  $cdate='';
  $stat=1;

if (isset($_POST['checkin'])) {
	$name = $_POST['name'];
	$room = $_POST['room'];
  $cdate = $_POST['dt'];
  
	$mysqli->query("INSERT INTO enquiry (room,name ,cdate,status) VALUES ('$room', '$name' ,'$cdate','$stat')")
   or die($mysqli->error());
	
	$_SESSION['message']="Welcome Guest!";
	$_SESSION['msg_type'] ="success";
	header("location: index.php");
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
  $stat=0;
	// $mysqli->query("DELETE FROM enquiry WHERE id=$id") or die($mysqli->error());
  $mysqli->query("UPDATE enquiry SET status ='$stat'WHERE id=$id "); 
    
  $_SESSION['message']="Safe journey";
	$_SESSION['msg_type'] ="danger";

	header("location: index.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * from enquiry WHERE id=$id ") or die($mysqli->error());
    if(count($result)==1){
    	$row = $result->fetch_array();
    	$name = $row['name'];
      $room =$row['room'];
      $cdate = $row['dt'];
       $stat=1;
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $room = $_POST['room'];
    $cdate = $_POST['dt'];
    $stat=1;
 
    $mysqli->query("UPDATE enquiry SET name ='$name',room ='$room',status='$stat',cdate='$cdate' WHERE id=$id ") 
    or die($mysqli->error());
     $_SESSION['message'] = "Record has been updated!";
     $_SESSION['msg_type'] = "warning";

     header('location: index.php');
}
 ?>