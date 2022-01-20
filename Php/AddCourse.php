
<?php 
             

session_start();


require_once "DBConnection.php";
function customError($error_level, $error_message, $error_file, $error_line) {
  $servername = "localhost";
  $username ="root";
  $password = "";
  $DB = "webdatabase";
  
  $conn = mysqli_connect($servername,$username,$password,$DB);
  $err_data = "INSERT INTO `errors`(`level`, `message`, `fileLoc`, `lineNum`) VALUES ('".$error_level."','".$error_message."','".$error_file."','".$error_line."')";
  
  $query1=mysqli_query($conn,$err_data) or die($conn->error);
 ?>
  <script>window.location.replace("../courses.php?msg3=error");</script>
  <?php
  die();
}


set_error_handler("customError", E_ALL);
if(!empty($_FILES['fileToUpload']['name'])){

      $errors= array();
      $file_name = $_FILES['fileToUpload']['name'];
      $file_size = $_FILES['fileToUpload']['size'];
      $file_tmp = $_FILES['fileToUpload']['tmp_name'];
      $file_type = $_FILES['fileToUpload']['type'];
       
       $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)===false){
        
             
              $errors[]="extension not allowed, please choose a JPEG or PNG file.";
               ?>
        <script>window.location.replace("../courses.php?msg=no");</script>
        <?php
      }
      
      if($file_size > 2097152) {
      
       
         $errors[]='File size must be excately 2 MB';
           ?>
        <script>window.location.replace("../courses.php?msg2=no");</script>
        <?php
      }
      
      if(empty($errors)==true) {
      $target_dir = "uploads/";
      $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
      $tmp_name = $_FILES['fileToUpload']['tmp_name'];
      $name = basename($_FILES['fileToUpload']['name']);
     move_uploaded_file($tmp_name, "../uploads/$name");
        $approve=$_POST['approved'];
        $CourseName=$_POST['courseName'];

        $InsName=$_SESSION['username'];
 
          if($_SESSION['Type']=="Adminstrator"){
            $InsName=$_POST['instructorName'];
         }
         else if($_SESSION['Type']=="Tutor"){
           $InsName=$_SESSION['username'];
         }
                                      



        $CoursePrice=$_POST['coursePrice'];
        $Description=$_POST['description'];
        $CourseName = filter_var($CourseName, FILTER_SANITIZE_STRING);
        $InsName = filter_var($InsName, FILTER_SANITIZE_STRING);
        $Description = filter_var($Description, FILTER_SANITIZE_STRING);  
        $CoursePrice = filter_var($CoursePrice, FILTER_SANITIZE_STRING);   
        
      
        
     
     
        
            $sql= "INSERT INTO `course`(`courseId`, `courseName`, `coursePrice`, `description`, `instructorName`, `image`,`Approved`) VALUES ('','".$CourseName."','".$CoursePrice."','".$Description."','".$InsName."','".$target_file."','".$approve."')";
            $result=mysqli_query($conn,$sql);
            if(!$result)
                trigger_error("Wrong SQL Statement");

            
            $sql2= "INSERT INTO `ratings` (`courseid`, `star1`, `star2`, `star3`, `star4`, `star5`, `TNOR`, `Total`) VALUES ('','0','0','0','0','1','0','0')";
            $result2=mysqli_query($conn,$sql2);
            if(!$result2)
                trigger_error("Wrong SQL Statement");
           
            


            ?>
            <script>window.location.replace("../courses.php");</script> 
            <?php
            
            }
        }
      
        
?>

            