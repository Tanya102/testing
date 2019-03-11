
<?php
  $mysqli = new mysqli('localhost','root','','jsonplaces') or die(mysql_error($mysqli));

$result=array();
$row=array();
$cities=array();
$city_name='';
$state_id = $_POST['state_id'];
$result=$mysqli->query("SELECT name,state_id,slug FROM city WHERE state_id= '$state_id'")or die($mysqli->error());
while($row=$result->fetch_assoc()){
  $cities[]=$row;}


       echo json_encode($cities);
?>
 