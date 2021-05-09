<?php
 include('db/connection.php');
 $id=$_GET['resid'];
 $query=mysqli_query($con,"update post set act=1 where id='$id'");
  if ($query) {
  	 echo "<script> alert('Post restored successfully !')</script> ";
       echo "<script >window.location='http://localhost/news/post.php' ;</script>";
  }else{
  	echo "Please Try again";
  }
  ?>