<?php
session_start();

  if($_SESSION['Type']!="Adminstrator"){
   include_once "Php/ErrorHandler.php";
  set_error_handler("customError",E_WARNING);
  }

?>


<link rel="stylesheet" href="CSS/AddEditDelete.css">
 

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/button.css">

<a href="courses.php" style="display: flex;  position: relative; justify-content: center; text-decoration: none;"><button class="button-17" role="button" >Back to Courses</button></a>
<?php
 require_once "Php/DBConnection.php";

 function customError2($error_level, $error_message, $error_file, $error_line) {
  $servername = "localhost";
  $username ="root";
  $password = "";
  $DB = "webdatabase";
  
  $conn = mysqli_connect($servername,$username,$password,$DB);
  $err_data = "INSERT INTO `errors`(`level`, `message`, `fileLoc`, `lineNum`) VALUES ('".$error_level."','".$error_message."','".$error_file."','".$error_line."')";
  
  $query1=mysqli_query($conn,$err_data) or die($conn->error);
 ?>
  <script>window.location.replace("courses.php?msg4=error");</script>
  <?php
  die();
}


set_error_handler("customError2");
if(isset($_GET['AE'])=="Add"){
  ?>
  <div class="login-box">
 <form action="Php/AddCourse.php" method="post" enctype="multipart/form-data">

                                      <h2>Add Course</h2> 

                                      <br>
                                       <input  type="hidden" name = "courseId" >
                                        <?php
                                       $approve = 0; 
                                       if($_SESSION['Type']=="Adminstrator"){
                                            $approve = 1;
                                       }
                                       else if($_SESSION['Type']=="Tutor"){
                                            $approve = 0;
                                       }
                                        ?>
                                     
                                      <input  type="hidden" name = "approved" id="approved" value = "<?php echo $approve;?>">
                                      <div class="user-box">
                                      <input type="text" id= "cn"name = "courseName" id="courseName"  required onkeyup="letters(this)"><br><br>
                                      <label>Course Name</label>
                                       </div>
                                    <div class="user-box">

                                  <?php
                                        if($_SESSION['Type']=="Adminstrator"){

                                          $sequel = "SELECT * FROM `users` Where `type`='Tutor'";
                                          $result10= mysqli_query($conn,$sequel) or die($conn->error);
                                          ?>
                                          <h3 style="color:white;">Instructor Name</h3>


                                          <select name="tutor">
                                           <?php 
                                           while($row10=mysqli_fetch_array($result10)){
                                   echo "<option value='".$row10['userid']."|".$row10['username']."'>".$row10['username']."</option>";
                                           }
                                           ?>
                                          </select><br><br>
                                         
                                           <!--  <input type="text" name = "instructorName" id="instructorName" required onkeyup="letters(this)"><br><br> -->
                                       
                                            <?php
                                       }
                                       else if($_SESSION['Type']=="Tutor"){
                                        ?>
                                            <input type="text" name = "instructorName" id="instructorName" value="<?php echo $_SESSION['username'];?>" disabled="disabled"><br><br>
                                            <?php
                                       }
                                       ?>
                                    </div>
                                    <div class="user-box">
                                      <input type="text" name = "coursePrice" id="coursePrice" required onkeyup="numbers(this)" ><br><br>
                                       <label>Course Price</label>
                                    </div>
                                     <div class="user-box">
                                     <br><input type="text" name="description" id="description" required onkeyup="lettersandnumbers(this)"><br><br>
                                      <label>Description</label>
                                    </div>
                                    <div class="user-box">
                                          
                                      <input type="file" id="file-ip-1"  name="fileToUpload" required>
                                      
                                    </div>   
                                         
                                          
                                          <!-- <a href="" id="save_review"> -->
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <input type="submit" name="submit" class="yasser">
                                     <!--  </a> -->
                                    
                                     
                                    </form>
                                  </div>
                                  <?php
}
else{
  $sql= "SELECT * FROM course WHERE courseId = '".$_GET['id']."'";
            $result=mysqli_query($conn,$sql);
            if(!$result)
                trigger_error("Wrong SQL Statement");
            if($row=mysqli_fetch_array($result)){
  ?>
  <div class="login-box">
 <form action="Php/editCourse.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">

                                      <h2>Edit Course</h2> 

                                      <div class="user-box">
                                      <input type="text" id= "cn"name = "courseName" id="courseName" value = "<?php echo $row['courseName'];?>"  required onkeyup="letters(this)"><br><br>
                                      <label>Course Name</label>
                                       </div>
                                    <div class="user-box">
                                   <h3 style="color:white;">Instructor Name</h3>

                                   <input type="text" value = "<?php echo $row['instructorName'];?>" disabled><br><br>
                                       
                                    </div>
                                    <div class="user-box">
                                      <input type="text" name = "coursePrice" id="coursePrice" value= "<?php echo $row['coursePrice']; ?>" required onkeyup="numbers(this)" ><br><br>
                                       <label>Course Price</label>
                                    </div>
                                     <div class="user-box">
                                     <br><input type="text" name="description" id="description" value= "<?php echo $row['description']; ?>" required onkeyup="lettersandnumbers(this)"><br><br>
                                      <label>Description</label>
                                    </div>
                                    <div class="user-box">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $row['image']?>">   
                                      <input type="file" id="file-ip-1"  name="fileToUpload" >
                                      
                                    </div>   
                          
                                        <input type="submit" name="submit" class="yasser">
                                     <!--  </a> -->
                                    
                                     
                                    </form>
                                  </div>
                                  <?php
           }
}
?>




<script>
 

 function numbers(input){
  var regex=/[^0-9.]/gi;
  input.value=input.value.replace(regex,"");
}
 function letters(input){
  var regex=/[^a-z A-Z]/gi;
  input.value=input.value.replace(regex,"");
}
function lettersandnumbers(input){
  var regex=/[^a-z A-Z 0-9]/gi;
  input.value=input.value.replace(regex,"");
}
  var myTimeout = setTimeout(timeout, 5000);
  function timeout(){ $("#Db").fadeOut("slow");}; 
  $(document).ready(function(){
  $("button").click(function (){
    // $("#Db").fadeOut();
    $("#Db").fadeOut("slow");
    // $("#Db").fadeOut(3000);
  });
 });
 
 
  
</script>