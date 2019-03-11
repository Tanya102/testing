<html>
<head><title>Read list</title>
</head>
<body>
    <?php require_once 'list.php'; ?>

    
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
                        <td><?php echo $row['date']; ?></td> 
        		      <td>
        			      <a href="index.php?edit= <?php echo $row['id']; ?>" class="btn btn-info">Update</a>
        			       <a href="list.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Check out</a>
        		      </td>
        	         </tr>
                   <?php 
                      endwhile; ?>
        	</table>

        </div>
    </div>

</body>
</html>