<?php
session_start();

  if($_SESSION['Type']!="Adminstrator"){
   include_once "Php/ErrorHandler.php";
  set_error_handler("customError",E_WARNING);
  }


function customError($error_level, $error_message, $error_file, $error_line) {
  $servername = "localhost";
  $username ="root";
  $password = "";
  $DB = "webdatabase";
  
  $conn = mysqli_connect($servername,$username,$password,$DB);
  $err_data = "INSERT INTO `errors`(`level`, `message`, `fileLoc`, `lineNum`) VALUES ('".$error_level."','".$error_message."','".$error_file."','".$error_line."')";
  
  $query1=mysqli_query($conn,$err_data) or die($conn->error);
 ?>
  <script>window.location.replace("index.php?msg3=error");</script>
  <?php
  die();
}


set_error_handler("customError", E_ALL);

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" href="CSS/profilesListing.css">
   <link rel="stylesheet" href="CSS/previewImage.css">
   <link rel="stylesheet" href="CSS/search.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body background="background1.jpg" style="background-repeat: round; width: auto; height: auto;">

    <nav>
        <div class="topnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="adminPanel.php">ADMINPANEL</a></li>
                <li><a href="profile.php"><i class="fa fa-user-circle"><?php echo $_SESSION['username'];?></i></a></li>
                <li><a href="php/signOut.php">SignOut</a></li>
            </ul>
        </div>


        <form method="post">
            <div class="searchBox">
                <input class="searchInput"type="text" name="search" id="search" placeholder="enter account name...." onkeyup="myFunction()" >
                <button class="searchButton" href="#"type="submit" name="submit1" value = "Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>

        </form>
    </nav>

<div id="searchResult" class="w3-container w3-margin-top "><ul class="w3-ul w3-card-4">


 
    </ul></div>



</body>
<script type="text/javascript">
 myFunction();
 
  function myFunction() {

  var x = document.getElementById("search");
  // x.value = x.value.toUpperCase();
    let xhr2 = new XMLHttpRequest();
       xhr2.open("GET", "php/adminPanelSearch.php?id="+x.value, true);
       xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
          let data2 = xhr2.response;
            document.getElementById("searchResult").innerHTML = data2;
         }
      }
    }
    xhr2.send();

   }
 </script>

</html>

