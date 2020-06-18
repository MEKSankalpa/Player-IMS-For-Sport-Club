<?php
session_start();
if(isset($_SESSION['auth1'])){
unset($_SESSION['auth1']);

}

 if(isset($_POST['sign_up'])){
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($_POST['lname']);
    $uname=mysqli_real_escape_string($_POST['uname']);
    $user_password=mysqli_real_escape_string($_POST['user_password']);
    $user_email=mysqli_real_escape_string($_POST['user_email']);
    $user_contact=mysqli_real_escape_string($_POST['user_contact']);
    $con_password=mysqli_real_escape_string($_POST['con_password']);

    //import the datbase connection
   include_once '../databaseConnection.php';
    
echo $con_password;
    //validating inputs
    if(empty($fname) || empty($lname)|| empty($uname)|| empty($user_password)|| empty($user_email)|| empty($user_contact)|| empty($con_password)){
       header("Location:../sign_up.php?signup=empty");
       exit();
    }else {
        if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
           header("Location:../sign_up.php?signup=email");
           exit();
        }else {
            if(!preg_match("/^[a-zA-Z]*$/",$user_password)){
               header("Location:../sign_up.php?signup=password");
               exit();
            }else {
                if($user_password<>$con_password){
                   header("Location:../sign_up.php?signup=conferm");
                   exit();
                }else{
                   $query="select * from user where user_email='$user_email'";
                   $result=mysqli_query($conn,$query);
                   $count=mysqli_num_rows($result);
                   if($count > 0){
                     header("Location:../sign_up.php?signup=unique");
                     exit();       
                   }else{
                   $sql="insert into user(fname,lname,uname,user_email,user_contact,con_password) values(?,?,?,?,?,?)";
                   $stmt=mysqli_stmt_init($conn);
                   mysqli_stmt_prepare($stmt,$sql);
                   $pwd=md5($con_password);
                   mysqli_stmt_bind_param($stmt,"ssssss",$fname,$lname,$uname,$user_email,$user_contact,$pwd);
                   mysqli_stmt_execute($stmt);
                   //check whether logged in or not
                   $_SESSION['auth']=$uname;
                   header("Location:../Home.php?signup=success");                  
                   exit();
                   }
                }
            }
        }
    }

  }else {
   header("Location:../sign_up.php?signup=submiterror");
   exit();
  }

?>