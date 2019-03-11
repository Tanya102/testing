<!DOCTYPE html>
<html>
<head>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/js/common-admin.js"></script>
<title>Post List</title>
</head>
<body>

<div class="flex-container">
<?php include('header.php'); ?>
<?php
	$sql = "SELECT * FROM posts";
	$result = $conn->query($sql);
 ?>
<?php include('left-sidebar.php'); ?>
<article class="article">

<div><a href="post-create.php">New Post</a></div>
  <table width="100%" border="1">
  <tr>
    <th width="10%" scope="col">#</th>
    <th width="62%" scope="col">Title</th>
    <th width="28%" scope="col">Action</th>
  </tr>
  <?php if($result->num_rows > 0) {?>
	  <?php $sno = 0; while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo ++$sno;?></td>
        <td><?php echo $row["title"];?></td>
        <td align="center"><a href="post-edit.php?id=<?php echo $row["id"];?>">Edit</a> <a onClick="return deleteConfirmation();" href="post-delete.php?id=<?php echo $row["id"];?>">Delete</a></td>
      </tr>
      <?php } ?>
  <?php }else{ ?>
   <tr>
    <td colspan="3">No result found.</td>
  </tr>
  <?php } ?>
  
</table>
</article>

<?php include('footer.php'); ?>
</div>

</body>
</html>
