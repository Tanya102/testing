<!DOCTYPE html>
<html>
<head>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<title>Post Edit</title>
</head>
<body>
<?php include('config.php');?>
<div class="flex-container">
<?php include('header.php'); ?>
<?php 
	
	if( isset($_POST['post-edit']) ) {
		$title = $_POST['title'];
		$body = $_POST['body']; 
		 
		$sql = "UPDATE posts SET title = '".$title."', body = '".$body."', modified_by = 1 WHERE id = ".$id; 
		$result = $conn->query($sql);
		if ($result === TRUE) {
			//echo "New record created successfully";
			header('Location:post-list.php');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}
 ?>
 

<article class="article">
<div align="right"><a href="post-list.php">Back to list</a></div>
  <form name="post-edit" method="post" action="">
  	
  <table width="100%" border="1" align="center">
  <tr>
    <td>Title</td>
    <td><input type="text" name="title" id="title" value="<?php echo $row['title'];?>" /></td>
  </tr>
  <tr>
    <td>Body</td>
    <td>
    <textarea rows="5" cols="20" name="body" id="body"><?php echo $row['body'];?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="post-edit" id="post-edit" value="Submit" />
    <!--<button name="login"></button>-->
    </td>
  </tr>
</table>

  </form>
</article>

</div>

</body>
</html>

