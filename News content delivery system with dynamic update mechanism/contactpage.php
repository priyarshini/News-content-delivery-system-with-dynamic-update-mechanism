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
        $query=mysqli_query($con,"select * from contact ");
        while($row=mysqli_fetch_array($query)){

        ?>
      <div class="cont">
  <img src="img/min.png" style="width:100%; height:95%;">
  
  <div class="text-blockc">
  
    <p> <h2> Contact us </h2> </p>
    We would love to hear from you. 
  
  <p style="font-size:18px;"> Write to us:<?php echo $row['mail'];?></p>
  <p style="font-size:18px;"> Call us:<?php echo $row['ph'];?></p>
  <p style="font-size:18px;">Where we work:<?php echo $row['ph'];?></p>
  </div>
</div>   <?php }?>
        </body>
        </html>