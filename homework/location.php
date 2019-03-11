<form action="location.php" method="POST">
  <input type="text" name="state" placeholder="Enter state" >
  <button name="add">ADD</button>
</form>

<form action="location.php" method="POST">
  <input type="text" name="city" placeholder="Enter city" >
 <select>
<?php 
     $mysqli = new mysqli('localhost','root','','location') or die(mysql_error($mysqli));
     $records = $mysqli->query("SELECT statename FROM state ");
     while ($row = $records->fetch_assoc()){
     echo "<option value=\"\">" . $row['statename'] . "</option>";
    
    }
   
?>
</select>
  <br>
  <button name="add1">ADD</button>
</form>



<?php
  $mysqli = new mysqli('localhost','root','','location') or die(mysql_error($mysqli));
?>
<?php
  $state ='';
  $city ='';
  $stateid='';
  $result='';
  

    if(isset($_POST['add'])) {
      $state = $_POST['state'];
      $result=$mysqli->query("SELECT FROM statename FROM state where statename='$state") or die($mysqli->error);

      if($result==''){
       $mysqli->query("INSERT INTO state (statename) VALUES ( '$state')") or die($mysqli->error);
      }
     
    }

     if(isset($_POST['add1'])) {
      $city = $_POST['city'];
     
      
      $mysqli->query("INSERT INTO city (cityname,state_id) VALUES ( '$city','$stateid') WHERE ") or die($mysqli->error);
     
    }
?>