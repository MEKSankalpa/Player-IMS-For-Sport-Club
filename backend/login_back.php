<?php

include("connection.php");
    if(isset($_POST['log_in'])){
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));

        $select = "select * from user where (user_email = '$email' or uname = '$email') and con_password='$pass'";

        $query = mysqli_query($con,$select);

        $check_user = mysqli_num_rows($query);

        if($check_user == 1){

            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email = '$email' or uname = '$email'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['uname'];
            $_SESSION['uname'] = $user_name;

            echo "<script>window.open('Home.php','_self')</script>";

        }else{
            echo "
            <div class='alert alert-danger'>
                <strong>Check your email and password.</strong>
            </div>
            ";
        } 
    }
?>