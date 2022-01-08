
  <?php
///////////////////////////////////////////////////////////////////////




  /////////////////////////////////////////////////////////////////////////

 
         


            $courseId=$_POST['courseId']; 
            
            $userName=$_SESSION['username'];
            $Insrate=$_POST['type'];
            $Description=$_POST['description'];
             $sessid = $_SESSION['userid'];

          

            


            $sql= " INSERT INTO `surveys`(`courseid`, `userid`, `name`, `suggestion`, `instructorRate`) VALUES 
            ('$courseId','$sessid','$userName' ,'$Description','$Insrate')";
           
                  $result=mysqli_query($conn,$sql) or die($conn->error);
            
          
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
            //mysqli_num_rows($result)==1
          
              ?>

           =

            