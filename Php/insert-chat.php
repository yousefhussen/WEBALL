<?php 
    session_start();
//      include_once "ErrorHandler4.php";
// set_error_handler("customError",E_ALL);
    if(isset($_SESSION['unique_id'])){


        include_once "DBConnection.php";
        //IMAGE
        if(!empty($_FILES['uploadFile']['name'])){
            $errors= array();
            $file_name = $_FILES['uploadFile']['name'];
            $file_size = $_FILES['uploadFile']['size'];
            $file_tmp = $_FILES['uploadFile']['tmp_name'];
            $file_type = $_FILES['uploadFile']['type'];
             // $file_ext=strtolower(end(explode('.',$_FILES['uploadFile']['name'])));
             $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            // $text = end(explode('.',$_FILES['uploadFile']['name']));
            // $file_ext=strtolower($text);
            
            $expensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$expensions)===false){
              
                echo '<div class="text-center fixed-top" style="margin-top:30px;">  
                      <button class="btn btn-danger" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> extension not allowed,please choose a JPEG or PNG file </button>
                    </div>';
                    
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152) {
              
              echo '<div class="text-center fixed-top" style="margin-top:30px;">  
                      <button class="btn btn-info" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> File size must be excately 2 MB or less</button>
                    </div>';
                   
               $errors[]='File size must be excately 2 MB';
            }

        }

        if(empty($errors)==true) {
            $target_dir = "uploads/";
            $target_file = $target_dir.basename($_FILES['uploadFile']['name']);
        
            
            $tmp_name = $_FILES['uploadFile']['tmp_name'];
            $name = basename($_FILES['uploadFile']['name']);
            move_uploaded_file($tmp_name, "$target_dir/$name");  
        
        
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        if($_SESSION['Type'] == "Auditor") {
            $msg_id = mysqli_real_escape_string($conn, $_POST['msg_id']);
        }
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $messageSanitize = filter_var($message, FILTER_SANITIZE_STRING);
        
        if(!empty($message)){
            if($_SESSION['Type'] == "Auditor") {
                $sql = mysqli_query($conn, "UPDATE `messages` SET `comments`='{$messageSanitize}' WHERE msg_id =".$msg_id) or die();
            }
            else {
                if(empty($_FILES['uploadFile']['name'])) {
                    $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg , `datetime` )
                    VALUES ({$incoming_id}, {$outgoing_id}, '{$messageSanitize}' ,  '".date("Y-m-d H:i:s")."' )") or die();
                    echo "aywa";
                    
                }
                else {
                    $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, `image?` , `datetime`)
                    VALUES ({$incoming_id}, {$outgoing_id}, '{$target_file}' , 1 , '".date("Y-m-d H:i:s")."' )") or die();
                    echo "else";
                }
              
            }
           
        }
    }
    }else{
        echo "??";
    }

  
?>