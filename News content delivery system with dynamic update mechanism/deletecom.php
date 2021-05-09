<?php
 include('db/connection.php');
 $id=$_GET['del'];
 
 $query=mysqli_query($con,"delete from comments where id='$id'");
  if ($query) {
  	 echo "<script> alert('comments deleted !')</script> ";
  	   echo "<script >window.location='http://localhost/news/comments.php' ;</script>";

  }

?>