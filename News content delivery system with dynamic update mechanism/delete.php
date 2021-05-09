<?php
 include('db/connection.php');
 $id=$_GET['del'];
 
 $query=mysqli_query($con,"update category set active=0 where id='$id'");
  if ($query) {
  	 echo "<script> alert('category deleted!')</script> ";
  	   echo "<script >window.location='http://localhost/news/cat.php' ;</script>";

  }

?>