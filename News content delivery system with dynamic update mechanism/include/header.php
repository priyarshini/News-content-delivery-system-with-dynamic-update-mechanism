<html>
<body>
<script>

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<div id="mySidenav" class="sidenav">
  <a  href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <a style="text-align:left;" href="dash.php">Home</a>
  <a style="text-align:left;" href="cat.php">Categories</a>
  <a  style="text-align:left;"href="post.php">Post</a>
  <a  style="text-align:left;"href="comments.php">Comments</a>
  <a style="text-align:left;"href="contact.php">Contact</a>
  <a style="text-align:left;"href="about.php">About</a>
</div>
</body>
</html>