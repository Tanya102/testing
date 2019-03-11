<?php require_once 'connectExercise3.php'; ?>
 
      <?php    
                $details[] = $arr;
      ?>   
         
     
<?php foreach ($details as $a){ ?>
        	<ol>  
        		<li>NAME:<?php echo $arr['name1']; ?></li>
        		<li>MOBILE:<?php echo $arr['mob1']; ?></li>
               
        	</ol>
            <ol> 
                <li>NAME:<?php echo $arr['name2']; ?></li>
                <li>MOBILE:<?php echo $arr['mob2']; ?></li>
              
            </ol>
            <ol> 
                <li>NAME:<?php echo $arr['name3']; ?></li>
                <li>MOBILE:<?php echo $arr['mob3']; ?></li>
             
            </ol> <?php } ?>
       
        <button type="submit" name="submit"><a href="exercise3.php">Edit</a></button>

         
    