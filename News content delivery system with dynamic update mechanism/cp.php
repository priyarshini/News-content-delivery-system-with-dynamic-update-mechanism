<?php
error_reporting(0);
session_start();
if($_SESSION['email']==true){
}
else{
    header('location:admin_login.php');
    }
    include('home.php');
  include('include/header.php');
  ?>

<html>
    <head>
    <link rel="stylesheet" href="style/cat.css">
    
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>


    </head>


    <body>

  <div id="container" class="container">
<form  name="chngpwd" method="post" onSubmit="return valid();">
<h2><b>Change Password </b></h2>

<label>Current Password</label>

<input type="text" name="password" required>
<label>New Password</label>
<input type="text"  name="newpassword" required>
<label>Confirm Password</label>

<input type="text" name="confirmpassword" required>
                                                  
<input type="submit" class="" name="submit" value="Submit">

	                                        </form>
                        				</div>

    </body>
</html>
<?php 
  include('db/connection.php');
if(isset($_POST['submit']))
{
$password=$_POST['password'];
$newpassword=$_POST['newpassword'];
$sql=mysqli_query($con,"SELECT password FROM admin_login where id=1");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $dbpassword=$num['password'];

if ($password==$dbpassword)
 {

 $sql1=mysqli_query($con,"update admin_login set password='$newpassword' where id=1");
 if($sql1){
echo"<script>
alert('Password Changed Successfully !!')</script>";
echo "<script >window.location='http://localhost/news/dash.php' ;</script>";}
}
}
else
{
$error="Old Password not match !!";
}
} ?>