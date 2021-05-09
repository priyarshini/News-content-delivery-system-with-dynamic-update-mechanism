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
  <h2>About us Page<h2>
<?php
 include('db/connection.php');
 $query=mysqli_query($con,"select * from about where id=1;");
while($row=mysqli_fetch_array($query))
{

 ?>
<form method="post">

<label for="us">about us details:</label><br>
<textarea id="us" name="us" requied> <?php echo $row['us'];?> </textarea><br>
 
<label for="vis">Mission and vission details:</label><br>
<textarea id="vis" name="vis" requied><?php echo $row['vis'];?> </textarea><br>   
<label for="tec">Technology details:</label><br>
<textarea id="tec" name="tec" requied><?php echo $row['tec'];?></textarea><br><br>

<label for="wor">Work details:</label><br>
<textarea id="wor" name="wor"  requied><?php echo $row['wor'];?></textarea><br>
    <?php }?>&nbsp<br><br>
<input type="submit" name="submit" value="Post">
 </form>
 </div>
 </body>
</html>
<?php
  
   if(isset($_POST['submit']))
   {
     $us=$_POST['us'];
     $tec=$_POST['tec'];
     $vis=$_POST['vis'];
     $wor=$_POST['wor'];
    
     $query1=mysqli_query($con,"update about set us='$us',tec='$tec',vis='$vis',wor='$wor' where id=1");
     if($query1)
     {
       echo"<script>
       alert('about  page successfully updated')</script>";

     }else 
     {
      echo"<script>
      alert('something went worong,try again!')</script>";
    }
     }
     ?>