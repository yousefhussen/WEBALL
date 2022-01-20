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
    <script src= "JS/button-fade.js"></script>
</head>
<body>
  <style>

    body{
    background-color: #f0f0f0;

    }
    </style>
<body>



    <?php
    if(isset($_GET['msg'])){
  ?>
  <div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-info" id="Db" style="width:50%;height:70px"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> extension not allowed,please choose a JPEG or PNG file </button>
              </div>
              <?php
}
if(isset($_GET['msg2'])){
  ?>
  <div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-info" id="Db" style="width:50%;height:70px"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> File size must be excately 2 MB or less </button>
              </div>
              <?php
}
if(isset($_GET['msg3'])){
  ?>
  <div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-success" id="Db" style="width:50%;height:70px"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Thank You for your feedback! </button>
              </div>
              <?php
}
    $counter=0;
if (empty($_SESSION['username'])) {
    ?>
   <nav>
    <div class="topnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About</a></li>
                <li><a href="courses.php">COURSES</a></li>
                <li><a href="LR2.php"><i class="fa fa-user-circle"> Login</i></a></li> 
                 
            </ul>
</div>
<form method="post">
<div class="searchBox">
            <input class="searchInput"type="text" name="search" placeholder="enter course name....">
            <button class="searchButton" href="#"type="submit" name="submit" value = "Search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
  </form>
</nav>


<?php
}
else{
    ?>
   
     <nav>
    <div class="topnav">
              <ul>
                  <li>
                    <form method="post">
<div class="searchBox">
            <input class="searchInput"type="text" name="search" placeholder="enter course name....">
            <button class="searchButton" href="#"type="submit" name="submit" value = "Search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>


  </form>
                </li>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="courses.php">Courses</a></li>
                <?php
                if ($_SESSION['Type']=="Tutor") { ?>
                    <li><a href="tutorCourses.php">TutorCourses</a></li>
                    <li><a href="surveys-tutor.php">View Surveys</a></li>
                <?php
                }
                ?>
                
                <li><a href="myCourses.php">My Courses</a></li>
                 <?php
                       
                        if($_SESSION['Type']=="Adminstrator"){
                             ?>
                            <li><a href="adminpanel.php">ADMINPANEL</a></li>
                            <li><a id="chatIcon" class = "chatIcon" href =index.php><i class='fas fa-comment' onclick="openNav()"></i></li></a>
                        
                     <?php }
                        if($_SESSION['Type']=="Adminstrator"){
                            ?>
                             <li><a href="orders.php">Orders</a></li>
                            <?php
                        }


                        if($_SESSION['Type']=="Auditor"){
                            ?>
                             <li><a id="chatIcon" class = "chatIcon" href =index.php><i class='fas fa-comment' onclick="openNav()"></i></li></a>
                            <?php
                        }

                        ?>
                        <?php
                         if($_SESSION['Type']=="Student"){
                        ?>
                            
                            <li><a id="chatIcon" class = "chatIcon" href =index.php><i class='fas fa-comment' onclick="openNav()"></i></li></a>
                            
                     <?php }
                        

                        ?>

                <li><a href="profile.php"><i class="fa fa-user-circle"><?php echo $_SESSION['username'];?></i></a></li>
                <li><a href="php/signOut.php">SignOut</a></li>
              
            </ul>
</div>

</nav>
<?php 
}
?>
   <section class="course">

    <div class="row">
    <?php
   include "Php/DBConnection.php";
  
            $sql= "SELECT * FROM userCourse WHERE userid = '".$_SESSION['userid'].
            "'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
            $sql2= "SELECT * FROM course Where courseId = '".$row['courseId']."'";
            $result2=mysqli_query($conn,$sql2);
    
        
            if($row2=mysqli_fetch_array($result2)){
                ?>
              
                 <div class="Course-col">
                     <a href="index2.php?id=<?php echo $row['courseId'];?>">
                  <img src="<?php echo $row2['image']; ?>" height="250px" width="400px">
                  <?php
                   $sql3= "SELECT * FROM surveys WHERE userid = '".$_SESSION['userid']."' AND courseid ='".$row['courseId']."'";
                   $result3=mysqli_query($conn,$sql3);
                   if ($row3=mysqli_fetch_array($result3)>0) {
                     
                   }else{
                  if ($row['sent?']==1 ) {
                    ?>
                       <a class="bellIcon" href ="survey.php?id=<?php echo $row['courseId']; ?>"><i class='fas fa-bell'></i></a>
                       <?php
                  }
                 }
                    ?>
                  <?php //echo $row['courseId'] ?>
                  <span class="coursename"><?php echo $row2['courseName']; ?></span><br>
                  <span class="instName"> <?php echo $row2['instructorName']; ?></span><br>
                  

                  <?php echo "(".$row2['enrolledSid'].")"; ?><br>

                  <!-- <?php echo $row['description'];?><br> -->

                 <span class="price"><?php echo "$".$row2['coursePrice']; ?></span><br>
                <div class="star">
                  <?php 
                  $sql3= "SELECT * FROM ratings Where courseid = '".$row['courseId']."'";
                  $result3=mysqli_query($conn,$sql3);
                   if($row3=mysqli_fetch_array($result3)){
                    for($star = 1; $star <= 5; $star++)
                      {
                          $class_name = '';

                          if($row3['Total'] >= $star)
                          {
                               $class_name = 'text-warning';
                          }
                          else
                          {
                               $class_name = 'star-light';
                            }
                            ?>
                            <i class='fas fa-star <?php echo $class_name ?> mr-1'></i>
                            <?php
                        }
                   }
                  ?>
                 
                 </div>
                  <br>
                  </a>
              </div>


               
             <?php  
            }
        }
        $conn->close();
        
        
    

     ?>

 <script>
    function lettersandnumbers(input){
  var regex=/[^a-z A-Z 0-9]/gi;
  input.value=input.value.replace(regex,"");
}
  
  
    var card = document.getElementById('cardd');
    function openRegister(){
        card.style.transform="rotateY(-180deg)";
    }
    function openLogin(){
        card.style.transform="rotateY(0deg)";
    }
 
 </script>
 </div>

</section>

