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
  <link rel="stylesheet" href="style/cat.css">
  </head>
  <body id="main">
  <ul class="breadcrumb">
  <span><li><a href="dash.php" style="display:inline;
    color: purple;text-align: left; padding:0px;
    text-decoration: none;font-size:25px;">Home</a></li>
  <li><a href="cat.php" style="display:inline;
    color: purple;text-align:; padding:0px;
    text-decoration: none;font-size:25px;">category</a></li>
  <li style="font-size:25px;">Add category</li>
</ul></span>
    <h2> Add category </h2>
  <div id="container" class="container">


  <form action="addcat.php" onsubmit="return validate();" method="post" name="categoryform" >
  <label for="cate">Category:</label><br>
    <input type="text"  id="cate" name="cate"><br>
    <label for="des">Category Description:</label><br>
    <textarea id="des" name="des"></textarea>
    <br>
  <div>
  <input type="submit" name="submit" id="submit" value="Add" >

  </div>
  </form>
  </div>
  <script>
      function validate()
      {
        var x = document.forms['categoryform']['cate'].value;
          if (x=="") {
          	alert('Category Must Be Filled Out !');
          	return false;
          }

      }
    </script> 
    
<?php
   include('db/connection.php');
   if(isset( $_POST['submit']))
   {
     $catnam=$_POST['cate'];
     $des=$_POSt['des'];
     $status=1;
     $check=mysqli_query($con,"select * from category where catnam='$catnam' ");

     if(mysqli_num_rows($check)>0) {
        echo "<script> alert('Category Name Already exist !');</script>";
     exit();
    }
 
     $query=mysqli_query($con,"insert into category(catnam,des,active)values('$catnam','$des','$status')");
     if($query)
     {
       echo"<script>
       alert('category added successfully')</script>";
       echo "<script >window.location='http://localhost/news/cat.php' ;</script>";

     }else 
     {
      echo"<script>
      alert('something went worong,try again!')</script>";
    }
     }
   
?>
     
  </body>
  </html>