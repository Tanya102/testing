<?php
//$_GET, $_POST, $_REQUEST -- global variables
include('config.php');
$username = $_POST['username'];
$password = $_POST['password'];
if($username == '' || $password == ''){
	echo "Enter username and password";
}else{
	//Databse main check karo
	$sql = "SELECT * FROM users where username = '".$username."' AND password = '".$password."' ";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		echo "Error:Username, Paswword does not match.";
	}else{
		header('Location:dashboard.php');
	}
}
?>