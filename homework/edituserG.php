<html>
<head>
<title>Form1</title>
</head>
<body>
  <?php require_once 'connectG.php'?>
<form action="connectG.php" method="GET">
  <span>Name:&nbsp&nbsp &nbsp</span>
  <input type="text" name="name" placeholder="Enter your name"value="<?php echo $name; ?>">
  <br>
  <span>Age:&nbsp &nbsp &nbsp &nbsp</span>
  <input type="text" name="age" placeholder="Enter your age"value="<?php echo $age; ?>">
  <br>
  <span>Mobile:&nbsp &nbsp</span>
  <input type="text" name="mob" placeholder="Enter your moobile"value="<?php echo $mob; ?>">
  <br>
  <span>Address:&nbsp </span>
  <input type="text" name="addr" placeholder="Enter your address"value="<?php echo $addr; ?>">
  <br>
  <span>City:&nbsp &nbsp &nbsp &nbsp</span>
  <input type="text" name="city" placeholder="Enter your city"value="<?php echo $city; ?>">
  <br>
  <br>

  <button type="submit" name="submit">submit</button>
</form>

         
</body>
</html>