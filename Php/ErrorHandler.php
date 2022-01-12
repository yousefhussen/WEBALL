<?php

function customError ($errorno, $errormsg) {
            // echo "<b>Error:</b> [$errorno] $errormsg<br>";
            // echo "Ending Script";
            
            // die();
    header("location:index.php");
       }
    ?>