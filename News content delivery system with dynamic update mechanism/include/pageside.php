<html>
<head>

<link rel="stylesheet" href="style/page.css">
</head>
<body>
<div class="rightcolumn">
  <div class="card"> <center>
      <h2 class="head">Categories</h2>
      
      <?php 

     include('db/connection.php');
     $query=mysqli_query($con,"select id,catnam from category where active=1");
     while($row=mysqli_fetch_array($query))
     {
      ?>
<div class="cat">
      
      <a href="pagecat.php?catid=<?php echo $row['catnam'];?>"><?php echo $row['catnam'];?></a>
      </div><br>
       <?php } ?>
    &nbsp
    
    </div> <br>
    <div class="card" ><center>
      <h2 class="hi">Flash News</h2>
      
      <?php
      $query=mysqli_query($con,"select id,title from post where act=1 limit 4");
     while ($row=mysqli_fetch_array($query)) {

        ?><div class="r">
        <a href="singlepage.php?single=<?php echo $row['id']; ?> "><?php echo $row['title'];?></a>
        
      
      
      
      </div><br>
            <?php } ?>
      
      
    </div>
  




 
</div>
</body>
</html>