<?php
  $mysqli = new mysqli('localhost','root','','location') or die(mysql_error($mysqli));
?>
<?php
  $state ='';
  $city ='';
  $flag=0;
  

    if(isset($_GET['add1'])) {
      $state = $_GET['state'];
     
      $result = $mysqli->query("SELECT statename from state WHERE statename ='$state'") or die($mysqli->error);
      if ( mysqli_num_rows($result) > 1 ) {
         $flag=1;
         header('location:get.php');
        }else{
       $result = $mysqli->query("INSERT INTO state (statename) VALUES ( '$state')") or die($mysqli->error);
      
      }
      
    }

     if(isset($_GET['add2'])) {
      	$city = $_GET['city'];
      	$state_id = $_GET['state_id'];
      
      	$result1 = $mysqli->query("SELECT cityname from city WHERE cityname ='$city'") 
        or die($mysqli->error);
      if ( mysqli_num_rows($result1) > 1 ) {
$flag=1;
     header('location:getview.php');
      }else{
      	$mysqli->query("INSERT INTO city (cityname, state_id) VALUES ( '$city', '$state_id')") or die($mysqli->error);
        header("location:getview.php");
      	}
      	// $mysqli->query("UPDATE city SET status ='$status' WHERE city ='$city' ");
    }
?>