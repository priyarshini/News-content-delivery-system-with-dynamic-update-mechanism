<?php
 include('db/connection.php');
 $id=$_GET['delp'];
 
 $query=mysqli_query($con,"delete from category where id='$id'");
  if ($query) {
  	 echo "<script> alert('category deleted permanetly!')</script> ";
  	   echo "<script >window.location='http://localhost/news/cat.php' ;</script>";

  }

?>