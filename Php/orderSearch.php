<?php 
$str=$_GET['order'];
$servername = "localhost";
$username ="root";
$password = "";
$DB = "webdatabase";
$conn = mysqli_connect($servername,$username,$password,$DB);
// $sql="SELECT * FROM usercourse as joex,course as speed WHERE joex.username='salah' AND speed.courseId=joex.courseId";
$sql="SELECT * FROM usercourse as joex,course as speed WHERE speed.courseId=joex.courseId ORDER BY username  DESC";
$result = $conn->query($query);
$html = '';

// $_GET['str'];
while($row = mysqli_fetch_assoc($result))
	{
  $html .= "<div class='row mb-3'>

                     
                        <div class='col-sm-11'>

                        <div class='card'>

                        <div class='card-header'><b>".$row["user_Name"]."</b></div>

                        <div class='card-body'>
                   
                        <br />

                        ".$row["user_review"]."

                        </div>

                        <div class='card-footer text-right'>On ".$row["datetime"]."</div>

                        </div>

                        </div>

                        </div>

                        ";


    }
  echo $html;



?>