<?php
  $mysqli = new mysqli('localhost','root','','location') or die(mysql_error($mysqli));
?>
<?php
  $state ='';
  $city ='';
  $stateid='';
 

    if(isset($_POST['add1'])) {
      	$state = $_POST['state'];
        $result=$mysqli->query("SELECT id,statename FROM state where statename='$state'") 
        or die($mysqli->error);
        $row = $result->fetch_assoc();
        // echo "<pre>";
        // print_r($row);
        // return;
      if(!isset($row['id'])){
     	  $mysqli->query("INSERT INTO state (statename) VALUES ('$state')") or die($mysqli->error);
      	
     } else {
      echo "Already in table";
    }
    }

    if(isset($_POST['add2'])) {
      	$city = $_POST['city'];
      	$state_id = $_POST['stateid'];
      
      	
      	$mysqli->query("INSERT INTO city (cityname, state_id) VALUES ( '$city', '$stateid')") or die($mysqli->error);
      	echo "<br/>City Inserted.";
      	// $mysqli->query("UPDATE city SET status ='$status' WHERE city ='$city' ");
    }
?>