<?php
 
$conn=new mysqli("localhost", "root", "", "sportclub");
if($conn->connect_error){
 header("Location:sign_up.php?signup=connectionError");
 exit();
}


?>