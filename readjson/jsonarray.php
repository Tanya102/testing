<?php

$str=file_get_contents("sample.json");
$array=json_decode($str,true);
$locations = $array['Location'];
$industries = $array['industrySeller'];
$states=array();
$cities=array();
$id=array();
$row=array();
?>

<?php
 	$mysqli = new mysqli('localhost','root','','jsonplaces') or die(mysql_error($mysqli));
?>


<?php 
$index=0;

echo "<pre>";

print_r($industries);
echo "</pre>";
return;
	foreach ($locations as $location) {
		/*$cities['name'] = $location['ofc_city'];
		$cities['slug'] = $location['citySlug']; */
		/*echo "<pre>";
		print_r($location);
		echo "</pre>";*/

		$city_name = $location['ofc_city'];
		$city_slug = $location['citySlug'];
		$state_code = $location['state'];

		$id=$mysqli->query("SELECT id FROM states WHERE code = '$state_code'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $stateid=$row['id'];
		
		$id=$mysqli->query("SELECT id FROM city WHERE slug = '$city_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $city_id=$row['id'];
		if(!$city_id) {
			 // echo $city_id;
			$mysqli->query("INSERT INTO  city(name, state_id , slug) 
		    	VALUES ('$city_name', '$stateid' , '$city_slug')") 
		        or die($mysqli->error());
		        echo $index++ . '<br/>'; 	
		}
		/*$states[$location['state']]['name'] = $location['ofc_state'];
		$states[$location['state']]['slug'] = $location['stateSlug'];
		$states[$location['state']]['code'] = $location['state'];*/
	}

	return;
	
	foreach ($states as $state) {
		$state_name = $state['name'];
		$state_code = $state['code'];
		$state_slug = $state['slug'];

		$id=$mysqli->query("SELECT id FROM states WHERE code = '$state_code'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $stateid=$row['id'];
		if(!$stateid) {
			$mysqli->query("INSERT INTO  states(name, code , slug) 
		    	VALUES ('$state_name', '$state_code' , '$state_slug')") 
		        or die($mysqli->error());
		        echo $index++ . '<br/>'; 	
		}
	}
	return;


	// if($unique1!=$state['ofc_state']){
	// $states[$index]['name']=$state['ofc_state'];
	// $states[$index]['code']=$state['state'];
	// $states[$index]['slug']=$state['stateSlug'];
	// $index++;}
	// $unique1=$state['ofc_state'];
  foreach($array['Location'] as $state){
	  if($unique1!=$state['ofc_state']){
			$state_name=$state['ofc_state'];
			$state_code =$state['state'];
			$state_slug=$state['stateSlug'];
			//$index++;  
		    $mysqli->query("INSERT INTO  states(stateName, stateCode , slug) 
		    	VALUES ('$state_name', '$state_code' , '$state_slug')") 
		        or die($mysqli->error()); 

		    $id=$mysqli->query("SELECT id FROM states")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $stateid=$row['id'];

	 	foreach($array['Location'] as $city){
	        if($unique2!=$city['ofc_city']){
				$city_name=$city['ofc_city'];
				$city_code =$city['cityId'];
				$city_slug=$city['citySlug'];
    		$mysqli->query("INSERT INTO  city(cityName, cityCode , slug,state_id) 
    		VALUES ('$city_name', '$city_code' , '$city_slug','$stateid')"); 
    		}
    	$unique2=$city['ofc_city'];
    	   
    	}
    }
 	$unique1=$state['ofc_state'];
	}
?>



  
