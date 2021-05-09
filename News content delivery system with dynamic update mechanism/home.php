<?php
session_start();
if($_SESSION['email']==true){
}
else{
  header('location:admin_login.php');
  }
  include('include/header.php');
  ?>
  <html>
<head>
<link rel="stylesheet" href="style/home.css">
</head>
<body id="main">



 <span> <h2>NEWSPORTAL | ADMIN PANEL</h2>
  <div id="my">
  <a href="cp.php" id="contact">change password</a>
</div>
</span>
  <div class="p">
   <span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776;Dashboard</span>
  <a class="nav-link" href="logout.php" border=44% > Log out</a>
  <br>
</div>





   
</body>
</html> 
