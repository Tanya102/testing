<?php 

   $name1 ='';
   $mob1 ='';
   $name2 ='';
   $mob2 ='';
   $name3 ='';
   $mob3 ='';
   $arr = array('name1':,'mob1':);

if (isset($_POST['submit'])) {
	$name1 = $_POST['name1'];
	$mob1 = $_POST['mob1'];
	$name2 = $_POST['name2'];
	$mob2 = $_POST['mob2'];
	$name3 = $_POST['name3'];
	$mob3 = $_POST['mob3'];
	if(!empty($name1) || !empty($mob1) || !empty($name2) || !empty($mob2) || !empty($name3) || !empty($mob3) ){
		$arr.array_push($name1);
		$arr.array_push($mob1);
		$arr.array_push($name2);
		$arr.array_push($mob2);
		$arr.array_push($name3);
		$arr.array_push($mob3);
	header("location: showexercise3.php");
}else {
	header("location: showexercise3.php");
}
 }	
	


?>