<?php
if(empty($_SESSION['username'])){
   include_once "Php/ErrorHandler2.php";
  set_error_handler("customError",E_WARNING);
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once "Php/DBConnection.php";
?>
 <link rel="stylesheet" href="CSS/button.css">
<head>
    <style>

  
button {
  background-color: #fff;
  color: #fff;
  padding: 15px 22px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  border-radius: 10%;
  border: 0px ;
}

button:hover {
  opacity: 0.5;
}
.form-control:focus {
    box-shadow: none;
    border-color: grey
}

.profile-button {
    background: rgb(99, 20, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: grey
}

.profile-button:focus {
    background: grey;
    box-shadow: none
}

.profile-button:active {
    background: grey;
    box-shadow: none
}

.back:hover {
    color: grey;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: grey;
    color: #fff;
    cursor: pointer;
    border: solid 1px grey
}
/*.All{
    background: rgba(0,0,0,.5);
    color: #fff;
}*/

    </style>

     <?php
   
    $ID1 = $_SESSION["userid"];
    $target_file="";
  if (isset($_POST['Ename'])) {
     $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);


    if($_POST['Ename']!=$_SESSION["username"]){

        $sqlh= "SELECT * FROM users WHERE username='".$_POST['Ename']."'";
        $resulth=mysqli_query($conn,$sqlh);
        if($row=mysqli_fetch_array($resulth)){
          if($row['username']==$_POST['Ename']){
          ?>
           <div class="text-center fixed-top"  style="margin-top:30px;">  
                <button class="btn btn-warning" id="Db" style="width:30%"><i class="fa fa-exclamation" aria-hidden="true"></i> Username is Already taken</button>
              </div>
          <?php
          }
        }else{

            $_POST['Ename'] = filter_var($_POST['Ename'], FILTER_SANITIZE_STRING);    
             $sqll= "UPDATE users SET username='".$_POST['Ename']."'WHERE userid =".$ID1;
             $resultt=mysqli_query($conn,$sqll);
             $_SESSION["username"]=$_POST['Ename'];
        }

    }

        if($_POST['Eemail']!=$_SESSION["email"]){
             if(!filter_var($_POST['Eemail'] , FILTER_VALIDATE_EMAIL)=== false)
        {
             $sqlk= "SELECT * FROM users WHERE email='".$_POST['Eemail']."'";
             $resultt=mysqli_query($conn,$sqlk);
             if($row=mysqli_fetch_array($resultt)){
        
            if($row['email']==$_POST['Eemail']){
            ?>
               <div class="text-center fixed-top"  style="margin-top:30px;">  
                <button class="btn btn-warning" id="Db" style="width:30%"><i class="fa fa-exclamation" aria-hidden="true"></i> Email is Already taken</button>
              </div>
              <?php
          }
        }else{
              $_POST['Eemail'] = filter_var($_POST['Eemail'], FILTER_SANITIZE_EMAIL); 
              $sql= "UPDATE users SET email='".$_POST['Eemail']."'WHERE userid =".$ID1;
              $result=mysqli_query($conn,$sql);
              $_SESSION["email"]=$_POST['Eemail'];
        }
    }else{
         ?>
        <div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-danger" id="Db" style="width:30%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Email is invalid</button>
              </div>
              <?php
    }
}

           
//////////////////////////////////////////////////////////////////////////
if(!empty($_FILES['fileToUpload']['name'])){
      $errors= array();
      $file_name = $_FILES['fileToUpload']['name'];
      $file_size = $_FILES['fileToUpload']['size'];
      $file_tmp = $_FILES['fileToUpload']['tmp_name'];
      $file_type = $_FILES['fileToUpload']['type'];
      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
      
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
      
      if(empty($errors)==true){
      $target_dir = "uploads/";
      $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
      $tmp_name = $_FILES['fileToUpload']['tmp_name'];
      $name = basename($_FILES['fileToUpload']['name']);
      move_uploaded_file($tmp_name, "$target_dir/$name");

            $_SESSION["image"] = $target_file;
            $sql2= "UPDATE users SET image='".$_SESSION["image"]."' WHERE userid =".$ID1;
            $result2=mysqli_query($conn,$sql2);
            
            }
        $src=$_SESSION['image'];
        }    
          
    }

  
  
  ?>

          
      <div id="speed2"></div>    
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
</head>
<body style="background-color:#f0f0f0;">
<div class="All">
<form name="f1" action="" method="post" enctype="multipart/form-data">
<div class="container rounded mt-5 mb-5" style="background-color: #FDDBAF;">
 
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $_SESSION['image']?>"><span class="font-weight-bold"><?php echo  $_SESSION["username"] ?></span><span class="text-black-50"><?php echo $_SESSION["email"] ?></span><span>Select an image to upload: 
        <input type="file" name="fileToUpload" id="fileToUpload"> </span>


            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name = "Ename" minlength="10"
       maxlength="20" size="20" class="form-control" value="<?php echo  $_SESSION["username"] ?>" onkeyup="lettersandnumbers(this)" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="email" name = "Eemail" class="form-control" value="<?php echo $_SESSION["email"] ?>"></div>
                    <div class="col-md-12"><label class="labels">Gender:</label>
                    <br><?php echo $_SESSION["gender"] ?></div>

                </div>
                <div class="mt-5 text-center"><button style="background-color: grey ;" class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience" style = "margin-left: 35%;" ><span>Role</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;<?php echo $_SESSION["Type"] ?></span></div><br>
                
            </div>
        </div>
        
    </div>
</div>

</div>

</div>

</form>
</div>
<div class="All">
<form action="" method="post" enctype="multipart/form-data">
<div class="container rounded mt-5 mb-5" style="background-color: #FDDBAF;">
        <div class="col-md-5 border-right ">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Change Password</h4>
                </div>
               
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Old Password</label><input type="password" name = "Epassword1" class="form-control" required></div>
                  <div class="col-md-12"><label class="labels">New Password</label><input type="password" name = "Epassword2" minlength="10"
       maxlength="20" size="20" class="form-control" required></div>

                </div>
                <div class="mt-5 text-center"><button style="background-color: grey ;" class="btn btn-primary profile-button" type="submit">Update Password</button></div>
            </div>
            
        </div>
        
        
    </div>

</form>
</div>
<div class="text-center fixed-top" style="width:70%; align-items:center; justify-content:center; margin-left: 15%;"> 
  <a href="index.php"><button class="button-17" role="button">Home</button></a>
<?php 
 if(isset($_POST['Epassword1'])){

$password=mysqli_real_escape_string($conn,$_POST['Epassword1']);
$password = md5($password);
 $ID2 = $_SESSION["userid"];



            $sql= "SELECT * FROM users WHERE username='".$_SESSION["username"]."' AND password='$password'";
            $result=mysqli_query($conn,$sql);
            if($row=mysqli_fetch_array($result)){
               $password2=mysqli_real_escape_string($conn,$_POST['Epassword2']);
                $password2 = md5($password2);
                // echo $password2;
               $sql2= "UPDATE users SET `password`='".$password2."' WHERE userid =".$ID2;
               $result2=mysqli_query($conn,$sql2) or die($conn->error);
               if($result2){
                  ?>
                  <div class="text-center fixed-top"  style="margin-top:30px;">  
                <button class="btn btn-success" id="Db" style="width:30%;height:70px"><i class="fa fa-smile-o" aria-hidden="true"></i>
                 The password is successfuly changed</button>
              </div>
               <?php
           }
             
              
             
            }
            else
            {
              ?>
            
              <div class="text-center fixed-top"  style="margin-top:30px;">  
                <button class="btn btn-danger" id="Db" style="width:30%;height:70px"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> You entered incorrect password</button>
              </div>
        
             
              <?php
            }
  }

?>
<script type="text/javascript">
    
    var myTimeout = setTimeout(timeout, 5000);
  function timeout(){ $("#Db").fadeOut("slow");}; 
  $(document).ready(function(){
  $("button").click(function (){
    // $("#Db").fadeOut();
    $("#Db").fadeOut("slow");
    // $("#Db").fadeOut(3000);
  });
 });
function lettersandnumbers(input){
  var regex=/[^a-z A-Z 0-9]/gi;
  input.value=input.value.replace(regex,"");
}
</script>

</body>
</html>
