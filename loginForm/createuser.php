<!DOCTYPE html>
<html>
<head>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<title>Post Create</title>
</head>
<body>

<div class="flex-container">
<?php include('config.php'); ?>
<?php

	
	if( isset($_POST['register-submit']) ) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email']; 
		$dat = date('Y-m-d H:i:s');
		
		$sql = "INSERT INTO userdata (email, username,password,created) VALUES ('".$email."', '".$username."','".$password."','".$dat."')"; 
		$result = $conn->query($sql);
		if ($result === TRUE) {
			echo "New record created successfully";
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}else {
		echo "show Error";
		
		}
 ?>

</div>

</body>
</html>
