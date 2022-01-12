<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
    <meta charset="utf-8">
    <title>courses</title>
    <link rel="stylesheet" href="CSS/courseStyle.css">
    <link rel="stylesheet" href="CSS/search.css">
   <!--  <link rel="stylesheet" href="CSS/popup2.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
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
    $counter=0;
if (empty($_SESSION['username'])) {
    ?>
   <nav>
    <div class="topnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="courses.php">COURSES</a></li>
               <!--  <li><a href="myCourses.php">My Courses</a></li> -->
                <li><a href="">CONTACT</a></li>
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

    <!-- <input type="text" name="search" placeholder="enter course name....">

    <input type="submit" name="submit" value = "Search">
 -->
  </form>
</nav>
<?php
}
else{
    ?>
<nav>
    <div class="topnav">
 <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="myCourses.php">My Courses</a></li>
                <li><a href="">Contact</a></li>
                 <?php 
                   if($_SESSION['Type']=="Adminstrator"){
                             ?>
                            <li><a href="adminPanel.php">AdminPanel</a></li>
                        
                     <?php }
                        

                        ?>
                <li><a href="profile.php"><i class="fa fa-user-circle"><?php echo $_SESSION['username'];?></i></a></li>

                <li><a href="php/signOut.php">Sign Out</a></li>
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
 }
  
?>


<div class="fasl" style="background-image: url('texture.jpg');">Discover New Courses</div>


<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><!-- <?php echo $cart_count; ?> --></span></a>
</div>


<div class="All">
<section class="course">

    <div class="row">
       <?php
       if (empty($_POST['search'])) {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        
           
            $sql= "SELECT * FROM course";
            $result=mysqli_query($conn,$sql);
    
        
            while($row=mysqli_fetch_array($result)){
                 
                ?>
               <?php if($_SESSION['Type'] != "Adminstrator" && $row['Approved'] == 0){
                            continue;
                }
                ?>
                <div class="Course-col">
                    

                  <img src="<?php echo $row['image']; ?>" height="250px" width="400px">
                  <?php //echo $row['courseId'] ?>
                  <span class="coursename"><?php echo $row['courseName']; ?></span><br>
                  <span class="instName"> <?php echo $row['instructorName']; ?></span><br>
                      <?php
                        if (!empty($_SESSION['username'])) {
                        if($_SESSION['Type']=="Adminstrator"){
                             ?>
                             <div class="box">
                            <a class="bEd" href=AddEditDelete.php?id=<?php echo $row['courseId'];?>>Edit</a>
                        </div>
                        <div class="box">
                            <a class="bEd" href=courses.php?id=<?php echo $row['courseId'];?>#popup2>Delete</a>
                        </div>

                        <?php if($row['Approved'] == 0){

                        ?>
                        <div class="box">
                            <a class="bEd" href=courses.php?id=<?php echo $row['courseId'];?>#popup4>Approve</a>
                        </div>
                        
                     <?php
                    } 
                 }
             } 

                        ?>

                  <?php echo "(".$row['enrolledSid'].")"; ?><br>

                  <!-- <?php echo $row['description'];?><br> -->

                 <span class="price"><?php echo "$".$row['coursePrice']; ?></span><br>

                  <br>
                  <?php 
                  if(!empty($_SESSION['username'])){


               $sql2= "SELECT * FROM usercourse WHERE courseid='".$row["courseId"]."' AND userId='".$_SESSION['userid']."'";
               $result2=mysqli_query($conn,$sql2);
               $row2 = mysqli_fetch_assoc($result2);
                if(isset($row2['courseId'])&&isset($row2['userid'])){
                    echo "<h4>You already have this course</h4>";
                }else{


                  ?>
                  <form method="post" action="cart.php">
                  <!-- <input type="text" name="quantity" value="1" class="form-control" /> -->
                  <input type="hidden" name="hidden_name" value="<?php echo $row["courseName"]; ?>" />
                  <input type="hidden" name="hidden_price" value="<?php echo $row["coursePrice"]; ?>" />
                  <input type="hidden" name="hidden_id" value="<?php echo $row["courseId"]; ?>" />
                  <input type="submit" id="DpS" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                  </form>
                  <?php 
                   }

                }
                else{
                    ?>
                    <form method="post" action="">
                     <input type="submit" id="DpS" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                      </form>
                      <?php
                      if(isset($_POST['add_to_cart'])){
                        ?>
                        <script>window.location.replace("LR2.php?cart=no");</script>
                        <?php
                      }

                }
                   ?>
                 <a href="index2.php?id=<?php echo $row['courseId'];?>"> <div class="star">
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
                </div>

                 
                    <?php 
                 if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query1 = "select * from course where courseId=$id";
                    $result1 = $conn->query($query1);
                    while ($row1 = mysqli_fetch_array($result1)) {
                ?>

             
                   <!--  delete popup -->
                    <div id="popup2" class="overlay">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <div  >    
                                    <form action="Php/deleteCourse.php" method="post" id="changing" enctype="multipart/form-data">

                                      <h2>DELETE CONFIRM?</h2> 

                                      <br>
                                       <input  type="hidden" name = "courseId" value= "<?php echo $row1['courseId']; ?>">
                                      
                                      <input type="submit" name = "subdelete" value="CONFIRM" >
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- popup approve -->
                    <div id="popup4" class="overlay">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <div  >    
                                    <form action="Php/approving.php" method="post" id="changing" enctype="multipart/form-data">

                                      <h2>Do you approve this course !?</h2> 

                                      <br>
                                       <input  type="hidden" name = "courseId" value= "<?php echo $row1['courseId']; ?>">
                                      
                                      <input type="submit" name = "subapprove" value="approve" >
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>       
                             
                
<?php

 }
////////////////////////////////////////////////////////////////////////////////////////////

            }
          /////////////////////////////////////////////////

            }

            ?>
             <!-- add course -->
              <div class="Course-col">
              <?php
                        if (!empty($_SESSION['username'])) {
                        if($_SESSION['Type']=="Adminstrator" ||$_SESSION['Type']=="Tutor"){
                             ?>
                            
                         <a href=AddEditDelete.php?AE=Add>
                    
                      <img src="uploads/add.png" alt="add" height="400px" width="400px">
                     </a>
                      <br>
                     <?php 
                 }
                     } 

                        ?>
      
       


                 <?php  
           
       }
           
       


       else{
$conn = new mysqli("localhost" , "root" , "" , "webdatabase");


    if($conn-> connect_error)
      die("fatal error - cannot connect to the DB");



    if(isset($_POST['submit'])) {

        $input = $_POST['search'];
        $sql = "SELECT * FROM course WHERE courseName = '$input'";

        $results = $conn-> query($sql);

        if($row = mysqli_fetch_array($results)) {

          ?>
<a href="index2.php?id=<?php echo $row['courseId'];?>">
                <div class="Course-col">
                  <img src="<?php echo $row['image']; ?>" height="250px" width="400px"></a>
                  <?php //echo $row['courseId'] ?>
                  <span class="coursename"><?php echo $row['courseName']; ?></span><br>
                  <span class="instName"> <?php echo $row['instructorName']; ?></span><br>
                  

                  <?php echo "(".$row['enrolledSid'].")"; ?><br>

                  <!-- <?php echo $row['description'];?><br> -->

                 <span class="price"><?php echo "$".$row['coursePrice']; ?></span><br>

                  <br>
                  <form method="post" action="cart.php">
                   <!-- <input type="text" name="quantity" value="1" class="form-control" /> -->
                  <input type="hidden" name="hidden_name" value="<?php echo $row["courseName"]; ?>" />
                  <input type="hidden" name="hidden_price" value="<?php echo $row["coursePrice"]; ?>" />
                  <input type="hidden" name="hidden_id" value="<?php echo $row["courseId"]; ?>" />
                  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                  </form>
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

                 </div>
                 </a>

            <?php  
        }

        else {
          echo "<br>";
          echo "<strong style = 'color:red;'>Incorrect Course Name....</strong>";
        }
    }
        
       }
        ?>
            </div>
       
  
</div>
</section>

 <?php
  $message = '';
  if(isset($_GET["success"]))
{

    $message = '
    <div class="text-center fixed-top">  
                <button class="btn btn-success" id="Db" style="width:30%"><i class="fa fa-cart-plus" aria-hidden="true"></i> Course is Added to your cart</button>
              </div>
    ';

} 
echo $message;

  ?>
  <script>
 function numbers(input){
  var regex=/[^0-9.]/gi;
  input.value=input.value.replace(regex,"");
}
 function letters(input){
  var regex=/[^a-z A-Z]/gi;
  input.value=input.value.replace(regex,"");
}
function lettersandnumbers(input){
  var regex=/[^a-z A-Z 0-9]/gi;
  input.value=input.value.replace(regex,"");
}
  var myTimeout = setTimeout(timeout, 5000);
  function timeout(){ $("#Db").fadeOut("slow");}; 
  $(document).ready(function(){
  $("button").click(function (){
    // $("#Db").fadeOut();
    $("#Db").fadeOut("slow");
    // $("#Db").fadeOut(3000);
  });
 });
 
  </script>
</body>
</html>
