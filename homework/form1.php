<form action="" method="POST"> 
  <input type="text" name="name" placeholder="Enter name" value="">
  <br>  
  <input type="text" name="mob" placeholder="Enter mobile" value="">
  <br>
  <input type="text" name="city" placeholder="Enter city" value="">
  <br>
  <button type="submit" name="submit">submit</button>
</form>

<hr>

<form action="" method="POST">
  <input type="text" name="search" placeholder="search value">
  <select name="value">
  	<option value="1">Name</option>
  	<option value="2">Mobile</option>
  	<option value="3">City</option>
  </select>

   <button type="submit" name="search1">Go</button>

</form>

----------------------------------------------------------------

<?php
	$mysqli = new mysqli('localhost','root','','homework') or die(mysql_error($mysqli));
?>

<?php
	$name='';
	$city='';
	$search_text='';
	$mob='';
	$value='';

    if(isset($_POST['submit'])) {
    	$name = $_POST['name'];
    	$mob = $_POST['mob'];
    	$city = $_POST['city'];

    	$mysqli->query("INSERT INTO form1 (name, mob, city) VALUES ('$name', '$mob', '$city')") or die($mysqli->error);
    }
?>


<?php 
	$users = array();
	if(isset($_POST['search1'])) {
		$search_text = $_POST['search'];
		$result= array();
		$row= array();
		$value=$_POST['value'];

		if($value==1){
	    $result = $mysqli->query("SELECT * FROM form1 WHERE name='$search_text'") or die($mysqli->error);
	  	while($row = $result->fetch_assoc()){
	  		$users[]=$row;
	  	}		
	 }  else if($value==2){
		$result = $mysqli->query("SELECT * FROM form1 WHERE mob='$search_text'") or die($mysqli->error);
	  	while($row = $result->fetch_assoc()){
	  		$users[]=$row;
	  	}
	}   else{
		$result = $mysqli->query("SELECT * FROM form1 WHERE city='$search_text'") or die($mysqli->error);
	  	while($row = $result->fetch_assoc()){
	  		$users[]=$row;
	  	}
	}
 ?>

<?php if(sizeof($users)>0) { ?>
<ol>
 	<?php foreach ($users as $user) { ?>
 	<li>
 		Name: <?php echo $user['name']; ?>
 		<br/>
 		Mobile: <?php echo $user['mob']; ?>
 		<br/>
 		City: <?php echo $user['city']; ?>
 	</li>		
 	<?php } ?>
</ol>
<?php } 


}?>
