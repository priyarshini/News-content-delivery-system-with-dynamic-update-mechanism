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
<div class="row">
  <div class="leftcolumn">

<?php

include('db/connection.php');
$page=$_GET['page'];
    if($page=="" || $page==1){
     $page1=0;
    }
    else{
       $page1=($page*3)-3;

    }
   


$query=mysqli_query($con,"select id,title,date,cate,des,thumb from post where act=1 order by id desc limit $page1,3");
while($row=mysqli_fetch_array($query)){
?>

    <div class="card"><span>
<h2 style="display: block;
    font-size: 1.5em;
    margin-block-start: 1em;
    margin-block-end: 0em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    font-color:black;"><a href="singlepage.php?single=<?php echo $row['id']; ?>" ><?php echo $row['title']; ?></a></h2>
      <h3 style="display: block;
    font-size: 1em;
    margin-block-start: 0.5em;
    margin-block-end: 0em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    font-color:black;"><?php echo date("F jS ,yy", strtotime($row['date'])); ?> </h3>
      <h4 style="display: block;
    font-size: 0.9em;
    margin-block-start: 0.5em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    color:black;">category:<a href="pagecat.php?catid=<?php echo $row['cate'];?>"><?php echo $row['cate'];?></h4></a>

      
      <img  src="img/<?php echo  $row['thumb']; ?>"  style="width:95%; height:50% ;object-fit:cover;border-radius: 8px;"><br><br> 

      <a href="singlepage.php ?single=<?php echo $row['id']; ?>"  class="button" style="color:white;"><span>Read more</span></a>&nbsp
</div>
  
    <?php } ?>
  
    <center>
  <div class="pagination">

  <table  style="display: table;
  width:100%;
    border-collapse: separate;
    white-space: normal;
    line-height: normal;
    font-weight: normal;
    font-size: medium;
    font-style: normal;
    color: grey;
    text-align: start;
    border-spacing: 8px;
    border-color: grey;
    font-variant: normal;" width=100%>
  <tr style="width:100%;">

  <?php
    

       $sql=mysqli_query($con,"select * from post where act=1");
       $count=mysqli_num_rows($sql);
       $a=$count/3;
        ceil($a);
        for ($b=1; $b <=$a ; $b++) { 
          ?>
             <th style="
             background-image:url(s.png);
             object-fit: cover;
    background-size: cover;
             padding:20px;
             font-size:15px;
            color: black;">
  <a  href="page.php?page=<?php echo $b;?>"><?php echo $b; ?></a></th>
          
       
          <?php 
        }
       ?>
                
               
                </tr></table></div>
</div>    
</center>


  <?php
  include('include/pageside.php');
  ?>
  </div>
  </div>
<div class="footer">
  <h1 style="
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue">Buy the rumor sell the news</h1>
</div>
</body>
</html>
