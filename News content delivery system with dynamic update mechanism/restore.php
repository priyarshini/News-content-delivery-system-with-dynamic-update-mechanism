<?php
 include('db/connection.php');
 $id=$_GET['resid'];
 $query=mysqli_query($con,"update category set active=1 where id='$id'");
  if ($query) {
  	 echo "<script> alert('Category restored successfully !')</script> ";
  	   echo "<script >window.location='http://localhost/news/cat.php' ;</script>";

  }else{
  	echo "Please Try again";
  }
  ?>