<!DOCTYPE HTML>
<html>
 <?php session_start();?>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style2.css">
    <link rel="stylesheet" href="CSS/ay7aga.css">
    <link rel="stylesheet" href="CSS/card.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <style>

    body{
        background-image: url('https://assets.codepen.io/1462889/back-page.svg');
    }
    </style>
    <section class="header">
    <?php
    setcookie('counter', 0, time() + (86400 * 30));
if (empty($_SESSION['username'])) {
    ?>
    <nav>
        <a href="index.php"><img src="images2/logo.png"></a>
        
        <div class="nav-links">

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="LR2.php"><i class="fa fa-user-circle"> Login</i></a></li>
            </ul>
            
        </div>
    </nav>
<?php
}
else{
    ?>
    <nav>
        <a href="index.php"><img src="images2/logo.png"></a>
        
        <div class="nav-links">

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="myCourses.php">My Courses</a></li>
              
                 <?php
                       
                        if($_SESSION['Type']=="Adminstrator"){
                             ?>
                            <li><a href="adminPanel.php">ADMINPANEL</a></li>
                           
                        
                     <?php }
                        if($_SESSION['Type']=="Adminstrator"){
                            ?>
                             <li><a href="orders.php">Orders</a></li>
                            <?php
                        }

                        if($_SESSION['Type']=="Auditor"){
                            ?>
                           
                            <?php
                        }

                        ?>
                        <?php
                         if($_SESSION['Type']=="Student"){
                        ?>
                            
                           
                            
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
</section>
 <?php 
        require_once "Php/DBConnection.php";
     $sql= "SELECT * FROM course WHERE courseId = '".$_GET['id']."'";
             $result=mysqli_query($conn,$sql);
             if($row=mysqli_fetch_array($result)){
   
        ?>
      <!--   3C3B3D -->
<div class="kart" style="--background:#404040; --text:white;">

  <div class="con"> 





    <img width="700px" height="400px" src="<?php echo $row['image'];?>">
      <h1>Course Name: <?php echo $row['courseName'];?></h1>
  </div>
  <div class="kart2" style="--background:#404040; --text:white;">

  <div class="con2"> 
         <h2>InstructorName: <?php echo $row['instructorName'];?></h2>

       <h4>Description: <?php echo $row['description'];?></h4>

  </div>

</div>
</div>

<?php 
}
?>
      

    </section>
    <input  type="hidden" id="get" value="<?php echo $_GET['id']; ?>">
    <div class="container" >
    	<h1 class="mt-5 mb-5">Review</h1>
    	<div class="card">
    		<div class="card-header">Sample Product</div>
    		<div class="card-body"> 
    			<div class="row" id="speed2">
                   
    				              
                        <!-- </p>
    				</div> --> -->

                
                    <!-- </div> Some thing is wrong here -->
                </div>
    				<div class="col-sm-20 text-center">
                        <?php 
                        if(!empty($_SESSION['username'])){
                            $servername = "localhost";
                            $username ="root";
                            $password = "";
                            $DB = "webdatabase";
                            $conn = mysqli_connect($servername,$username,$password,$DB);
                            $query = "SELECT * FROM `usercourse` WHERE courseId ='".$_GET['id']."' AND userId='".$_SESSION['userid']."'";
                            $query2 = "SELECT * FROM `review` WHERE courseId ='".$_GET['id']."' AND userId='".$_SESSION['userid']."'";
                             $result = $conn->query($query);
                             $row = mysqli_fetch_assoc($result);

                             $result2 = $conn->query($query2);
                             $row2 = mysqli_fetch_assoc($result2);

                             if(isset($row['username'])){
                             if(isset($row2['user_review'])){
                       
                              echo"<h3>Thank for your review</h3>";
                            }
                            else{
                            echo"<h3 class='mt-20 mb-3'>Write Review Here</h3>";
                            echo"<button type='button' name='add_review' id='add_review' class='btn btn-primary'>Review</button>";
                            }
                           }
                         else
                           {
                         echo "You need to buy the course, so you can be able to write a comments";
                        }
                        $conn->close();
                       
                        }
                    else{
                        echo "<h3>You need to be logged in, So you cad add comments</h3>";
                    }
                        ?>
    				</div>
                </div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">

	        	<input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo  $_SESSION["username"] ?>" disabled="disabled"/>
	        	</div>
	        	<div class="form-group">
	           <textarea name="user_review" id="user_review" class="form-control" onkeyup="lettersandnumbers(this)" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>
<div id="speed"><h1></h1></div>
<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>
<script>
var course_id = document.getElementById("get").value;

function lettersandnumbers(input){
  var regex=/[^a-z A-Z 0-9]/gi;
  input.value=input.value.replace(regex,"");
}

//submit 3lshan yshoof elcommentat zy elkbleeh
$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){
 // lawn elbykof 3leh mo2katn 
        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        //reset wa rg3 llon grey
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();
         // sheel eloon wa seeb elt3lm 3leeh
        for(var count = 1; count <= rating_data; count++)
        {
            //some thing here is not mafhoom
            $('#submit_star_'+count).removeClass('star-light');
            $('#submit_star_'+count).addClass('text-warning');
        }

    });
  // deh bka btgm3 data bgd
    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else if(rating_data == 0){
            alert("Please give a rate from one star to 5 start");
            return false;
        }
        else
        {
            
            $.ajax({
                url:"php/submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review, course_id:course_id},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();
                    load_rating_data2();
                    alert(data);
                    
                }
            })

        }

    });

    load_rating_data();
    // console.log('jOEX');
    function load_rating_data()
    {
       

            let xhr = new XMLHttpRequest();
       xhr.open("GET", "php/submit_rating2.php?id="+course_id, true);
       xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){

            let data = xhr.response;
            document.getElementById("speed").innerHTML = data;
       }
      }
    }
    xhr.send();

   }
    load_rating_data2();
   function load_rating_data2(){
            let xhr2 = new XMLHttpRequest();
       xhr2.open("GET", "php/submit_rating3.php?id="+course_id, true);
       xhr2.onload = ()=>{
      if(xhr2.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
          let data2 = xhr2.response;
            document.getElementById("speed2").innerHTML = data2;
         }
      }
    }
    xhr2.send();

   }

});


</script>