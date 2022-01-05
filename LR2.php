<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php session_start();?>
	<title>LR</title>
	<link rel="stylesheet" href="CSS/LR2.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 <div class="container">
 	<div class="cardd">
 		<div class="inner-box" id="cardd">
 			<div class="cardd-front">
 				<h2>Login</h2>
 		<form action="LR2.php" method="post">
         
        <!-- <label for="Lname">Username</label> -->
        <input type="text" class="input-box" placeholder="Username" name="Lname" required>

        <!-- <label for="Lpsw">Password</label> -->
        <input type="password" class="input-box" placeholder="Password" name="Lpsw" required>
          
        <button type="submit" class="mt-5 mb-5" class="submitt-btnn">Log In</button>
        <input type="checkbox" name="checkbox"><span>Rememeber Me</span>
        
        
     </form>
     <button type="button" class="btnn" onclick="openRegister()">I'm New Here</button>
 		  </div>
 			<div class="cardd-back">
 		<form action="LR2.php" method="post" enctype="multipart/form-data">

      <h2>Register</h2> 

      <!-- <label for="uname"><b>Username</b></label> -->
      <input type="text" class="input-box" placeholder="Enter Username" name="unameR" minlength="7"
       maxlength="20" size="20" required>
      <!-- <label for="psw"><b>Password</b></label> -->
      <input type="password" class="input-box" placeholder="Enter Password" name="pswR" minlength="10"
       maxlength="20" size="20" required>

      <!-- <label for="EM"><b>Email</b></label> -->
      <input type="text" class="input-box" placeholder="Enter Your Email" name="EM" required>
      <div class="gender">
          <input type="radio" name="gender" value="male" required> Male
          <input type="radio" name="gender" value="female" required> Female
     </div>
    <div class="photo">

      <!-- <label class="header">Profile Photo:</label> -->
      <!-- <input id="image" type="file" name="profile_photo" placeholder="Photo"  capture> -->
      <!-- <form action = "upload.php" method = "post" > -->
        Select an image to upload: 
        <input type="file" name="fileToUpload" id="fileToUpload">
        <!-- <input type="submit" value="Upload Image" name="submit"> -->
    
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
  <div class="text-center fixed-top ">  
                <button class="btn btn-info" id="Db" style="width:30%;height:70px"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> You need to be logged, in order to buy</button>
              </div>
              <?php
}






///////////////////////////////////////////////////////////////////////
  $sora="images.png";
 if(!empty($_FILES['fileToUpload']['name'])){
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);

    echo $target_dir;

   
        if($_FILES['fileToUpload']['size']>1000000)
            echo "the file is too large";

    echo "<br> the file type ".$_FILES['fileToUpload']['type']."<br>";

    if($_FILES['fileToUpload']['type']== "image/jpeg")
        echo "the file is accepted";
    else
        echo "File has to be a jpeg image";


    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $name = basename($_FILES['fileToUpload']['name']);
    move_uploaded_file($tmp_name, "$target_dir/$name");
    

}else{

     $target_dir = "uploads/";
     $target_file = $target_dir.$sora;
 }


  /////////////////////////////////////////////////////////////////////////
 $x=true;
  if (isset($_POST['Lname'])) {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        
            $name=$_POST['Lname'];
            $password=$_POST['Lpsw'];
            $sql= "SELECT * FROM users WHERE username='".$name."' AND password='".$password."'";
            $result=mysqli_query($conn,$sql);
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
            //mysqli_num_rows($result)==1
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
             //remeber to tsheel id mn elink 3lsah nelzft speeddddd

            exit();
            }
            else
            {
              ?>
            
              <div class="text-center fixed-top ">  
                <button class="btn btn-danger" id="Db" style="width:30%;height:70px"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> You entered incorrect username or password</button>
              </div>
        
             
              <?php
            }
  }
  if(isset($_POST['unameR'])){

     function sql1($Data1,$Data2,$Data3,$Data4,$Data5,$Data6)
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
           <div class="text-center fixed-top">  
                <button class="btn btn-warning" id="Db" style="width:30%"><i class="fa fa-exclamation" aria-hidden="true"></i> Username is Already taken</button>
              </div>
          <?php
          }
          else if($row['email']==$Data3){
            ?>
               <div class="text-center fixed-top">  
                <button class="btn btn-warning" id="Db" style="width:30%"><i class="fa fa-exclamation" aria-hidden="true"></i> Email is Already taken</button>
              </div>
              <?php
          }
        }
        else
        {
           $sql= "INSERT INTO users (username, password, email,image,type,gender,unique_id) VALUES ('$Data1', '$Data2', '$Data3','$Data4','$Data5','$Data6','$ran_id')";

        if($conn->query($sql)=== TRUE){
         echo "Yeaaaah";
        }
        else
        {
            echo "Error: ".sql."<br>".$conn->error;
        }
        $conn->close();
        }
        //$conn->close();

       }
       else{
        ?>
        <div class="text-center fixed-top">  
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
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
          //  mysqli_num_rows($result)==1
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
 

$name=$_POST['unameR'];
$password=$_POST['pswR'];
$Email=$_POST['EM'];
$image=$target_file;
$gender=$_POST['gender'];
$type="Student";
 
sql1($name,$password,$Email,$image,$type,$gender);
Sql2($name,$password);

  }

      ?>
 <script>
  var myTimeout = setTimeout(timeout, 5000);
  function timeout(){ $("#Db").fadeOut("slow");}; 
  $(document).ready(function(){
  $("button").click(function (){
    // $("#Db").fadeOut();
    $("#Db").fadeOut("slow");
    // $("#Db").fadeOut(3000);
  });
 });
  
 	var card = document.getElementById('cardd');
 	function openRegister(){
 		card.style.transform="rotateY(-180deg)";
 	}
 	function openLogin(){
 		card.style.transform="rotateY(0deg)";
 	}
 
 </script>



</body>
</html>