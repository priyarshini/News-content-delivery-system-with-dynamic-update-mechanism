<?php
session_start();
error_reporting(0);
  include('include/pageheader.php');
  
  
  ?>
<html>
<head>

<link rel="stylesheet" href="style/page.css">
</head>
<body>

<?php
include('db/connection.php');
   $id=$_GET['single'];
   $query=mysqli_query($con,"select id,title,date,cate,des,thumb,rel from post where act=1 and id='$id' ");
while($row=mysqli_fetch_array($query)){
?>

<div class="row">
  <div class="leftcolumn">
    <div class="card">

        <h2><?php   echo $row['title']; ?></h2>
        <img class="pic"  style="height:300px; width:60%;"src="img/<?php echo  $row['thumb']; ?>" ><br> 

        <h5><?php echo date("F jS ,yy", strtotime($row['date'])); ?> </h5>
        <h6>category:<a href="pagecat.php?catid=<?php echo $row['cate'];?>"><?php echo $row['cate'];?></h6></a>
        <?php   $rel=$row['rel']; echo $row['des']; ?><br><br></div>
       &nbsp

          
    
    <div class="box">
        <div class="boxx"> 
        <table><tr><h2>Comments</h2><br>
            <?php 
                $query=mysqli_query($con,"select name,comment from comments where postid='$id' and status=1 ");
                while ($row=mysqli_fetch_array($query)) {
                  ?>
          <th>  <div class="chip">
                 <img src="img/img_avatar2.png"  class="avatar">
                 <?php echo $row['name'];?> 
            </div><br><br>
                 <div class="boxxx"><?php echo $row['comment'];?></div>   </th>         
                 <?php } ?> </tr></table></div></div>


       
       <div class="container">
      <span > <h2 align= left> Leave a comment:<img  src="com.jpg" style="width:120px; float:right;" ></h2></span><br>
      <form  method="post" name="cform" >
      <input type="text" style="  width: 100%;padding: 15px;margin: 5px 0 22px 0;border: none;border-radius: 5px; background: #f1f1f1;" id="name" name="name" placeholder="Enter your fullname" required><br>
      <input type="mail"  style="width: 100%;padding: 15px; margin: 5px 0 22px 0; border: none; border-radius: 5px;background: #f1f1f1;" id="mail" name="mail" placeholder="Enter your Valid email" required><br>
      <textarea id="com" name="com" placeholder="Comment here" style="  width: 100%;border-radius: 5px;padding: 20px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;" required></textarea>
      <br>
      <input type="submit"  class="btn" name="submit" id="submit" value="submit"  >
      </form>
      </div>
      <?php
if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['mail'];
  $comment=$_POST['com'];
  $postid=$_GET['single'];
  $set=0;
  $query=mysqli_query($con,"insert into comments(postid,name,email,comment,status) values('$postid','$name','$email','$comment','$set')");
  if($query)
    {echo "<script>alert('comment successfully submited. Comment will be display after admin review ');</script>";}
  else
  { echo "<script>alert('Something went wrong. Please try again.');</script>";
  }}
  ?>

                 

<h2>Related articles</h2>
    <table><tr>  <?php
          $que=mysqli_query($con,"select * from post where rel='$rel' and act=1 and id!='$id' ");
          $rowcount=mysqli_num_rows($que);
  
          while ($row=mysqli_fetch_array($que)) {
     
            ?>
    <th>
          <div class="gallery">
           <a href="singlepage.php?single=<?php echo $row['id']; ?> ">
           <img src="img/<?php echo  $row['thumb']; ?>"   style="object-fit:cover;" width="600" height="400">
           <div class="desc"><?php echo $row['title']; ?></a></div>
           </div></th>
            <?php }?></tr></table>




         <?php } ?> </div>
   <?php
  include('include/pageside.php');
  ?>
    
    </div>
  </div>
          



   
     




</body>
</html>


