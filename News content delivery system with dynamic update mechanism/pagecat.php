    <?php
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

  $catnam=$_GET['catid'];



$query=mysqli_query($con,"select id,title,date,cate,des,thumb from post where act=1 AND cate='$catnam' order by id desc");
while($row=mysqli_fetch_array($query)){
?>

    <div class="card">
   <h2> <?php echo $row['cate'];?> News</h2>
<img class="pic" src="img/<?php echo  $row['thumb']; ?>"style="width:95%; height:50% ;object-fit:cover;border-radius: 8px;"><br>
<h2><a href="singlepage.php?single=<?php echo $row['id']; ?> "><?php echo $row['title']; ?></a></h2>
      <h5><?php echo date("F jS ,yy", strtotime($row['date'])); ?> </h5>
      <a href="singlepage.php ?single=<?php echo $row['id']; ?>"class="button" style="color:white;"><span>Read more</span></a>
    
     </div> 
    <?php } ?>
  
    
 
  </div>
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
