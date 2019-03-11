<html>
<head>
  <title>bloglist</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

</head>
<body>
  
    <?php require_once 'comntconnect.php'; ?>
    

   
  <div class="container">

  <?php  
      $id = $_GET['read'];
         $mysqli = new mysqli('localhost','root','','blog') or die(mysql_error($mysqli));
         $result1 = $mysqli->query("SELECT * FROM articles where id='$id'") or die($mysqli->error);
         $result2 = $mysqli->query("SELECT `comment` FROM comment where article_id='$id'") or die($mysqli->error);

         $comments = array();
         while ($row2 = $result2->fetch_assoc()) {
           $comments[] = $row2;
         }    
  ?>
  <div class="form-group">
  <?php $row1 =$result1->fetch_assoc();  ?>
        <div class="row ">
          <div class="row form-control">
                 <h6>Title</h6>
                 
                 <?php echo $row1['title']; ?>
                
          </div>       
          <br>
          <div class="row form-control">
                <h6>Description</h6>
          
                <?php echo $row1['description']; ?>
              
          </div>
          <br>
         
               
                    <div class=" row form-control">
                    <h6>Comments Section</h6>
                    <form action="" method="POST">
                        <textarea  rows="3" cols="10" name="comment" class="form control" placeholder="  Enter feedback or queries"value="<?php echo $com; ?>" style="width:100%;background-color: #e6e6e6;"></textarea>
                   
                    </div>
                    <br>
                    <br>

                     <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
                    </div>
                    </form>
                    <br>
                    <div style="margin-top: 6%;margin-left: -9%;">
                      <ol>
                      <?php foreach ($comments as $a) { ?>

                          <li><?php echo $a['comment']; ?></li> 
                          
                      <?php } ?> 
                      </ol>                                                  
                 </div>
            </div>
        </div>
   </div>
</body>
</html>