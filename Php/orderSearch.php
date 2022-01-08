<?php 
// $str=$_GET['order'];
$servername = "localhost";
$username ="root";
$password = "";
$DB = "webdatabase";
$conn = mysqli_connect($servername,$username,$password,$DB);

// echo $_REQUEST['id'];
  $query = "SELECT * FROM `usercourse` WHERE (userid LIKE '%".$_GET['id']."%'
   OR username LIKE '%".$_GET['id']."%'
   OR courseName LIKE '%".$_GET['id']."%'
   OR courseId LIKE '%".$_GET['id']."%'
   OR Price LIKE '%".$_GET['id']."%'
   OR Date LIKE '%".$_GET['id']."%'
   )";
  

  
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


//  $html .= "<div class='row mb-3'>

                    

//                         <div class='col-sm-11'>

//                         <div class='card'>

//                         <div class='card-header'><b>".$row["username"]."</b></div>

//                         <div class='card-body'>
//                         <br />

//                         ".$row["courseName"]."

//                         </div>

//                         <div class='card-footer text-right'>On ".$row["Date"]."</div>
//                         ".$row["Price"]."

//                         </div>

//                         </div>

//                         </div>

//                         ";

// }

}
  echo $html;
?>