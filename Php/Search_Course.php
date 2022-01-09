<?php 
session_start();
 $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        //Under Construction
           
            $sql= "SELECT * FROM `course` WHERE `courseName` LIKE '%".$_GET['q']."%'";

            $result=mysqli_query($conn,$sql) or die($conn->error);
            while($row=mysqli_fetch_array($result)){
            	$html .="
            	
                <div class='Course-col'>
                  <img src='".$row["image"]."' height='250px' width='400px'>
                  <span class='coursename'>".$row["courseName"]."</span><br>
                  <span class='instName'> ". $row["instructorName"]."</span><br>";
                        if (!empty($_SESSION['username'])) {
                        if($_SESSION['Type']=="Adminstrator"){
                        	 $html .= "
                             <div class='box'>
                            <a class='bEd' href=courses.php?id=".$row["courseId"]."#popup1>Edit</a>
                        </div>
                        <div class='box'>
                            <a class='bEd' href=courses.php?id=".$row["courseId"]."#popup2>Delete</a>
                        </div>";

                         if($row['Approved'] == 0){

                        $html.="
                        <div class='box'>
                            <a class='bEd' href=courses.php?id=".$row["courseId"]."#popup4>Approve</a>
                        </div>
                        ";
                     
                    } 
                 }
                     } 

                    $html.="   

                  ".'('.$row["enrolledSid"].')'."<br>

                

                 <span class='price'>"."$".$row["coursePrice"]."</span><br>

                  <br>
                  <form method='post' action='cart.php'>
                  <!-- <input type='text' name='quantity' value='1' class='form-control' /> -->
                  <input type='hidden' name='hidden_name' value= '".$row["courseName"]."' />
                  <input type='hidden' name='hidden_price' value='".$row["coursePrice"]."' />
                  <input type='hidden' name='hidden_id' value='". $row["courseId"]."' />
                  <input type='submit' id='DpS' name='add_to_cart' style='margin-top:5px;' class='btn btn-success' value='Add to Cart' />
                  </form>
                 <a href='index2.php?id='". $row['courseId']."'> <div class='star'>
                  "; 
                   
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
                            
                          $html .= "  <i class='fas fa-star ".$class_name." mr-1'></i>

                          </div>
                          </div></a>
                          
                          ";
                            
                        }
                   }
               }
                 echo $html;

?>