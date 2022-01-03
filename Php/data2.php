


    <?php 

    
       
    
    $output = "";
              include"DBConnection.php";
          $userid = mysqli_real_escape_string($conn, $_GET['userid']);

        
          $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$userid}");
          if(mysqli_num_rows($sql2) > 0){
            $row2 = mysqli_fetch_assoc($sql2);
          }

         $sql3 = "UPDATE `messages` SET `seen`='1' WHERE  `outgoing_msg_id` = ".$userid ;
        $query3 = mysqli_query($conn, $sql3);
        
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
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="'. $row2['unique_id'] .'" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
      ';

    echo $output;
    
?>
