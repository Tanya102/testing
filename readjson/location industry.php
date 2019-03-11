
<?php
 	$mysqli = new mysqli('localhost','root','','citystate') or die(mysql_error($mysqli));
?>

....................................................................................
<form method="POST">
  <select name="state_id" >
 <?php  
 $acs = array(); 
 $result = $mysqli->query("SELECT  id, name FROM states") or die($mysqli->error);
 while($row =$result->fetch_assoc()){ 
        $acs[]=$row;
      }
 ?>
<?php 
  foreach($acs as $ac) {?>
      
  <option value="<?php echo $ac['id'];?>"><?php echo $ac['name'];?></option>
  <?php }  ?>
  </select>
 <button name="show">
  cities under choosen state
</button>
<select name="industry_id" >
 <?php  
 $acs = array(); 
 $result = $mysqli->query("SELECT  id, name FROM industries") or die($mysqli->error);
 while($row =$result->fetch_assoc()){ 
        $acs[]=$row;
      }
 ?>
<?php 
  foreach($acs as $ac) {?>
      
  <option value="<?php echo $ac['id'];?>"><?php echo $ac['name'];?></option>
  <?php }  ?>
  </select>
 <button name="show1">
  subindustries under choosen industries
</button>

</form>
..............................................................................................
<?php 

$state_id ='';
$industry_id = '';
$users =array();
$users1 =array();
$head = array();
$test = array();
$test1 = array();
if (isset($_POST['show'])) {
 
  $state_id = $_POST['state_id'];
  $state = $mysqli->query("SELECT name FROM states WHERE id = '$state_id'") or die($mysqli->error); 
  $test = $state->fetch_assoc();
  //  while($row = $result->fetch_assoc()){
  //       $head[]=$row;
  //    } 
  $result = $mysqli->query("SELECT name FROM cities WHERE state_id = '$state_id'") or die($mysqli->error);
  
 while($row = $result->fetch_assoc()){
        $users[]=$row;
      }
}
  
// echo "<pre>";
// print_r($head);
// return;
?>
<?php if (isset($test['name'])) { ?>
<h1> <?php echo $test['name']; ?></h1> 
<?php } ?>
<?php if(sizeof($users)>0) { ?>
<ol>
  <?php foreach ($users as $user) { ?>

  <li>
    Name(city): <?php echo $user['name']; ?>
    <br/>
  </li>   
  <?php } ?>
</ol>
<?php } ?>
<?php 



if (isset($_POST['show1'])) {
 
  $industry_id = $_POST['industry_id'];
  // $result = $mysqli->query("SELECT name FROM industries WHERE id = '$industry_id'") or die($mysqli->error); 	
  //  while($row = $result->fetch_assoc()){
  //       $users2[]=$row;
  //    } 
  $indus = $mysqli->query("SELECT name FROM industries WHERE id = '$industry_id'") or die($mysqli->error); 
  $test1 = $indus->fetch_assoc();

  $result = $mysqli->query("SELECT name FROM subindustries WHERE industry_id = '$industry_id'") or die($mysqli->error);
  while($row = $result->fetch_assoc()){
        $users1[]=$row;
      }

}
?>
 <?php if (isset($test1['name'])) { ?>
<h1> <?php echo $test1['name']; ?></h1> 
<?php } ?>
<?php if(sizeof($users1)>0) { ?>
 <ol>
  <?php foreach ($users1 as $userk) { ?>

  <li>
    Name(subindustry): <?php echo $userk['name']; ?>
    <br/>
  </li> 
  
  <?php } ?>
 </ol> 
<?php } ?>

<?php
$str=file_get_contents("sample.json");
$array=json_decode($str,true);
$locations = $array['Location'];
$industries = $array['industrySeller'];
$states=array();
$cities=array();
$subindustries =array();

$id=array();
$row=array();
// echo "<pre>";
// 		print_r($locations);
// 		echo "</pre>";
?>




<?php 


foreach ($industries as $industry) {
		$industry_name = $industry['industry'];
		$industry_slug = $industry['industrySlug'];
		
		$id=$mysqli->query("SELECT id FROM industries WHERE slug = '$industry_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $industry_id=$row['id'];
		if(!$industry_id) {
			$mysqli->query("INSERT INTO  industries (name, slug) 
		    	VALUES ('$industry_name', '$industry_slug')") 
		        or die($mysqli->error());
		       
}

}


foreach ($industries as $subindustry) {
	
	$subindustry_name = $subindustry['subindustry'];
	$subindustry_slug = $subindustry['subIndustrySlug'];
	$industry_slug = $subindustry['industrySlug'];
  
    $id=$mysqli->query("SELECT id FROM industries WHERE slug = '$industry_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $industry_id=$row['id'];
		
		$id=$mysqli->query("SELECT id FROM subindustries WHERE slug = '$subindustry_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $subindustry_id=$row['id'];
		if(!$subindustry_id) {
			 // echo $city_id;
			$mysqli->query("INSERT INTO  subindustries (name, industry_id , slug) 
		    	VALUES ('$subindustry_name', '$industry_id' , '$subindustry_slug')") ;
		        
}


}

	foreach ($locations as $state) {
		
		$state_name = $state['ofc_state'];
		$state_code = $state['state'];
		$state_slug = $state['stateSlug'];
        
		$id=$mysqli->query("SELECT id FROM states WHERE code = '$state_code'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $stateid=$row['id'];
		if(!$stateid) {
			$mysqli->query("INSERT INTO  states (name, code , slug) 
		    	VALUES ('$state_name', '$state_code' , '$state_slug')") 
		        or die($mysqli->error());
		     	
		}
	}



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
		// echo "<pre>";
		// print_r($stateid);
		// echo "</pre>";
		$id=$mysqli->query("SELECT id FROM cities WHERE slug = '$city_slug'")or die($mysqli->error());
			 $row=$id->fetch_assoc();
			 $city_id=$row['id'];
		if(!$city_id) {
			 // echo $city_id;
			$mysqli->query("INSERT INTO  cities (name, state_id , slug) 
		    	VALUES ('$city_name', '$stateid' , '$city_slug')") 
		        or die($mysqli->error());
		     
		        	
		}

		/*$states[$location['state']]['name'] = $location['ofc_state'];
		$states[$location['state']]['slug'] = $location['stateSlug'];
		$states[$location['state']]['code'] = $location['state'];*/
	}


?>
.....................................................................................................................
<form action="" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
........................................................................................................
<?php
 	$mysqli = new mysqli('localhost','root','','images') or die(mysql_error($mysqli));
?>
<?php
// Include the database configuration file

$statusMsg = '';



if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
	// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $mysqli->query("INSERT into product_images (image) VALUES ('$fileName')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
  
<?php

$imageURL ='';

$query = $mysqli->query("SELECT * FROM product_images");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
    $imageURL = $row['image'];
?>
    <img src="<?php echo 'uploads/'.$imageURL; ?>" alt="" />
<?php
   }
}else{ 
?>
    <p>No image(s) found...</p>
<?php } ?>
........................................................................................................................
<?php
  $str=file_get_contents("food.json");
  $array=json_decode($str,true);
  $items = $array['items']['item'];

  $mysqli = new mysqli('localhost','root','','food') or die(mysql_error($mysqli));

  foreach ($items as $item) {
      $type = isset($item['type']) ? $item['type'] : '';
      $name = isset($item['name']) ? $item['name'] : '';
      $ppu = isset($item['ppu']) ? $item['ppu'] : '';
      
      $mysqli->query("INSERT INTO  main (type, name , ppu) VALUES ('$type', '$name' , '$ppu')"); 
      
      $item_id = $mysqli->insert_id;

      // echo $item_id;
      // echo "<br/>";
         
      if(isset($item['batters']['batter'])){
        foreach ($item['batters']['batter'] as $batter) {
          $type = isset($batter['type']) ? $batter['type'] : '';

          $mysqli->query("INSERT INTO  batters (type, item_id, status) VALUES ('$type', '$item_id', '1')") ;
        }
      }

      if(isset($item['topping'])){
        foreach ($item['topping'] as $topping) {
          $type = isset($topping['type']) ? $topping['type'] : '';
          
          $mysqli->query("INSERT INTO  toppings (type, item_id) VALUES ('$type', '$item_id')");           
        }
      }

      if(isset($item['fillings']['filling'])){
        foreach ($item['fillings']['filling'] as $filling) {
          $name = isset($filling['name']) ? $filling['name'] : '';
          $addcost = isset($filling['addcost']) ? $filling['addcost'] : '';
          
          $mysqli->query("INSERT INTO  fillings (name, addcost, item_id) VALUES ('$name', '$addcost', '$item_id')");
        }
      }
    }
?>
...................................................................................................................
 <form action="" method="post" enctype="multipart/form-data">
    Select  File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

 <?php
if( isset($_FILES['file']['name'])  )
  {
        $path=$_FILES['file']['name'];
$pathto="upload/jason/".$path;
  move_uploaded_file( $_FILES['file']['tmp_name'],$pathto) or 
           die( "Could not copy file!");
}
else
{
    die("No file specified!");
}
?>