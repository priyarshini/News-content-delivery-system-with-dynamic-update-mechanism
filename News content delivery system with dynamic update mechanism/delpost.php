<?php
 include('db/connection.php');
 $id=$_GET['delp'];
 
 $query=mysqli_query($con,"delete from post where id='$id'");
  if ($query) {
  	 echo "<script> alert('category deleted permanetly!')</script> ";
  	   echo "<script >window.location='http://localhost/news/post.php' ;</script>";

  }

?>