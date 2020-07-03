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

           // $user = $_SESSION['user_email'];
           // $get_user = "select * from users where user_email = '$email' or uname = '$email'";
           // $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_assoc( $query);

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