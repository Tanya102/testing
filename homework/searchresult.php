<? require_once 'connectG.php';?>
<?php  
         $mysqli = new mysqli('localhost','root','','homework') or die(mysql_error($mysqli));
         $result = $mysqli->query("SELECT * FROM userdetailsG order by id DESC") or die($mysqli->error);
?>
 <?php $details = array();?>

<?php   while($row =$result->fetch_assoc()){  
                $details[] = $row;}
      ?>
         

             <ul>
                      <?php foreach ($details as $a) { ?>

                          <li><?php echo $a['name']; ?></li> 
                          <li><?php echo $a['age']; ?></li> 
                          <li><?php echo $a['mob']; ?></li> 
                          <li><?php echo $a['addr']; ?></li> 
                          <li><?php echo $a['city']; ?></li>
                          <br> 
                          
                      <?php } ?> 
            </ol>  
        
       
       <button type="submit" name="submit"><a href="edituserG.php">Add Entry</a></button>