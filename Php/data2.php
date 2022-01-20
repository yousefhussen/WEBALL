


    <?php 

    
    session_start();
//     include_once "ErrorHandler4.php";
// set_error_handler("customError",E_ALL);
    $output = "";
              include"DBConnection.php";
          $userid = mysqli_real_escape_string($conn, $_GET['userid']);

        
          $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$userid}");
          if(mysqli_num_rows($sql2) > 0){
            $row2 = mysqli_fetch_assoc($sql2);
          }

         $sql3 = "UPDATE `messages` SET `seen`='1' WHERE  `outgoing_msg_id` = ".$userid ;
        $query3 = mysqli_query($conn, $sql3);
        
        if($_SESSION['Type'] != "Auditor") {
          $output .= '<header>
       
          <!-- back iconaaaaa -->
          <a  class="back-icon" onclick= "back_icon('.$_GET['userid'].')" ><i class="fas fa-arrow-left"></i></a>
          <img src="'. $row2['image'] .'" alt="">
          <div class="details">
            <span>'. $row2['username'] .'</span>
            <p>'. $row2['status'] .'</p>
          </div>
        </header>
        <div class="chat-box">
  
        </div>
        <form action="#" class="typing-area" id = "uploadImage"  enctype="multipart/form-data">
          <div class="image-upload">
            
              <label for="uploadFile">
                <i class="fa fa-upload" aria-hidden="true"></i>
              </label>

              <input name="uploadFile" id="uploadFile" type="file" onchange="showPreview(event)">
              <input type="text" class="hiddenImageName" name="hiddenImageName" hidden>
          </div>
            
          <input type="text" class="incoming_id" name="incoming_id" value="'. $row2['unique_id'] .'" hidden>
          <input type="text" id = "input-field" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
          <button><i class="fab fa-telegram-plane"></i></button>
        </form>
        ';
  
        }

        else {

     
        $output .= '<header>
       
        <!-- back iconaaaaa -->
        <a  class="back-icon" onclick= "back_icon('.$_GET['userid'].')" ><i class="fas fa-arrow-left"></i></a>
        <img src="'. $row2['image'] .'" alt="">
        <div class="details">
          <span>'. $row2['username'] .'</span>
          <p>'. $row2['status'] .'</p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area" style="visibility:hidden;">
          <input  type="text" class="incoming_id" name="incoming_id" value="'. $row2['unique_id'] .'" hidden>
          <input  type="text" class="msg_id" name="msg_id" value="" hidden>
          <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
          <button><i class="fab fa-telegram-plane"></i></button>
        </form>
      ';
    }

    echo $output;
    
?>


<style>
.image-upload > input
{
    display: none;
}
.image-upload {
  margin-top:8px;
  margin-right:5px;
  
}


</style>

<script>
  // $('#uploadFile').on('change', function() {
  //     $('#uploadImage').ajaxSubmit({
  //         target: '#input-field',
  //         resetForm:true;
  //     });
  // });


</script>
