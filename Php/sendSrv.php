
            <?php 
    require_once "DBConnection.php";
            $courseId=$_GET['courseId']; 
           
            
            $sql= "UPDATE `usercourse` SET `sent?`=1  WHERE courseId ='".$courseId."'";
            $result=mysqli_query($conn,$sql);
            if ( $result) {
                echo '<div class="text-center fixed-top" style="margin-top:30px;">  
                      <button class="btn btn-success" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Sent Surveys to All Students </button>
                    </div>';
            }
            else
            {
                  echo '<div class="text-center fixed-top" style="margin-top:30px;">  
                      <button class="btn btn-danger" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error hapenned </button>
                    </div>';
            }
            ?>
          
          
            