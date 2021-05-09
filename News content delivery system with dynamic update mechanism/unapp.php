<?php
include('db/connection.php');
$id=$_GET['res'];

$query=mysqli_query($con,"update comments set status=0 where id='$id'");
 if ($query) {
      echo "<script> alert('Comment unapproved!')</script> ";
        echo "<script >window.location='http://localhost/news/comments.php' ;</script>";

 }
?>