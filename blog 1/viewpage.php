<html>
<head>
	<title>Blog viewpage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php require_once 'connection.php'; ?>


	<div class="container">
			<div class="row">
               <form action="bloglist.php" method="POST">
            	<input type="hidden" name="id" value="<?php echo $id;?>">
	            

	               <div class="form-group">
                        <label><h6>Title:</h6></label>
                        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter blog title" style="width:300%;background-color: #e6e6e6;">
                        <br>
                        <div class="dropdown">
                           
                           <div>
                           	  <select name="category" class="btn btn-primary">
                           	  	   <!--  <option>Category</option> -->
                           		    <option>Technology</option>
                                    <option>Entertainment</option>
                                    <option>Literature</option>
                                    <option>Politics</option>
                                    <option>Heritage & History</option>
                              </select>
                             
                           </div>
                        </div>
                    </div>

                    

                    <div class="form-group">
                         <label><h6>Description:</h6></label>
                         <textarea rows="5" cols="10" name="desc" class="form-control" placeholder="Enter blog description" style="width:300%;background-color: #e6e6e6;"><?php echo $desc; ?></textarea>
                    </div>
                    <br>

                   <?php if($update==true): ?>

                    <div class="form-group">
    	                  <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
                    </div>
                    <?php else: ?>
                    <div class="form-group">
    	                  <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
                    </div>
                <?php endif; ?>
                  

                  </form>
                  
              </div>
                

</div>
</body>
</html>