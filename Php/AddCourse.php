
            <?php 
             


require_once "DBConnection.php";

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
     move_uploaded_file($tmp_name, "E:/xamp/htdocs/WEBALL/uploads/$name");
        $approve=$_POST['approved'];
        $CourseName=$_POST['courseName'];
        $InsName=$_POST['instructorName'];
        $CoursePrice=$_POST['coursePrice'];
        $Description=$_POST['description'];
        $CourseName = filter_var($CourseName, FILTER_SANITIZE_STRING);
        $InsName = filter_var($InsName, FILTER_SANITIZE_STRING);
        $Description = filter_var($Description, FILTER_SANITIZE_STRING);  
        $CoursePrice = filter_var($CoursePrice, FILTER_SANITIZE_STRING);   
        

          $sql= "INSERT INTO `course`(`courseId`, `courseName`, `coursePrice`, `description`, `instructorName`, `image`,`Approved`) VALUES ('','".$CourseName."','".$CoursePrice."','".$Description."','".$InsName."','".$target_file."','".$approve."')";
            $result=mysqli_query($conn,$sql);
           $sql2= "INSERT INTO `ratings`(`courseid`, `star1`, `star2`, `star3`, `star4`, `star5`, `TNOR`, `Total`) VALUES ('','0','0','0','0','1','0','0')";
            $result2=mysqli_query($conn,$sql2);
           
            ?>
            <script>window.location.replace("../courses.php");</script> 
            <?php
            
            }
        }
      
        
            ?>

            