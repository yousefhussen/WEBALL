

<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        
       if(mysqli_num_rows($query2) > 0) {
           if($_SESSION['Type'] == "Auditor") {
            $result = "View Messages....";
           }
           else {
            $result = $row2['msg'];
            if ($row2['image?']==1) {
                 $result =  substr($result, 8 , strlen($result)-1);
             }  


           }    
        

       }
       else {
           if($_SESSION['Type'] == "Auditor") 
            $result = "View Messages....";
           
           else 
            $result ="No message available";
       }  
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        if(isset($row2['outgoing_msg_id'])){

            if($outgoing_id == $row2['outgoing_msg_id']) {
                if($_SESSION['Type'] == "Auditor") {
                    $you = " ";
                }
                else {
                    $you = "You: ";
                }
               
            }
            else {
                $you = "";
            }   
        }else{
            $you = "";
        } 
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

            if(mysqli_num_rows($query2) == 0)
                {
                          $output .= '<a onclick="msgChat( '.$row['unique_id'].' )"  >
                    <div id = "speedo" class="content">
                    <img   src="'. $row['image'] .'" alt="">
                    <div class="details">
                        <span>'.  $row['username'] .'</span>
                        <p style="">'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
                } 

        else if ($row2['seen']==0) {

            if ($outgoing_id == $row2['outgoing_msg_id']) {

                   $output .= '<a onclick="msgChat( '.$row['unique_id'].' )"  >
                    <div id = "speedo" class="content">
                    <img   src="'. $row['image'] .'" alt="">
                    <div class="details">
                        <span>'.  $row['username'] .'</span>
                        <p style="  font-style:  italic; ">'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
            }
            else{
                 
                  $output .= '<a onclick="msgChat( '.$row['unique_id'].' )"  >
                    <div id = "speedo" class="content">
                    <img   src="'. $row['image'] .'" alt="">
                    <div class="details">
                        <span>'.  $row['username'] .'</span>
                        <p style="  text-decoration: underline; font-weight:bold; color:blue;">'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
            }
             
            
        }
        else{

        $output .= '<a onclick="msgChat( '.$row['unique_id'].' )"  >
                    <div id = "speedo" class="content">
                    <img   src="'. $row['image'] .'" alt="">
                    <div class="details">
                        <span>'.  $row['username'] .'</span>
                        <p style="  font-style:  italic;">'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
            }
    }
?>

