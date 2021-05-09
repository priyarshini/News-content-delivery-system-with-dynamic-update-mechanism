<?php
session_start();
error_reporting(0);
if($_SESSION['email']==true){
}
else{
  header('location:admin_login.php');
  }
  include('include/header.php');
  include('home.php');
  
  ?>



  <html>
  <head>
  <link rel="stylesheet" href="style/dash.css">
</head>
<body id="main">
    <table width=100% align=center>
        <tr>
            <th>
  <div class="container">
  <a href="cat.php">
  <img src="letter.jpg" style="width:100%">
    <h1 style=" color: black; font-size:60px;"><div class="center">Categories Listed<br><br><?php
     include('db/connection.php');
     $query=mysqli_query($con,"select * from category where active=1 ");
      $countcat=mysqli_num_rows($query);?>
      <span style="font-size:70px;">
      <?php echo $countcat;?> </span>
     </h1>
     </a>
</div>
</div>
  
<th>


  <div class="container">
  <a href="post.php">
  <img src="letter.jpg" style="width:100%">
    <h1 style=" color: black; font-size:60px;"><div class="center">Latest news <br><br><?php
     include('db/connection.php');
     $query=mysqli_query($con,"select * from post where act=1 ");
      $countcat=mysqli_num_rows($query);?>
         <span style="font-size:70px;">
      <?php echo $countcat;?> </span>
     </h1>
     </a>
</div>
</div>
<th>
  <div class="container">
  <a href="comments.php">
  <img src="letter.jpg" style="width:100%">
    <h1 style=" color: black; font-size:60px;"><div class="center">comments received<br><br><?php
     include('db/connection.php');
     $query=mysqli_query($con,"select * from comments");
      $countcat=mysqli_num_rows($query);?>
         <span style="font-size:70px;">
      <?php echo $countcat;?> </span>
     </h1>
     </a>

</div>
</div>
</tr>
</table>
</body>
</html> 