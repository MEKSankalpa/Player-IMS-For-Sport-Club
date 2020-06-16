<?php
 
$conn=new mysqli("127.0.0.1","root","","sportclub");
if($conn->connect_error){
 header("Location:sign_up.php?signup=connectionError");
 exit();
}


?>