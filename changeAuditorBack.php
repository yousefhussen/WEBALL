<?php 

session_start();


include "Php/DBConnection.php";

$sql = "SELECT * FROM users WHERE `userid` =". $_SESSION['userid'];

$result = $conn->query($sql);

while($row = mysqli_fetch_assoc($result)) {
    $_SESSION['unique_id'] = $row['unique_id'];
}

echo 0;

?>



