<html>
<head>
	<title>crud operation</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

</head>
<body>
	<?php require_once 'list.php'; ?>

    <?php

    if (isset($_SESSION['message'])): ?>
    
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php 	 
       echo $_SESSION['message'];
       unset($_SESSION['message']);
    ?>
 </div>

    <?php endif ?>
	<div class="container">
	<?php  
         $mysqli = new mysqli('localhost','root','','hotelmngmnt') or die(mysql_error($mysqli));
         $result = $mysqli->query("SELECT * FROM enquiry where status=1") or die($mysqli->error);
        
         ?>

        <div class="row justify-content-center">
        	<table class="table">
        		<thead>
        			<tr>
        				<th>Room Number</th>
        				<th>Name of Guest</th>
                        <th>Date of checkin</th>
                       
        				<th colspan="4">Action</th>
        			</tr>
        		</thead>
                    <?php
                       while($row =$result->fetch_assoc()) :?>

        	         <tr>
        		        <td><?php echo $row['name']; ?></td>
        		        <td><?php echo $row['room']; ?></td>
                        <td><?php echo $row['dt']; ?></td> 
        		      <td>
        			      <a href="index.php?edit= <?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
        			       <a href="list.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Vacate</a>
        		      </td>
        	         </tr>
                   <?php 
                      endwhile; ?>
        	</table>

        </div>



         <?php
             function pre_r( $array ){
             echo '<pre>';
             print_r($array);
             echo '</pre>';
     }
     ?>
<div class="row">
<div class="col-md-2 offset-md-5">
<form action="list.php" method="POST">
	<input type="hidden" name="id" value="<?Php echo $id; ?>">
	<div class="form-group">
    <label>Name:</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter guest name">
    </div>
    <div class="form-group">
    <label >Room No.:</label>
    <input type="text" name="room" class="form-control" value="<?php echo $room; ?>" placeholder="Enter room no.">
    </div>
    <div class="form-group">
    <label >Date of Check in:</label>
    <input type="date" name="dt" value="<?php echo $cdate; ?>" `>
    </div>
    <div class="form-group">
    	<?php 
    	
    	if ($update == true):
        ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php 
           else: ?>
    <button type="submit" class="btn btn-primary" name="checkin" value="submit">Checkin</button>
    <?php 
       endif; ?>
    </div>
</form>
</div>
</div>
</div>
</body>
</html>