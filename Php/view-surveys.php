<?php 
// $str=$_GET['order'];
require_once "DBConnection.php";

 session_start();
// echo $_REQUEST['id'];
  $query = "SELECT * FROM `surveys` WHERE `instructorId` = '".$_SESSION['userid']."' ORDER BY `courseName`";

  

  
$result = $conn->query($query);
$html = '';
while($row = mysqli_fetch_assoc($result))
  {
  
$html .="<div class='card text-center'>
  <div class='card-header'>
  <b>Student Name: </b> ".$row["name"]."
  </div>
  <div class='card-body'>
    <h5 class='card-title'><b>Course Name: </b>".$row["courseName"]."</h5><hr>
    <p class='card-text'><h3>".$row["suggestion"]."</h3></p> <hr>
    <p class='card-text'><h3><b>Did he enjoy this course?<br></b>".$row["enjoyed?"]."</h3></p>
  </div>
</div>";



}
  echo $html;
?>