<?php
 include('db/connection.php');
 $id=$_GET['del'];
 
 $query=mysqli_query($con,"update post set act=0 where id='$id'");
  if ($query) {
  	 echo "<script> alert('post deleted!')</script> ";
  	   echo "<script >window.location='http://localhost/news/post.php' ;</script>";

  }

?>