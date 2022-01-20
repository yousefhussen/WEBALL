<!DOCTYPE html>
<html>
<head>
    <?php session_start();
      if(!isset($_SESSION['username'])) {
        echo "<script>window.location.replace('index.php'); </script>";
      }
    ?>
    <meta charset="utf-8">
    <title>courses</title>
    <link rel="stylesheet" href="CSS/courseStyle.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
   
<nav>
    <div class="topnav">
 <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="myCourses.php">My Courses</a></li>
                <li><a href="profile.php"><i class="fa fa-user-circle"><?php echo $_SESSION['username'];?></i></a></li>
                <li><a href="php/signOut.php">SignOut</a></li>
            </ul>
</div>


</nav>
<div id="result">
    
</div>

<section class="course">

    <div class="row">
          <?php
          if($_SESSION['Type']=="Tutor"){
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        
           
            $sql= "SELECT * FROM course WHERE `instructorName` = '".$_SESSION['username']."'";
            $result=mysqli_query($conn,$sql);
    
        
            while($row=mysqli_fetch_array($result)){
               
               
                ?>
                
                <div class="Course-col">
                  <a href="index2.php?id=<?php echo $row['courseId'];?>">  

                  <img src="<?php echo $row['image']; ?>" height="250px" width="400px">
                  <?php //echo $row['courseId'] ?>
                  <span class="coursename"><?php echo $row['courseName']; ?></span><br>
                  <span class="instName"> <?php echo $row['instructorName']; ?></span><br>
                    <div class="box">
                        <a class="bEd" style="width: auto;" id="sendsrv" onclick="send(<?php echo $row['courseId']; ?>)" >Send Survey</a>
                    </div>
                
                         <?php echo "(".$row['enrolledSid'].")"; ?><br>
                 <span class="price"><?php echo "$".$row['coursePrice']; ?></span><br>

                  <br>

                     
                    </div><?php
                    
                 }
             

             }
                        ?>
        
    </div>
</section>



<script>
  
   function send(courseId){
    // console.log("out2");
    let xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "php/sendSrv.php?courseId="+courseId, true);
    xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
             var myTimeout = setTimeout(timeout, 5000);
            let data = xhr2.response;
           document.getElementById("result").innerHTML =data;
              console.log(data);
            
          }
      }
    }
  
    
    xhr2.send();
}

 function timeout(){ 
    document.getElementById("result").innerHTML = "";
  }
</script>
  


