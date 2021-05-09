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
  <link rel="stylesheet" href="style/cat.css">
  </head>
  <body id="main">
  <div id="container" class="container">
  <h2>Contact us Page<h2>
<?php
 include('db/connection.php');
 $query=mysqli_query($con,"select * from contact ;");
while($row=mysqli_fetch_array($query))
{

 ?>
<form method="post">


    <label for="mail">E-mail Id:</label><br>
    <input type="text"  id="mail" name="mail" value="<?php echo $row['mail'];?>" requied><br>
    <label for="ph">Phone number:</label><br>
    <input type="text"  id="ph" name="ph"  value="<?php echo $row['ph'];?>" requied><br>
    <label for="tt">Address:</label><br>
    <textarea name="tt" id="tt"><?php echo $row['ar'];?> </textarea><br><br>
    <?php }?>
<input type="submit" name="submit" value="Post">
 </form>
 </div>
 </body>
</html>
<?php
  
   if(isset($_POST['submit']))
   {
     
     $mail=$_POST['mail'];
     $ph=$_POST['ph'];
     $ar=$_POST['tt'];
     $check=mysqli_query($con,"select * from contact where mail='$mail' ");

     if(mysqli_num_rows($check)>0) {
        echo "<script> alert('contact details Already exist !');</script>";
     exit();
    }
 
     $query1=mysqli_query($con,"update contact set mail='$mail',ph='$ph',ar='$ar' where id=1");
     if($query1)
     {
       echo"<script>
       alert('contact  page successfully updated')</script>";
       
       echo "<script >window.location='http://localhost/news/contact.php' ;</script>";

     }else 
     {
      echo"<script>
      alert('something went worong,try again!')</script>";
    }
     }
     ?>