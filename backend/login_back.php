<?php
 session_start();
?>

<?php

    if(isset($_POST['log_in'])){
        include("connection.php");

        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $SePass=md5($pass);

        $select = "SELECT * FROM user WHERE (user_email = '$email' OR uname = '$email') AND con_password='$SePass'";

        $query = mysqli_query($con,$select);
        $check_user = mysqli_num_rows($query);

        if($check_user == 1){

            $row = mysqli_fetch_assoc( $query);
            $user_name = $row['uname'];
            $_SESSION['auth'] = $user_name;
            $id= $row['id'];
            $uname=$row['uname'];
            $_SESSION['auth'] = array('id'=>$id,'uname'=>$uname);

            echo "<script>window.open('Home.php?login=success','_self')</script>";

        }else{
            echo "
            <div class='alert alert-danger'>
                <strong>Check your email and password.</strong>
            </div>
            ";
        }
    }
?>
