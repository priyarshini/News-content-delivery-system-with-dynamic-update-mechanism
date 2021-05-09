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
  
  <a class="pp" href="addcat.php" >Add category</a>
</div>
<h2>Available category<h2>
<center>
  <table> 
  <tr>
         <th>S.No</th>
         <th>Category Name</th>
         <th>Description</th>
         <th colspan=2>Action</th>
       </tr>
       <tr>
       <?php
        include('db/connection.php');
        $query=mysqli_query($con,"select id,catnam,des from category where active=1 ");
        while($row=mysqli_fetch_array($query)){

        ?>
        
          <td><?php echo $row['id'];?></td>
           <td><?php echo $row['catnam'];?></td>
            <td><?php echo substr($row['des'],0,200 );?></td>
            <td> <a href="edit.php?edit=<?php echo $row['id']; ?>" class="pp"  style="align:center;">edit</a></td>
            <td> <a href="delete.php?del=<?php echo $row['id']; ?>" class="pp" >delete</a></td>
        </tr>
       <?php } ?>  
  </table>   
  </center>
<br>
<br>
<br>
<h2>Deleted category<h2>
 <table> 
  <tr>
         <th>S.No</th>
         <th>Category Name</th>
         <th>Description</th>
         <th colspan=2>Action</th>
       </tr>
       <tr>
       <?php
        include('db/connection.php');
        $query=mysqli_query($con,"select id,catnam,des from category where active=0 ");
        while($row=mysqli_fetch_array($query)){

        ?>
        
          <td><?php echo $row['id'];?></td>
           <td><?php echo $row['catnam'];?></td>
            <td><?php echo substr($row['des'],0,200 );?></td>
            <td> <center> <a href="restore.php?resid=<?php echo $row['id']; ?>" class="pp" >restore</a></td>
            <td> <a href="deletep.php?delp=<?php echo $row['id']; ?>" class="pp" >delete permanently</a></td>
        </tr>
       <?php } ?>  
       
  </table>   



  </body>
  </html>
