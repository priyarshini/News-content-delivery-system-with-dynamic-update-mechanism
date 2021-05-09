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

  $query=mysqli_query($con,"select * from category where id='$id' ");
  while($row=mysqli_fetch_array($query))
  {
    $category=$row['catnam'];
    $des=$row['des'];
    
  }
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
  <h2> update category </h2>
  <div id="container" class="container">
  <form action="edit.php" onsubmit="return validate();" method="post" name="categoryform" >
  <label for="cate">Category:</label><br>
    <input type="text"  id="cate" name="cate" value=<?php echo $category;
    ?>><br>
    <input type=hidden id="id" name="id" value="<?php echo $_GET['edit']; ?>" >
    <label for="des">Category Description:</label>
    <textarea id="des" name="des"value=<?php echo $des;
    ?>> </textarea>
  <div>
  <input type="submit" name="submit" id="submit" value="Update" >

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
   { $id=$_POST['id'];
     $cate=$_POST['cate'];
     $des=$_POSt['des'];

     $query1=mysqli_query($con,"update category set catnam='$cate',des='$des' where id='$id' ");
     if($query1)
     {
       echo"<script>
       alert('category updated successfully')</script>";
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