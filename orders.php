<html>
	<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
</html>
<body>
<button type="button" class="btn btn-primary" value="price" onclick="orders(this.value)">Price</button>
<button type="button" class="btn btn-secondary" value="users" onclick="orders(this.value)">users</button>
<button type="button" class="btn btn-success" value="courses" onclick="orders(this.value)">courses</button>
<!-- <button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button> -->
<!-- <button type="button" class="btn btn-light">Light</button> -->
<!-- <button type="button" class="btn btn-dark">Dark</button> -->
<!-- <button type="button" class="btn btn-link">Link</button> -->
<div id=order></div>

<script>
 // var order = document.getElementById("get").value;
 function orders(str){
   let xhr2 = new XMLHttpRequest();
       xhr2.open("GET", "php/orderSearch.php?order="+str, true);
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
   $("courses").click(function(){
    
  });
    $("price").click(function(){
    
  });


  
 	
 
 </script>
</body>