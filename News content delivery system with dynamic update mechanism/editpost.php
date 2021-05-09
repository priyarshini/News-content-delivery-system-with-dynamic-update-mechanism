<?php
session_start();
error_reporting(0);
if($_SESSION['email']==true){
}
else{
  header('location:admin_login.php');
  }
  include('home.php');
  ?>
  <?php
   include('db/connection.php');
   $id=$_GET['edit'];
   $query=mysqli_query($con,"select * from post where id='$id' ");
  while($row=mysqli_fetch_array($query))
  {
    $id=$row['id'];
    $title=$row['title'];
    $des=$row['des'];
		$date=$row['date'];
    $thumbnail=$row['thumb'];
    $category=$row['cate'];
    $rel=$row['rel'];
  }
  ?>
  
  <html>
  <head>
  <link rel="stylesheet" href="style/post.css">
  </head>
  <body id="main">
  &nbsp
  <div class="topnav">
  <a  href="home.php">Home</a>
  <a href="post.php">Post</a>
  <a  href="addpost.php">Add post</a>

</div>

<div class="mp">
    <h2> Update Post </h2>
  <form action="editpost.php" onsubmit="return validate()" method="post" name="postform" enctype="multipart/form-data" >
  <input type=hidden id="id" name="id" value="<?php echo $_GET['edit']; ?>" >
  <label for="title">Title</label><br>
    <input type="text"  id="title" name="title" value="<?php echo $title; ?>" ><br>
    <label for="des"> Description</label><br>
    <textarea id="des" name="des"><?php echo $des; ?></textarea><br>
    <label for="date"> Date</label><br>
	  <input type="date"  name="date"  id="date" value="<?php echo $date; ?>" ><br>
     <label for="thumbnail"> Thumbnail</label><br>
		 <input type="file" name="thumbnail" ><br>
     <img class="pic" src="img/<?php echo $thumbnail; ?>" width="300"><br>
     <label for="title">Keyword</label><br>
    <input type="text"  id="rel" name="rel" value="<?php echo $rel; ?>" ><br>
		 <label for="cate"> Category:</label><br>
		 <select name="catnam">
		  <?php
    include('db/connection.php');
     $query=mysqli_query($con,"select * from category");
      while($row=mysqli_fetch_array($query)){	?>
		  <option SELECTED value="<?php echo $row['catnam'];?>"><?php echo $row['catnam'];?></option>
		  <?php } ?>
		 </select><br>
		  <label for="admin">Admin</label><br>
		 	<input type="text"  disabled value="<?php echo $_SESSION['email'];  ?> "><br>
		  <input type="submit" name="submit" id="submit" value="Update" >
  </form>
  </div>
  <script>
      function validate()
      {
        var a = document.forms['postform']['title'].value;
         var b = document.forms['postform']['des'].value;
         var c = document.forms['postform']['dalue;ate'].value;
         var d= document.forms['postform']['scategory'].v
         if (a=="") {
          	alert('Title Must Be Filled Out !');
          	return false;
          }
          if (b=="") {
          	alert('Description Must Be Filled Out !');
          	return false;
          }
           

      }
    </script> 
    
<?php
   if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$title=$_POST['title'];
	$des=$_POST['des'];
		$date=$_POST['date'];
			$thumbnail=$_FILES['thumbnail']['name'];
			$tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
				$category=$_POST['catnam'];
       
			move_uploaded_file($tmp_thumbnail,"img/$thumbnail");

	$sql1= mysqli_query($con,"update post set title='$title', des='$des' , date='$date' , thumb='$thumbnail' , cate='$category' where id='$id' ");
	if ($sql1) {
		 echo "<script>alert('Post updated Successfully !!')</script>  ";
		 echo "<script >window.location='http://localhost/news/post.php' ;</script>";
	} else{
		echo "<script>alert('Please try again !!')</script>  ";
	}
			

}
?>
  
     
  </body>
  </html>

  