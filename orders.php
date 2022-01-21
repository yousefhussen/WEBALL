<html>
	<head>
    <?php session_start();?>
    <link rel="stylesheet" href="CSS/order.css">
    <link rel="stylesheet" href="CSS/button.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
</html>
<body>
<?php
include_once "Php/ErrorHandler.php";
  

set_error_handler("customError",E_ALL);
       // echo $test1;


if($_SESSION['Type']=="Adminstrator"){


?>
<div class="text-center fixed-top" style="width:70%; align-items:center; justify-content:center; margin-left: 15%;text-decoration: none;"> 
  <a href="index.php"><button class="button-17" role="button">Home</button></a>
 <div class="search__container">
    <p class="search__title">
        Go ahead, hover over search
        by Learner, price, date and course
    </p>
    <input class="search__input" type="text" placeholder="Search" id="fname" onkeyup="myFunction()">
     

 </div>
            <div id=order class="scroll"></div>

           
</div>
<script type="text/javascript">

 myFunction();
  function myFunction() {

  var x = document.getElementById("fname");
  // x.value = x.value.toUpperCase();
    let xhr2 = new XMLHttpRequest();
       xhr2.open("GET", "php/orderSearch.php?id="+x.value, true);
       xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
          let data2 = xhr2.response;
            document.getElementById("order").innerHTML = data2;
         }
      }
    }
    xhr2.send();

   }
 </script>
 <?php
   }
  ?>
 
</body>