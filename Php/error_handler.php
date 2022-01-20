<?php

function customError($error_level, $error_message, $error_file, $error_line) {
    $servername = "localhost";
    $username ="root";
    $password = "";
    $DB = "webdatabase";
    
    $conn = mysqli_connect($servername,$username,$password,$DB);
    $err_data = "INSERT INTO `errors`(`level`, `message`, `fileLoc`, `lineNum`) VALUES ('".$error_level."','".$error_message."','".$error_file."','".$error_line."')";
    
    $query1=mysqli_query($conn,$err_data) or die($conn->error);
   ?>
    <script>window.location.replace("../index.php?msg3=error");</script>
    <?php
    die();
  }


?>