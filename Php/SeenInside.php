 <?php

            require_once "DBConnection.php";
            $userid = mysqli_real_escape_string($conn, $_GET['userid']);
             $sql33 = "UPDATE `messages` SET `seen`='1' WHERE  `outgoing_msg_id` = ".$userid ;
        $query33 = mysqli_query($conn, $sql33);

         ?>