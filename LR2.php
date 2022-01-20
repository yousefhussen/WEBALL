<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php session_start();
    include_once "php/DBConnection.php";
  ?>

	<title>LR</title>
	<link rel="stylesheet" href="CSS/LR2.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div id="speed2"></div>
 <div class="container">
 	<div class="cardd">
 		<div class="inner-box" id="cardd">
 			<div class="cardd-front">
 				<h2>Login</h2>
 		<form action="LR2.php" method="post">
         
        <!-- <label for="Lname">Username</label> -->
        <input type="text" class="input-box" placeholder="Username" name="Lname" required onkeyup="lettersandnumbers(this)">

        <!-- <label for="Lpsw">Password</label> -->
        <input type="password" class="input-box" placeholder="Password" name="Lpsw" required>
          
        <button type="submit" class="submitt-btnn mt-5 mb-5">Log In</button>
        <!-- <input type="checkbox" name="checkbox"><span>Rememeber Me</span> -->
        
        
     </form>
     <button type="button" class="btnn" onclick="openRegister()">I'm New Here</button>
 		  </div>
 			<div class="cardd-back">
 		<form name="f1" action="LR2.php" method="post" onsubmit="return matchpass()" enctype="multipart/form-data">

      <h2>Register</h2> 

   
      <input type="text" class="input-box" placeholder="Enter Username" name="unameR" minlength="7"
       maxlength="20" size="20" required onkeyup="lettersandnumbers(this)">
     
      <input type="password" class="input-box" placeholder="Enter Password" name="pswR" minlength="10"
       maxlength="20" size="20" required>

       <input type="password" class="input-box" placeholder="ReEnter Password" name="pswR2" minlength="10"
       maxlength="20" size="20" required>
     
      <input type="email" class="input-box" placeholder="Enter Your Email" name="EM" required>
      <div class="gender">
          <input type="radio" name="gender" value="male" required> Male
          <input type="radio" name="gender" value="female" required> Female
     </div>
    <div class="photo">

    
        Select an image to upload: 
        <input type="file" name="fileToUpload" id="fileToUpload">
      
    </div>   
      <button class="submitt-btnn" type="submit">Register</button>
     
    </form>
    <button type="button" class="btnn" onclick="openLogin()">I've an account</button>
 			</div>
 		</div>
 	</div>
 </div>
  <?php
////////////////////////////////////////////////////////////////////
if(isset($_GET['cart'])){
  ?>
  <div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-info" id="Db" style="width:30%;height:70px"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> You need to be logged, in order to buy</button>
              </div>
              <?php
}

  if (isset($_POST['Lname'])) {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        
            // $name=$_POST['Lname'];
            // $password=$_POST['Lpsw'];
            $name=mysqli_real_escape_string($conn,$_POST['Lname']);
            $password=mysqli_real_escape_string($conn,$_POST['Lpsw']);
            $password = md5($password);
            $_POST['Lname'] = filter_var($_POST['Lname'], FILTER_SANITIZE_STRING);
            $sql= "SELECT * FROM users WHERE username='".$name."' AND password='$password'";
            $result=mysqli_query($conn,$sql);
            if($row=mysqli_fetch_array($result)){
               $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                $result2=mysqli_query($conn,$sql);
            $_SESSION["Type"]=$row[0];
            $_SESSION["userid"]=$row[1];
            $_SESSION["email"]=$row[2];
            $_SESSION["Password"]=$row[3];
            $_SESSION["username"]=$row[4];
            $_SESSION["gender"]=$row[5];
            $_SESSION["image"]=$row[6];
            $_SESSION["unique_id"]=$row[8];
              ?>

            <script>window.location.replace("index.php");</script>
             <?php

            exit();
            }
            else
            {
              ?>
            
              <div class="text-center fixed-top"  style="margin-top:30px;">  
                <button class="btn btn-danger" id="Db" style="width:30%;height:70px"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> You entered incorrect username or password</button>
              </div>
        
             
              <?php
            }
  }
  if(isset($_POST['unameR'])){

     function sql1($Data1,$Data2,$Data3,$Data5,$Data6)
      {
       
        if(!filter_var($Data3 , FILTER_VALIDATE_EMAIL)=== false)
        {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $ran_id = rand(time(), 100000000);
        $conn = mysqli_connect($servername,$username,$password,$DB);
        $sql= "SELECT * FROM users WHERE username='".$Data1."' OR email='".$Data3."'";
        $result=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_array($result)){
          if($row['username']==$Data1){
          ?>
           <div class="text-center fixed-top"  style="margin-top:30px;">  
                <button class="btn btn-warning" id="Db" style="width:30%"><i class="fa fa-exclamation" aria-hidden="true"></i> Username is Already taken</button>
              </div>
          <?php
          }
          else if($row['email']==$Data3){
            ?>
               <div class="text-center fixed-top"  style="margin-top:30px;">  
                <button class="btn btn-warning" id="Db" style="width:30%"><i class="fa fa-exclamation" aria-hidden="true"></i> Email is Already taken</button>
              </div>
              <?php
          }
        }
        else
        {
          /////////////////////////////////////////////////////////////////////
 $sora="images.png";
  $target_file="";
   if(!empty($_FILES['fileToUpload']['name'])){
      $errors= array();
      $file_name = $_FILES['fileToUpload']['name'];
      $file_size = $_FILES['fileToUpload']['size'];
      $file_tmp = $_FILES['fileToUpload']['tmp_name'];
      $file_type = $_FILES['fileToUpload']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)===false){
        ?>
          <div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-danger" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> extension not allowed,please choose a JPEG or PNG file </button>
              </div>
              <?php
              $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
        ?>
        <div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-info" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> File size must be excately 2 MB or less</button>
              </div>
              <?php
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
          $target_dir = "uploads/";
      $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
      $tmp_name = $_FILES['fileToUpload']['tmp_name'];
      $name = basename($_FILES['fileToUpload']['name']);
      move_uploaded_file($tmp_name, "$target_dir/$name");
        $Data1 = filter_var($Data1, FILTER_SANITIZE_STRING);  
        $Data3 = filter_var($Data3, FILTER_SANITIZE_EMAIL);  
           $sql= "INSERT INTO users (username, password, email,image,type,gender,unique_id) VALUES ('$Data1', '$Data2', '$Data3','$target_file','$Data5','$Data6','$ran_id')";

       $result4=mysqli_query($conn,$sql);
        }

       }
       else{

      $target_dir = "uploads/";
      $target_file = $target_dir.$sora;
        $Data1 = filter_var($Data1, FILTER_SANITIZE_STRING); 
        $Data3 = filter_var($Data3, FILTER_SANITIZE_EMAIL);  
           $sql= "INSERT INTO users (username, password, email,image,type,gender,unique_id) VALUES ('$Data1', '$Data2', '$Data3','$target_file','$Data5','$Data6','$ran_id')";

        $result5=mysqli_query($conn,$sql);
        }
      
      }
     }

   
        
       else{
        ?>
        <div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-danger" id="Db" style="width:30%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Email is invalid</button>
              </div>
              <?php
       }
}

      function Sql2($Data1,$Data2){
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);
        $sql= "SELECT * FROM users WHERE username='".$Data1."' AND password='".$Data2."'";

         $result=mysqli_query($conn,$sql);
          
            if($row=mysqli_fetch_array($result)){
              $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                $result2=mysqli_query($conn,$sql);
            $_SESSION["Type"]=$row[0];
            $_SESSION["userid"]=$row[1];
            $_SESSION["email"]=$row[2];
            $_SESSION["Password"]=$row[3];
            $_SESSION["username"]=$row[4];
            $_SESSION["gender"]=$row[5];
            $_SESSION["image"]=$row[6];
            $_SESSION["unique_id"]=$row[8];
              ?>
            <script>window.location.replace("index.php");</script>
             <?php
            exit();
            }
      }
 


$name=mysqli_real_escape_string($conn,$_POST['unameR']);
$password=mysqli_real_escape_string($conn,$_POST['pswR']);
$password = md5($password);

$Email=$_POST['EM'];
$gender=$_POST['gender'];
$type="Student";
 
sql1($name,$password,$Email,$type,$gender);
Sql2($name,$password);

}

      ?>
 <script type="text/javascript">
  
  var myTimeout = setTimeout(timeout, 5000);
  function timeout(){ $("#Db").fadeOut("slow");}; 
  $(document).ready(function(){
  $("button").click(function (){
    $("#Db").fadeOut("slow");
  });
 });
  
 	var card = document.getElementById('cardd');
 	function openRegister(){
 		card.style.transform="rotateY(-180deg)";
 	}
 	function openLogin(){
 		card.style.transform="rotateY(0deg)";
 	}
 
function lettersandnumbers(input){
  var regex=/[^a-z A-Z 0-9]/gi;
  input.value=input.value.replace(regex,"");
}
function matchpass(){  
var firstpassword=document.f1.pswR.value;  
var secondpassword=document.f1.pswR2.value;  
  
if(firstpassword==secondpassword){  
return true;  
}  
else{  
var data="<div class='text-center fixed-top' style='margin-top:30px;'>  <button class='btn btn-info' id='Db' style='width:30%'><i class='fa fa-exclamation-circle' aria-hidden='true'></i> password must be same!</button></div>"
  document.getElementById("speed2").innerHTML=data
  
return false;  
 }  
}  

 </script>
</body>
</html>