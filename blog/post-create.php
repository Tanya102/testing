<!DOCTYPE html>
<html>
<head>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<title>Post Create</title>
</head>
<body>

<div class="flex-container">
<?php include('header.php'); ?>
<?php
	if( isset($_POST['post-create']) ) {
		$title = $_POST['title'];
		$body = $_POST['body']; 
		$created_date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO posts (title, body,created,created_by,modified_by) VALUES ('".$title."', '".$body."','".$created_date."',1,1)"; 
		$result = $conn->query($sql);
		if ($result === TRUE) {
			//echo "New record created successfully";
			header('Location:post-list.php');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}
 ?>
<?php include('left-sidebar.php'); ?>

<article class="article">
  <form name="post-create" method="post" action="">
  	
  <table width="100%" border="1" align="center">
  <tr>
    <td>Title</td>
    <td><input type="text" name="title" id="title" value="" /></td>
  </tr>
  <tr>
    <td>Body</td>
    <td>
    <textarea rows="5" cols="20" name="body" id="body">
    </textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="post-create" id="post-create" value="Submit" />
    <!--<button name="login"></button>-->
    </td>
  </tr>
</table>

  </form>
</article>

<?php include('footer.php'); ?>
</div>

</body>
</html>
