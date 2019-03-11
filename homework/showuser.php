<html>
<head>
    <title>Show Details</title>
</head>
<body>
    <? require_once 'connect.php';?>
<!-- <?php  
         $mysqli = new mysqli('localhost','root','','homework') or die(mysql_error($mysqli));?>
         $result = $mysqli->query("SELECT * FROM userdetails order by id DESC") or die($mysqli->error);
?>
 <?php $details = array();?>

<?php   while($row =$result->fetch_assoc()){  
                $details[] = $row;}
      ?>
         

             <ul>
                      <?php foreach ($details as $a) { ?>

                          <li>NAME:<?php echo $a['name']; ?></li> 
                          <li>AGE:<?php echo $a['age']; ?></li> 
                          <li>MOBILE:<?php echo $a['mob']; ?></li> 
                          <li>ADDRESS:<?php echo $a['addr']; ?></li> 
                          <li>CITY:<?php echo $a['city']; ?></li>
                          <br> 
                          
                      <?php } ?> 
            </ul>  
         -->
       
       <?php 
       $mysqli = new mysqli('localhost','root','','homework') or die(mysql_error($mysqli));
         $result = $mysqli->query("SELECT * FROM userdetails WHERE name='$name'") or die($mysqli->error);
?>
<?php $details = array();?>
<?php  
while($row =$result->fetch_assoc()){  
                $details[] = $row;
              }
      ?>
<ul>
              <?php foreach ($details as $a) { ?>

                          <li>NAME:<?php echo $a['name']; ?></li> 
                          <li>AGE:<?php echo $a['age']; ?></li> 
                          <li>MOBILE:<?php echo $a['mob']; ?></li> 
                          <li>ADDRESS:<?php echo $a['addr']; ?></li> 
                          <li>CITY:<?php echo $a['city']; ?></li>
                          <br> 
          <?php }?>
</ul>

       <button type="submit" name="submit"><a href="edituser.php">Add Entry</a></button>
</body>
</html>