<?php
include('db/connection.php');
$id=$_GET['apr'];

$query=mysqli_query($con,"update comments set status=1 where id='$id'");
 if ($query) {
      echo "<script> alert('Comment approved!')</script> ";
        echo "<script >window.location='http://localhost/news/comments.php' ;</script>";

 }
?>