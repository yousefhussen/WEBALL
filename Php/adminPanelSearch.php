<?php 
// $str=$_GET['order'];
require_once "DBConnection.php";



// echo $_REQUEST['id'];
  $query = "SELECT * FROM `users` WHERE (username LIKE '%".$_GET['id']."%'
   OR username LIKE '%".$_GET['id']."%'
   OR status LIKE '%".$_GET['id']."%'
   OR email LIKE '%".$_GET['id']."%'
   OR type LIKE '%".$_GET['id']."%'
   )";
  

  
$result = $conn->query($query);
$html = '';
while($row = mysqli_fetch_assoc($result))
  {
  
$html .='


    <li  class="w3-bar  w3-white  w3-margin-top"  style="border-radius: 7px ;">

      <div class="content w3-right " style="margin: 5px">
                <div  >
                    <form action="php/changePermission.php" method="post" id="changing" class="myform" enctype="multipart/form-data">

                        <h2>Permission Select</h2>

                        <br>
                        <input  type="hidden" name = "useridd" value= "'. $row['userid'].'">
                        
                        <label for="e1" class="container">Administartor</label><br>
                        <input type="radio" id="e1" name="type" value="Administartor" checked="checked">
                        
                         <label for="e2" class="container">Tutor</label><br>
                        <input type="radio" id="e2" name="type" value="Tutor" >
                        <label for="e3" class="container">Student</label><br>
                        <input type="radio" id="e3" name="type" value="Student" >
                        <label for="e4" class="container">Auditor</label><br>
                        <input type="radio" id="e4" name="type" value="Auditor" >
                       <br>
                        <input type="submit" name = "subedit" value="confirm" >

                    </form>
                
        </div>
    </div>
       
        <div class="box w3-right ">
            <a class="bEd" style="text-decoration: none" >'.$row['type'].'</a>
        </div>
      <img src="'.$row['image'].'" class="w3-bar-item  " style="max-height:10%;width:15%;border-radius: 50px ">
      <div class="w3-bar-item">
        <span class="w3-large">'.$row['username'].'</span><br>
        <span> '.$row['email'].'</span>
      </div> 
        
          
    </li>
   
         ';
}
  echo $html;
?>