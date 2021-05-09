<?php
session_start();
?>
<html>
<head>
<title>admin login</title>

<link rel="stylesheet" href="style/admin.css">
</head>
<body class="bg-img">
<div id="container">
<h3 align="center">Admin Login</h3>
<form action="admin_login.php" method=post>
    <label for="email">Email:</label>
    <input type="email"   placeholder="Enter email" id="email" name="email">
    <label for="pwd">Password:</label>
    <input type="password"   placeholder="Enter password" id="pwd" name="password">
  <div id="lower">
  <input type="submit" name="submit"  value="Log in">

  </div>
  </form>
</div>
</div>
</body>
</html>
<?php
include('db/connection.php');
if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $query=mysqli_query($con,"select * from admin_login where email='$email' AND password='$password' ");
  if($query)
  {
    if(mysqli_num_rows($query)>0)
    {
      $_SESSION['email']=$email;
      header('location:dash.php');
     }
     else{
       echo "<script> alert('invalid admin');</script>";
           }
  }
}

?>