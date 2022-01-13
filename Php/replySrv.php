 <?php

          session_start();
            include "DBConnection.php";
           
            $courseId=$_POST['courseId']; 
            $userName=$_SESSION['username'];
            $Insrate=$_POST['type'];
            $Description=$_POST['description'];
            $sessid = $_SESSION['userid'];

          
            // $Description = filter_var($Description, FILTER_SANITIZE_STRING); 
            
              $sql2= "UPDATE `usercourse` SET `sent?`=0  WHERE courseId ='".$courseId."'";;
           
             $result2=mysqli_query($conn,$sql2) ;

            $sql= " INSERT INTO `surveys`(`courseid`, `userid`, `name`, `suggestion`, `instructorRate`) VALUES 
            ('$courseId','$sessid','$userName' ,'$Description','$Insrate')";
           
             $result=mysqli_query($conn,$sql) ;
                if (!$result) {
                    echo '<div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-danger" id="Db" style="width:30%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Already survied this course</button>
              </div>'; 
                }
            
           
           
            
        
    

     ?>
          
              

            <script>window.location.replace("../myCourses.php");</script>