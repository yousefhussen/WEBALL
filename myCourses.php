<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
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
                <li><a href="">About</a></li>
                <li><a href="courses.php">COURSES</a></li>
                <li><a href="myCourses.php">My Courses</a></li>
                <li><a href="">CONTACT</a></li>
                <li><a href="profile.php"><i class="fa fa-user-circle"><?php echo $_SESSION['username'];?></i></a></li>
                <li><a href="php/signOut.php">signOut</a></li>
            </ul>
</div>


<form method="post">
<div class="searchBox">
            <input class="searchInput"type="text" name="search" placeholder="enter course name....">
            <button class="searchButton" href="#"type="submit" name="submit" value = "Search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>

    <!-- <input type="text" name="search" placeholder="enter course name....">

    <input type="submit" name="submit" value = "Search">
 -->
  </form>
</nav>
<?php
 
 
// if (!empty($_SESSION['username'])) {
?>
   <section class="course">

    <div class="row">
    <?php
   include "Php/DBConnection.php";
            $sql= "SELECT courseId FROM userCourse WHERE userid = '".$_SESSION['userid'].
            "'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
            $sql2= "SELECT * FROM course Where courseId = '".$row['courseId']."'";
            $result2=mysqli_query($conn,$sql2);
    
        
            if($row2=mysqli_fetch_array($result2)){
                ?>
               
                 <div class="Course-col">
                  <img src="<?php echo $row2['image']; ?>" height="250px" width="400px">
                  <a class="bellIcon" href ="myCourses.php?id=<?php echo $row['courseId']; ?>#popup5"><i class='fas fa-bell'></i></a>
                  <?php //echo $row['courseId'] ?>
                  <span class="coursename"><?php echo $row2['courseName']; ?></span><br>
                  <span class="instName"> <?php echo $row2['instructorName']; ?></span><br>
                  

                  <?php echo "(".$row2['enrolledSid'].")"; ?><br>

                  <!-- <?php echo $row['description'];?><br> -->

                 <span class="price"><?php echo "$".$row2['coursePrice']; ?></span><br>
                <a href="index2.php?id=<?php echo $row['courseId'];?>"><div class="star">
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
                 
                 </div></a>
                  <br>
              </div>

            </a>
   <?php 
                 if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query1 = "select * from course where courseId=$id";
                    $result1 = $conn->query($query1);
                    while ($row4 = mysqli_fetch_array($result1)) {
                ?>

<div id="popup5" class="overlay">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <div>    
                                    <form action="" method="post" id="changing" enctype="multipart/form-data">

                                      <h2>Please Fill the following Survey For (<?php echo $row4['courseName']; ?>)</h2> 

                                      <br>
                                       <input  type="hidden" name = "courseId" value= "<?php echo $row4['courseId']; ?>">
                                       Your Name: <input type="text" name = "userName" value= "<?php echo $_SESSION['username'];  ?>"><br><br>
                                
                                      
                                      Rate the instructor from 1 to 5:<br>
                                    <input type="radio" id="e1" name="type" value="1" checked='checked'>
                                    <label for="e1">1</label>
                                    <input type="radio" id="e2" name="type" value="2" >
                                    <label for="e1">2</label>
                                    <input type="radio" id="e1" name="type" value="3">
                                    <label for="e1">3</label>
                                    <input type="radio" id="e2" name="type" value="4" >
                                    <label for="e1">4</label>
                                    <input type="radio" id="e2" name="type" value="5" >
                                    <label for="e1">5</label><br><br>
                                     
                                      Suggestions:<br><textarea rows="4" cols="50" name="description" form="changing"></textarea><br><br>
                                      
                                      <input type="submit" name = "subserv" >

                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
              <?php
          }
      }
               
               
            }
        }
        $conn->close();
        
        if (isset($_POST['subserv'])) {
            include "Php/DBConnection.php";
           
            $courseId=$_POST['courseId']; 
            $userName=$_SESSION['username'];
            $Insrate=$_POST['type'];
            $Description=$_POST['description'];
             $sessid = $_SESSION['userid'];

          

            


            $sql= " INSERT INTO `surveys`(`courseid`, `userid`, `name`, `suggestion`, `instructorRate`) VALUES 
            ('$courseId','$sessid','$userName' ,'$Description','$Insrate')";
           
             $result=mysqli_query($conn,$sql) ;
                if (!$result) {
                    echo '<div class="text-center fixed-top" style="margin-top:30px;">  
                <button class="btn btn-danger" id="Db" style="width:30%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Already survied this course</button>
              </div>'; 
                }
            
           
           
            
        }
    

     ?>

 <script>
  var myTimeout = setTimeout(timeout, 5000);
  function timeout(){ $("#Db").fadeOut("slow");}; 
  $(document).ready(function(){
  $("button").click(function (){
    // $("#Db").fadeOut();
    $("#Db").fadeOut("slow");
    // $("#Db").fadeOut(3000);
  });
 });
  
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

