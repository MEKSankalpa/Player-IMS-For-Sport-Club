<?php
session_start();
//import the datbase connection
include_once '../databaseConnection.php';
$user=$_SESSION['auth'];
$id=$user['id'];
 if(isset($_POST['update'])){
    $fname= mysqli_real_escape_string($conn,$_POST['fname']);
    $lname= mysqli_real_escape_string($conn,$_POST['lname']);
    $uname= mysqli_real_escape_string($conn,$_POST['uname']);
    $user_password= mysqli_real_escape_string($conn,$_POST['user_password']);
    $user_email= mysqli_real_escape_string($conn,$_POST['user_email']);
    $user_contact= mysqli_real_escape_string($conn,$_POST['user_contact']);
    $con_password= mysqli_real_escape_string($conn,$_POST['con_password']);



echo $con_password;
    //validating inputs
    if(empty($fname) || empty($lname)|| empty($uname)|| empty($user_password)|| empty($user_email)|| empty($user_contact)|| empty($con_password)){
       header("Location:../edit_profile.php?update=empty");
       exit();
    }else {
        if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
           header("Location:../edit_profile.php?update=email");
           exit();
        }else {
            if(!preg_match("/^[a-zA-Z]*$/",$user_password)){
               header("Location:../edit_profile.php?update=password");
               exit();
            }else {
                if($user_password<>$con_password){
                   header("Location:../edit_profile.php?update=conferm");
                   exit();
                }else{
                  $query="select * from user where user_email='$user_email'";
                  $result=mysqli_query($conn,$query);
                  $count=mysqli_num_rows($result);
                   if($count > 0){
                     header("Location:../edit_profile.php?update=unique");
                     exit();
                   }else{
                   $sql="UPDATE user SET fname=?,lname=?,uname=?,user_email=?,user_contact=?,con_password=? WHERE id=?";
                   $stmt=mysqli_stmt_init($conn);
                   mysqli_stmt_prepare($stmt,$sql);
                   $pwd=md5($con_password);
                   mysqli_stmt_bind_param($stmt,"ssssssi",$fname,$lname,$uname,$user_email,$user_contact,$pwd,$id);
                   mysqli_stmt_execute($stmt);
                   $_SESSION['auth']['uname']=$uname;
                   header("Location:../profile.php?update=success");
                   exit();
                   }
                }
            }
        }
    }

  }else {
   header("Location:../edit_profile.php?update=submiterror");
   exit();
  }

?>
