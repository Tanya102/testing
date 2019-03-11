<?php
include('config.php');
$id = $_GET['id'];
$sql = "DELETE FROM posts WHERE id = ".$id;
$result = $conn->query($sql);
die('Record with id '.$id.' deleted.');
?> 