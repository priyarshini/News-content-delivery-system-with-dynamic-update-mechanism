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
<h2>Unapproved comments</h2>
  <table> 
  <tr> <th>S.No</th>
         <th>User Name</th>
         <th>Email</th>
         <th width="300">Comment</th>
         <th>Post/news</th>
         <th colspan=2>Action</th>
       </tr>
       <tr>
       <?php
        include('db/connection.php');
        $query=mysqli_query($con,"select comments.id,comments.name,comments.email,comments.comment,post.title,post.id as postid from comments join post on post.id=comments.postid where comments.status=0 and comments.id>0 ");
        $com=1;
        while($row=mysqli_fetch_array($query)){

        ?>
         <td><?php echo $com;?></td>
          <td><?php echo $row['name'];?></td>
           <td><?php echo $row['email'];?></td>
            <td><?php echo $row['comment'];?></td>
            <td><a href="editpost.php?edit=<?php echo $row['postid'];?>" style="color:darkmagenta"><?php echo $row['title'];?></a> </td>
            <td> <a href="approvecom.php?apr=<?php echo $row['id']; ?>" class="pp" >approve</a></td>
            <td> <a href="deletecom.php?del=<?php echo $row['id']; ?>" class="pp" >delete</a></td>
        </tr>
       <?php  $com++;} ?>  
  </table>   
<br>
<br>
<br>
<h2>Approved comments<h2>
 <table> 
  <tr><th>S.No</th>
  <th>User Name</th>
         <th>Email</th>
         <th width="300">Comment</th>
         <th>Post/news</th>
         <th colspan=2>Action</th>
       </tr>
       <tr>
       <?php
        include('db/connection.php');
        $query=mysqli_query($con,"select comments.id,comments.name,comments.email,comments.comment,post.title,post.id as postid from comments join post on post.id=comments.postid where status=1 ");
        while($row=mysqli_fetch_array($query)){

        ?>
        
        <td><?php echo $com;?></td>
          <td><?php echo $row['name'];?></td>
           <td><?php echo $row['email'];?></td>
            <td><?php echo $row['comment'];?></td>
            <td><a href="editpost.php?pid=<?php echo $row['postid'];?>" style="color:darkmagenta"><?php echo $row['title'];?></a> </td>
            <td> <a href="unapp.php?res=<?php echo $row['id']; ?>" class="pp" >Unapprove</a></td>
            <td> <a href="deletecom.php?delp=<?php echo $row['id']; ?>" class="pp" >delete</a></td>
        </tr>
        <?php
          $com++;
        } ?> 
       
  </table>   
  </body>
  </html>
