<?php
	$mysqli = new mysqli('localhost','root','','jsonplaces') or die(mysql_error($mysqli));

	$arr=array();
	$cityName ='';
	if (isset($_POST['city'])) {
		$cityName=$_POST['city'];		
	}
	if($cityName!=''){

		$result=$mysqli->query("SELECT id, name, state_id FROM city WHERE name = '$cityName'")or die($mysqli->error());
		$city=$result->fetch_assoc();

		if(isset($city['id'])) {
			$state_id=$city['state_id'];
			$result=$mysqli->query("SELECT name FROM states WHERE id='$state_id'")or die($mysqli->error());
			$state=$result->fetch_assoc();

			if(isset($state['name'])) {
		  		$arr=array(
					'city' => $city['name'],
					'state' => $state['name']
				);
			}
		}
	}
	
	echo json_encode($arr);   
?>