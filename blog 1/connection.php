<?php 
  
  $mysqli = new mysqli('localhost','root','','blog') or die(mysql_error($mysqli));
  $id =0;
  $update=false;
  $result = array();
  $row=array();
  
 
  $title ='';
  $desc ='';
  $cat='';
  $stat=1;

 
if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$desc = $_POST['desc'];
  $cat = $_POST['category'];
  $stat=1;
 
 
 $mysqli->query("INSERT INTO  articles(title, description , category,status) VALUES ('$title', '$desc' , '$cat','$stat')") or die($mysqli->error());

     header('location: bloglist.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stat=0;
  
    $mysqli->query("UPDATE articles SET status='$stat' where id='$id'") or die($mysqli->error());

   header('location: bloglist.php');
}

// if (isset($_GET['read'])) {
//     $id = $_GET['read'];
//     $stat=0;
 
//     $mysqli->query("SELECT FROM  articles WHERE id='$id' ") or die($mysqli->error());
     

//      header('location: viewcomments.php');
// }

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM articles WHERE id='$id' ");
   
    $row= $result->fetch_array();
    $title = $row['title'];
    $desc = $row['description'];
    $cat= $row['category'];
    $stat=1;

 }  
 if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $cat = $_POST['category'];

    $mysqli->query("UPDATE articles SET title ='$title',description ='$desc', category='$cat',status='$stat' WHERE id=$id ") or die($mysqli->error());
     

     header('location: viewpage.php');
}


// ?>