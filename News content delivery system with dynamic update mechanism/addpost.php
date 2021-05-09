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
  <html>
  <head>
  <link rel="stylesheet" href="style/post.css">
  </head>
  <body id="main">
  &nbsp
  <div class="topnav">
  <a  href="dash.php">Home</a>
  <a href="post.php">Post</a>
  <a class="active" href="addpost.php">Add post</a>

</div>

<div class="mp">
    <h2> Add Post </h2>
  <form action="addpost.php" onsubmit="return validate()" method="post" name="postform" enctype="multipart/form-data" >
 
  <label for="title">Title</label><br>
    <input type="text"  id="title" name="title"><br>
    <label for="des"> Description</label><br>
    <textarea id="des" name="des"></textarea><br>
    <label for="date"> Date</label><br>
	  <input type="date"  name="date"  id="date"><br>
     <label for="thumbnail"> Thumbnail</label><br>
		 <input type="file" name="thumbnail" ><br>
     <label for="title">Keyword</label><br>
    <input type="text"  id="rela" name="rela" ><br>
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
		  <input type="submit" name="submit" id="submit" value="Add" >
  </form>
  </div>
  <script>
      function validate()
      {
        var a = document.forms['postform']['title'].value;
         var b = document.forms['postform']['des'].value;
         var c = document.forms['postform']['date'].value;
         var d= document.forms['postform']['scategory'].value;
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
   include('db/connection.php');
   if (isset($_POST['submit'])) {
    $title=$_POST['title'];
    $des=$_POST['des'];
		$date=$_POST['date'];
    $thumbnail=$_FILES['thumbnail']['name'];
		$tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
    $category=$_POST['catnam'];
    $rela=$_POST['rela'];
    $act=1;
		move_uploaded_file($tmp_thumbnail,"img/$thumbnail");
    $query1=mysqli_query($con,"insert into post(title,date,thumb,act,cate,des,rel)values('$title','$date','$thumbnail','$act','$category','$des','$rela')");
    if ($query1) {echo "<script>alert('Post successfully added')</script>  ";
     }else{
     	echo "<script>alert('Something went wrong . Please Try Again!!')</script>  ";

     }
    }
  ?>
  
     
  </body>
  </html>

  