<?php
session_start();

  if($_SESSION['Type']!="Adminstrator"){
   include_once "Php/ErrorHandler.php";
  set_error_handler("customError",E_WARNING);
  }

?>
<style>
#wrapper
{

  display: inline-block;
  padding:10px;
  
}
</style>

<link rel="stylesheet" href="CSS/AddEditDelete.css">

<link rel="stylesheet" href="CSS/radio.css">

 

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/button.css">

<a href="courses.php" style="display: flex;  position: relative; justify-content: center; text-decoration: none;"><button class="button-17" role="button" >Back to Courses</button></a>
<?php
 require_once "Php/DBConnection.php";



 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1 = "select * from course where courseId=$id";
    $result1 = $conn->query($query1);
    while ($row4 = mysqli_fetch_array($result1)) {
?>


  
  <div class="login-box">
 <form action="Php/replySrv.php" method="post">


                <h2>Send Survey</h2> 

                <br>
                <input  type="hidden" name = "courseId" value= "<?php echo $row4['courseId']; ?>">
                 <input  type="hidden" name = "instructorId" value= "<?php echo $row4['instructorId']; ?>">

                <div class="user-box">
                   <h2 style="color:white;"><?php echo $row4['courseName']; ?></h2>
                <input type="hidden" id= "cn" name = "courseName" id="courseName" value= "<?php echo $row4['courseName']; ?>" ><br><br>
                
                 </div>
              
              <div class="user-box">
              <input type="text" name = "userName" value= "<?php echo $_SESSION['username'];  ?>" disabled="disabled"><br><br>
             
                  
              </div>
              
              

             <h3 style="color:white;">Did you like this course ?</h3>
               <label class="radio-button">
              <input type="radio" name="type" checked="checked" value="Yes">
              <span class="label-visible">
                <span class="fake-radiobutton"></span>
                Yes
              </span>
            </label>

            <label class="radio-button">
              <input type="radio" name="type" value="No">
              <span class="label-visible">
                <span class="fake-radiobutton"></span>
                No
              </span>
            </label>
      
               <div class="user-box" style="margin-top:20px;">
               <br><input type="text" name="description" id="description" required onkeyup="lettersandnumbers(this)"><br><br>
                <label>Description</label>
              </div>

                
                  <input type="submit" name="submit" class="yasser">
               <!--  </a> -->
              
               
              </form>
            </div>
            <?php

    }
 }
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