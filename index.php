<!DOCTYPE html>
<html>
<head>
	<?php session_start();?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Universtiy Website</title>
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="CSS/ay7aga.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 

</head>
<body>
  <section class="header">
  	<?php
	if(isset($_GET['msg3'])){
		?>
		<div class="text-center fixed-top" style="margin-top:30px;">  
					  <button class="btn btn-danger" id="Db" style="width:50%;height:70px"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Something went wrong in AdminPanel </button>
					</div>
					
	<script src="JS/button-fade.js"></script>
					<?php
	  }
  	// setcookie('counter', 0, time() + (86400 * 30));
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
        		<li><a href="">Home</a></li>
        		<li><a href="aboutUs.php">About Us</a></li>
        		<li><a href="courses.php">Courses</a></li>
        		<?php
        		if ($_SESSION['Type']=="Tutor") { ?>
        			<li><a href="tutorCourses.php">TutorCourses</a></li>
					<li><a href="surveys-tutor.php">View Surveys</a></li>
        		<?php
        		}

				if($_SESSION['Type'] == "Student") {
					?>
					<li><a href="myCourses.php">My Courses</a></li>
					
				<?php
				}
				?>
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

    <div class="text-box">
    	<h1>Eduford: Online Courses - Learn Anything</h1>
    	<p>Our website is now one of the best websites in the world. You just need to create account <br> Then enjoy.</p>
    	<a href="aboutUs.php" class="hero-btn">Visit Us To Know More</a>
    </div>

</section>
<!-- Course -->
<section class="course">
	<h1>Ways of success</h1>
	<p>To achive the best in your life</p>

	<div class="row">
		<div class="Course-col">
			<h3>Work</h3>
			<p>First step to achive your goal</p>
		</div>
		<div class="Course-col">
			<h3>Perseverance</h3>
			<p>Your are almost there</p>
		</div>
		<div class="Course-col">
			<h3>Success</h3>
			<p>Finally!!</p>
		</div>
	</div>
</section>
<!---campus----->
<section class="campus">
	<h1>The best we have</h1>
	<p>Our top 3 selling courses</p>
	<div class="row">
		<div class="campus-col">
			<img src="images2/web.jpg">
			<div class="layer">
				<h3>WEB DEVELOPMENT</h3>
			</div>
		</div>
    
    <div class="campus-col">
			<img src="images2/apple.jpg">
			<div class="layer">
				<h3>IOS DEVELOPMENT</h3>
			</div>
		</div>

		<div class="campus-col">
			<img src="images2/android.jpg">
			<div class="layer">
				<h3>ANDROID DEVELOPMENT</h3>
			</div>
		</div>

	</div>
</section>
<!----------facilittes----->
<section class="facilittes">
	<h1>Our Facilities</h1>
	<p>We commit to meet the financial need of every admitted undergraduate student. We don’t consider your ability to pay when we review your application, and we don’t base our decision on whether you can cover the cost. If you’re accepted here, you belong here.</p>
	<div class="row">
		<div class="facilittes-col">
			<img src="images2/london.png">
			<h3>Best Courses</h3>
			<p>Lorem ipsum dolor sit amet </p>
		</div>
		<div class="facilittes-col">
			<img src="images2/newyork.png">
			<h3>Best Price</h3>
			<p>, consectetur adipiscing elit </p>
		</div>
		<div class="facilittes-col">
			<img src="images2/washington.png">
			<h3>Technical Support</h3>
			<p>We will help you 24 hours</p>
		</div>
	</div>
</section>
<!-- testmonials -->
<section class="testimonials">
	<h1>What our students says</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	<div class="row">
		<div class="testimonials-col">
			<img src="images2/user1.jpg">
			<div>
				<p>Eduford is home to me not because of the fancy buildings like Healy Hall, or its prestigious reputation, but rather because of the university’s care for the whole person as each of us attempts to live our lives for others.</p>
			    <h3>Chirstine Berkley</h3>
			    <i class="fa fa-star"></i>
			    <i class="fa fa-star"></i>
			    <i class="fa fa-star"></i>
			    <i class="fa fa-star"></i>
			    <i class="fa fa-star-o"></i>
			</div>
		</div>
<div class="testimonials-col">
			<img src="images2/user2.jpg">
			<div>
				<p>It’s likely that you will come to love some of the most amazing souls this campus has to offer. That love may come in the form of friendships that you know will last forever.</p>
			    <h3>David byer</h3>
			    <i class="fa fa-star"></i>
			    <i class="fa fa-star"></i>
			    <i class="fa fa-star"></i>
			    <i class="fa fa-star"></i>
			    <i class="fa fa-star-half-o"></i>
			</div>
		</div>

	</div>
</section>
<!----Call to Action----->
<section class="cta">
	<h1>Enroll for our various online coursers<br>anywhere from the world</h1>
	<a href="aboutUs.php" class="hero-btn">CONTACTUS</a>
</section>

<!----FOOTER----->
<section class="footer">
	<h4>About US</h4>
	<p>We’re a leading research courses website with a heart. Founded in the decade that the U.S. Constitution was signed, we’re the nation’s oldest Catholic and Jesuit university.
We’re a community of people who bridge our disparate experiences and identities. Meet the people and places that make Eduford home.f</p>
  <div class="icons">
  	<i class="fa fa-facebook"></i>
  	<i class="fa fa-twitter"></i>
  	<i class="fa fa-instagram"></i>
  	<i class="fa fa-linkedin"></i>
  	
  </div>
   <p>Made by <i class="fa fa-heart-o"></i> Joe and Speedo </p>
</section>
<?php 


if (!empty($_SESSION['username']) && $_SESSION['Type']!="Tutor" ) {

	include_once "sideBarChat.php";
} 

?>


</body>

</html>