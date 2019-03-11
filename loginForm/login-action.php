<?php
//$_GET, $_POST, $_REQUEST -- global variables

include ('config.php');

$username = $_POST ['username'];
$password = $_POST ['password'];
if ($username == '' || $password == '') {
	
	echo "please enter your username and passoword";
}else {
	$sql = "SELECT * FROM userdata where username = '".$username."' AND password = '".$password."'";
		$result = $conn->query($sql);
	if ($result->num_rows == 0) {	
		echo "Username and password does not matched";
		
	}
		else {
			
			header ('Location:mypage.php');
			}
	}



?>
