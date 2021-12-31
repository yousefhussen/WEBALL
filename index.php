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
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 

</head>
<body>
  <section class="header">
  	<?php
  	setcookie('counter', 0, time() + (86400 * 30));
if (empty($_SESSION['username'])) {
    ?>
  	<nav>
  		<a href="index.php"><img src="images2/logo.png"></a>
  		
        <div class="nav-links">

        	<ul>
        		<li><a href="">Home</a></li>
        		<li><a href="">About</a></li>
        		<li><a href="courses.php">COURSES</a></li>
        		<!-- <li><a href="myCourses.php">My Courses</a></li> -->
        		<li><a href="">CONTACT</a></li>
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
        		<li><a href="">About</a></li>
        		<li><a href="courses.php">COURSES</a></li>
        		<li><a href="myCourses.php">My Courses</a></li>
        		<li><a href="">CONTACT</a></li>
        		 <?php
                       
                        if($_SESSION['Type']=="Adminstrator"){
                             ?>
                            <li><a href="adminPanel.php">ADMINPANEL</a></li>
							<li><a id="chatIcon" class = "chatIcon" href =index.php><i class='fas fa-comment' onclick="openNav()"></i></li></a>
                        
                     <?php }
						

                        ?>
						<?php
						 if($_SESSION['Type']=="Student"){
                        ?>
							
								<li><a class="bellIcon" href =index.php?id=9#popup5><i class='fas fa-bell'></i></li></a>
								<li><a id="chatIcon" class = "chatIcon" href =index.php><i class='fas fa-comment' onclick="openNav()"></i></li></a>
                        	
                     <?php }
						

                        ?>
        		<li><a href="profile.php"><i class="fa fa-user-circle"><?php echo $_SESSION['username'];?></i></a></li>
        		<li><a href="php/signOut.php">signOut</a></li>
        	</ul>
        	
        </div>
  	</nav>
<?php
}
     ?>

    <div class="text-box">
    	<h1>Best course website in the world</h1>
    	<p>Our website is now one of the best websites in the world. You just need to create account <br> Then enjoy.</p>
    	<a href="" class="hero-btn">Visit Us To Know More</a>
    </div>

</section>
<!-- Course -->
<section class="course">
	<h1>Course We Offer</h1>
	<p>To achive the best in your life</p>

	<div class="row">
		<div class="Course-col">
			<h3>Intermediate</h3>
			<p>First step to achive your goal</p>
		</div>
		<div class="Course-col">
			<h3>Degree</h3>
			<p>Your are almost there</p>
		</div>
		<div class="Course-col">
			<h3>Post Graduation</h3>
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
			<img src="images2/course1.jpg">
			<div class="layer">
				<h3>WEB DEVELOPMENT</h3>
			</div>
		</div>
    
    <div class="campus-col">
			<img src="images2/couse2.jpg">
			<div class="layer">
				<h3>IOS DEVELOPMENT</h3>
			</div>
		</div>

		<div class="campus-col">
			<img src="images2/course3.jpg">
			<div class="layer">
				<h3>ANDROID DEVELOPMENT</h3>
			</div>
		</div>

	</div>
</section>
<!----------facilittes----->
<section class="facilittes">
	<h1>Our Facilities</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	<div class="row">
		<div class="facilittes-col">
			<img src="images2/salah.jpg">
			<h3>Mo saba7</h3>
			<p>our egyptian king</p>
		</div>
		<div class="facilittes-col">
			<img src="images2/speed.jpg">
			<h3>speedo</h3>
			<p>hya el delta bas el enta s3edtena feha </p>
		</div>
		<div class="facilittes-col">
			<img src="images2/joe.jpg">
			<h3>joex zarta</h3>
			<p>nefsy as2lak so2al w trod 3leh</p>
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
				<p>s;ljsdklfgliksdjgikljisdfkljgldfjlgjdkfljgkldflgkjd
			    fkljgklfjdkgjldfjgkljdflkgjdflkgjdflkgjkdflgjkldfklgjdf</p>
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
				<p>s;ljsdklfgliksdjgikljisdfkljgldfjlgjdkfljgkldflgkjd
			    fkljgklfjdkgjldfjgkljdflkgjdflkgjdflkgjkdflgjkldfklgjdf</p>
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
	<a href="" class="hero-btn">CONTACTUS</a>
</section>

<!----FOOTER----->
<section class="footer">
	<h4>About US</h4>
	<p>s;ljsdklfgliksdjgikljisdfkljgldfjlgjdkfljgkldflgkjd
	fkljgklfjdkgjldfjgkljdflkgjdflkgjdflkgjkdflgjkldfklgjdf</p>
  <div class="icons">
  	<i class="fa fa-facebook"></i>
  	<i class="fa fa-twitter"></i>
  	<i class="fa fa-instagram"></i>
  	<i class="fa fa-linkedin"></i>
  	
  </div>
   <p>Made by <i class="fa fa-heart-o"></i> Salah and Yonus </p>
</section>
<?php include_once "sideBarChat.php"; ?>
</body>

</html>