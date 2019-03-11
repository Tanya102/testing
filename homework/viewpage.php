<?php require_once 'operation.php'; ?>

<?php   
$view=array();
$row=array();
$result=array();
$mysqli = new mysqli('localhost','root','','location') or die(mysql_error($mysqli));
$result = $mysqli->query("SELECT * FROM city") or die($mysqli->error);
?>
 <?php while($row =$result->fetch_assoc()) { ?>

<p>city has been inserted</p>
<?php }?>
<br>
<button name="back"><a href="city.php">Back</a></button>