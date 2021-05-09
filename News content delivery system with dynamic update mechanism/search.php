<?php
  include('include/pageheader.php');
  ?>

<html>
<head>
<link rel="stylesheet" href="style/page.css">
</head>
<body>
  


<?php
include('db/connection.php');
     
  if($_POST['searchtitle']!=''){
  $search=$_POST['searchtitle'];
     $query=mysqli_query($con,"select * from post where title like '%$search%' or rel like '%$search%' and act=1 ");
     $rowcount=mysqli_num_rows($query);
     if($rowcount==0)
     {
     echo "<script>
     alert('No record found')</script>";
     echo "<script >window.location='http://localhost/news/page.php' ;</script>";
     }
     else {
     while ($row=mysqli_fetch_array($query)) {
     
      ?>

<div class="row">

    <div class="card">
   <h2> <?php echo $row['cate'];?> News</h2>
   <h2><a href="singlepage.php?single=<?php echo $row['id']; ?> "><?php echo $row['title']; ?></a></h2>
   <h5><?php echo date("F jS ,yy", strtotime($row['date'])); ?> </h5>
<img class="pic" src="img/<?php echo  $row['thumb']; ?>" style="width:95%; height:70% ;object-fit: cover;border-radius: 8px;"><br> &nbsp &nbsp &nbsp

     
      
      <br><a href="singlepage.php?single=<?php echo $row['id']; ?>" class="button" style="color:white;"><span>Read more</span></a>
     </a>
     </div> 
   
    <?php 
  }}}
  ?> 
 </div>
<div class="footer">
  <h1 style="
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue">Buy the rumor sell the news</h1>
</div>
</body>
</html>
