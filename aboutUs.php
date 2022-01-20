<!DOCTYPE html>
<html>
<head>
	<?php session_start();?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Universtiy Website</title>
	<link rel="stylesheet" href="CSS/style3.css">
	<link rel="stylesheet" href="CSS/ay7aga.css">
  <link rel="stylesheet" href="CSS/search.css">
  <link rel="stylesheet" href="CSS/button.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 

</head>
<body>
  <?php
  if (empty($_SESSION['username'])) {
    ?>
   <nav>
    <div class="topnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About</a></li>
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
    <div class="topnav">
              <ul>
                  <li>
                
               
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About</a></li>
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
                <li><div class="cart_div">
               <button class="button-17" role="button" ><a href="cart.php"><img src="cart-icon.png" /></a></button>
                </div></li>
                <li><a href="php/signOut.php">signOut</a></li>
                 
            </ul>
</div>

</nav>
<?php 
}
?>
   
   

  	<div class="about-section">
  <h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="uploads/7.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Jane Doe</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>

  </div>

  <div class="row">
  <div class="column">
    <div class="card">
      <img src="uploads/5.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Jane Doe</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
    
  </div>
  <div class="row">
  <div class="column">
    <div class="card">
      <img src="uploads/45.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Jane Doe</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
    
  </div>

 


</body>


</html>