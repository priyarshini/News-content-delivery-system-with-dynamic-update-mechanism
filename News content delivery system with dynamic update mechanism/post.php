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
  <a class="pp" href="addpost.php" >Add news</a>
</div>
<h2>Available Post</h2>
  <table> 
  <tr>
         <th>S.No</th>
         <th>Title</th>
         <th>Category</th>
         <th>Description</th>
         <th>Thumbnails</th>
         <th>Keyword</th>
         <th>Date</th>
         <th colspan=2>Action</th>
       </tr>
       <tr>
       <?php
        include('db/connection.php');
        $page=$_GET['page'];
        if($page=="" || $page==1){
         $page1=0;
        }
        else{
           $page1=($page*3)-3;

        }
        $query=mysqli_query($con,"select id,title,date,cate,des,thumb,rel from post where act=1 limit $page1,3");
        while($row=mysqli_fetch_array($query)){

        ?>
        
          <td><?php echo $row['id'];?></td>
           <td><?php echo $row['title'];?></td>
           <td><?php echo $row['cate'];?></td>
            <td><?php echo substr($row['des'],0,200 );?></td>
            <td ><img class="pic" src="img/<?php echo $row['thumb'];?>" style="width:120px" ></td>
            <td><?php echo $row['rel'];?></td>
            <td><?php echo date("F jS ,yy", strtotime($row['date'])); ?></td>
            <td> <a href="editpost.php?edit=<?php echo $row['id'];?>" class="pp" >edit</a></td>
            <td> <a href="deletepost.php?del=<?php echo $row['id']; ?>" class="pp" >delete</a></td>
        </tr>
       <?php } ?>  
  </table>  
    <br>

  <div class="pagination">
  <table width=5% height=1%>
  <tr><th>
  <a href="#">&laquo;</a>

  <?php

       $sql=mysqli_query($con,"select * from post");
       $count=mysqli_num_rows($sql);
       $a=$count/3;
        ceil($a);
        for ($b=1; $b <=$a ; $b++) { 
          ?>
      
      <th>       
  <a  style="color:white;" href="post.php?page=<?php echo $b;?>"><?php echo $b; ?></a>
          
       
          <?php 
        }
       ?>
                <th>
                <a href="#">&raquo;</a>
                </tr></table>
      </div>
<br>
<br>
<h2>Deleted post<h2>
 <table> 
  <tr>
         <th>Id</th>
         <th>Title</th>
         <th>Category</th>
         <th>Description</th>
         <th>Thumbnails</th>
         <th>Keyword</th>
         <th>Date</th>
         <th colspan=2>Action</th>
         </tr>
       <tr>
       <?php
        include('db/connection.php');
        $query=mysqli_query($con,"select id,title,date,cate,des,thumb from post where act=0 ");
        while($row=mysqli_fetch_array($query)){

        ?>
        
        <td><?php echo $row['id'];?></td>
           <td><?php echo $row['title'];?></td>
           <td><?php echo $row['cate'];?></td>
            <td><?php echo substr($row['des'],0,200 );?></td>
            <td class="pic"><?php echo $row['thumb'];?></td>
            <td><?php echo $row['rel'];?></td>
            <td><?php echo date("F jS ,y", strtotime($row['date'])); ?></td>
            <td> <a href="respost.php?resid=<?php echo $row['id']; ?>" class="pp" >restore</a></td>
            <td> <a href="delpost.php?delp=<?php echo $row['id']; ?>" class="pp" >delete permanently</a></td>
        </tr>
       <?php } ?>  
       
  </table>   



  </body>
  </html>
