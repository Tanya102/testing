<!DOCTYPE html>
<html>
<head>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<title>Post List</title>
</head>
<body>

<div class="flex-container">
<?php include('header.php'); ?>
<article class="article">
  <form name="login" method="post" action="login-action.php">
  	
    <table width="50%" border="1" align="center">
  <tr>
    <td>Username</td>
    <td><input type="text" name="username" id="username" value="" /></td>
  </tr>
  <tr>
    <td>Passowrd</td>
    <td><input type="password" name="password" id="password" value="" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="login" id="login" value="Submit" />
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
