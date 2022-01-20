<?php 
    session_start();
//      include_once "ErrorHandler4.php";
// set_error_handler("customError",E_ALL);
    if(isset($_SESSION['unique_id'])){
        include_once "DBConnection.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM `messages` LEFT JOIN `users` ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                   
                    if($_SESSION['Type'] == "Auditor" ) {
                        ($row['comments'] > 0) ? $comment = $row['comments']: $comment = "Comment";
                        if($row['image?'] == 1)  {
                            $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <img src ="Php/'. $row['msg'] .'"  style="width: 250px; height:250px;"></img></p><button class="button-2" role="button" onclick = "commented('.$row['msg_id'].')">'.$comment.'</button>'.$row['datetime'].'
                                </div>
                                </div>';
                        }
                        else if($row['image?'] == 0) {
                            $output .= '<div class="chat outgoing">
                                <div class="details">
                                <p>'. $row['msg'] .'</p><button class="button-2" role="button" onclick = "commented('.$row['msg_id'].')">'.$comment.'</button>'.$row['datetime'].'
                                </div>
                                </div>';
                        }
                            
                        
                        
                    }
                    else {
                         if($row['image?'] == 1)  {
                            $output .= '<div class="chat outgoing">
                            <div class="details">'.$row['datetime'].'
                                <img src ="Php/'. $row['msg'] .'"  style="width: 250px; height:250px;"></img>
                            </div>
                            </div>';
                         }
                         else if($row['image?'] == 0) {
                            $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>'.$row['datetime'].'
                            </div>
                            </div>';
                         }
                        
                    }
                    
                }else{
                    if($_SESSION['Type'] == "Auditor" ) {
                       
                        ($row['comments'] > 0) ? $comment = $row['comments']: $comment = "Comment";
                        if($row['image?'] == 1) {
                            $output .= '<div class="chat incoming">
                            <img src="'.$row['image'].'" alt="">
                            <div class="details">'.$row['datetime'].'
                            <img src ="Php/'. $row['msg'] .'"  style="width: 250px; height:250px;"></img><button class="button-2" role="button" onclick = "commented('.$row['msg_id'].')">'.$comment.'</button>
                            </div>
                            </div>';
                        }
                        else if($row['image?'] == 0) {
                            $output .= '<div class="chat incoming">
                            <img src="'.$row['image'].'" alt="">
                            <div class="details">
                            <p>'. $row['msg'] .'</p></img><button class="button-2" role="button" onclick = "commented('.$row['msg_id'].')">'.$comment.'</button>'.$row['datetime'].'
                            </div>
                            </div>';
                        }
                            
                        
                   
                    }
                    else {
                        if($row['image?'] == 1) {
                            $output .= '<div class="chat incoming">
                            <img src="'.$row['image'].'" alt="">
                            <div class="details">
                            <img src ="Php/'. $row['msg'] .'" style="width: 250px; height:250px;"></img>'.$row['datetime'].'
                            </div>
                            </div>';
                        }
                        else if($row['image?'] == 0) {
                            $output .= '<div class="chat incoming">
                            <img src="'.$row['image'].'" alt="">
                            <div class="details">
                            <p>'. $row['msg'] .'</p>'.$row['datetime'].'
                            </div>
                            </div>';
                        }
                        
                    }
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        echo "??";
    }

?>

<!-- HTML !-->


<style>
/* CSS */
.button-2 {
  background-color: rgba(51, 51, 51, 0.05);
  border-radius: 8px;
  border-width: 0;
  color: #333333;
  cursor: pointer;
  display: inline-block;
  font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 500;
  line-height: 20px;
  list-style: none;
  margin: 0;
  padding: 10px 12px;
  text-align: center;
  transition: all 200ms;
  vertical-align: baseline;
  white-space: nowrap;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
</style>
