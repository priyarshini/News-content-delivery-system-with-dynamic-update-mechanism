<?php
session_start();
  include('include/pageheader.php');
  ?>
  <html>
<head>
  <link rel="stylesheet" href="style/about.css">
</head>
<body>



 <?php
        include('db/connection.php');
        $query=mysqli_query($con,"select * from about where id=1");
        while($row=mysqli_fetch_array($query)){

        ?>
      
       
       <div class="cont">
  <img src="img/cup.jpg" style="width:100%; height:80%;">
  
  <div class="text-block">
  
    <p> <h2> About us </h2> <?php echo $row['us'];?></p>
  </div>
</div>   
&nbsp
  <div class="cont">
  <img src="img/ages.jpg" style="width:100%; height:80%;">
  
  <div class="text-blockv">
  
    <p> <h2>Our Mission </h2> <?php echo $row['vis'];?></p>
  </div>
</div>
&nbsp
       <div class="cont">
  <img src="img/cup.jpg" style="width:100%; height:80%;">
  
  <div class="text-block">
  
    <p> <h2> Technology used</h2> <?php echo $row['tec'];?></p>
  </div>
</div>  
&nbsp
<div class="cont">
  <img src="img/ages.jpg" style="width:100%; height:80%;">
  
  <div class="text-blockv">
  
    <p> <h2>Work with us </h2> <?php echo $row['wor'];?></p>
  </div>
</div>
<?php } ?>   



</body>
</html> 
