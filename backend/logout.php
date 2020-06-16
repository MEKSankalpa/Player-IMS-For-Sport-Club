<?php
session_start();
unset($_SESSION['auth']);
header("Location:../Home.php?logout=success");
exit();

?>