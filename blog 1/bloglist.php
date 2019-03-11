<html>
<head>
	<title>bloglist</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

</head>
<body>
	
    <?php require_once 'connection.php'; ?>
    

   
	<div class="container">
	<?php  
         $mysqli = new mysqli('localhost','root','','blog') or die(mysql_error($mysqli));
         $result = $mysqli->query("SELECT * FROM articles") or die($mysqli->error);
         
         ?>

        <div class="row justify-content-center">
        	<table class="table">
        		<thead>
        			<tr>
        				<th>Title</th>
        				<th>Description</th>
                        <th>Category</th>
        				<th colspan="4">Action</th>
        			</tr>
        		</thead>
        <?php
          while($row =$result->fetch_assoc()) : ?>
        	<tr>
                <?php if($row['status']==1): ?>
        		<td><?php echo $row['title']; ?></td>
        		<td><?php echo $row['description']; ?></td>
                <td><?php echo $row['category']; ?></td>
        		<td>
        			<a href="viewpage.php?edit= <?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
        			<a href="bloglist.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    <a href="viewcomments.php?read=<?php echo $row['id']; ?>"class="btn btn-success">Read</a>
                </td>
        		</td>
                <?php endif; ?>
        	</tr>
           <?php endwhile; ?>
        	</table>

        </div>
    </div>
</body>
</html>