<?php 
// $str=$_GET['order'];
$servername = "localhost";
$username ="root";
$password = "";
$DB = "webdatabase";
$conn = mysqli_connect($servername,$username,$password,$DB);

// echo $_REQUEST['id'];
  $query = "SELECT * FROM `usercourse`";
  

  
$result = $conn->query($query);
$html = '';
while($row = mysqli_fetch_assoc($result))
  {
  
$html .="<div class='card text-center'>
  <div class='card-header'>
   ".$row["username"]."
  </div>
  <div class='card-body'>
    <h5 class='card-title'>".$row["courseName"]."</h5>
    <p class='card-text'><h3>$".$row["Price"]."</h3></p>
  </div>
  <div class='card-footer text-muted'>
   ".$row["Date"]."
  </div>
</div>";



}
  echo $html;
?>