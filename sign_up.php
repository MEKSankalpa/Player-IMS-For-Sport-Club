<!--
    variables -
        fname
        lname
        user_password
        user_email
        user_contact
        sign_up  -> submit button

    links -
        signup_user.php
        signin.php
 -->

<?php
  include_once 'header.php';
?>

<!-- custom css-->
<link href="css/signup.css" rel="stylesheet">


<!-- Showing Alerts -->
<?php
 if(isset($_GET['signup'])){

   ?>
<div class="container mt-4">
    <div class="col-6 offset-3 alert alert-dismissible  fade show" role="alert" style="background-color:rgba(255, 255, 77,.7);" >
     <h5 class="alert-heading" style="color:red;">Error!</h5>
      <?php
        $er=$_GET['signup'];
       if($er=="connectionError"){
        echo "<p style='color:black;>Database Connection Lost!</p>";
       }elseif ($er=="empty") {
        echo "<p style='color:black;' >Please Fill All The Fields!</p>";
       }elseif ($er=="email") {
        echo "<p style='color:black;' >Email Did Not Valid!</p>";
       }elseif ($er=="password") {
        echo "<p style='color:black;' >Password Did Not Valid!</p>";
       }elseif ($er=="conferm") {
        echo "<p style='color:black;' >Password Did Not Matched!</p>";
       }elseif ($er=="unique") {
        echo "<p style='color:black;' >This Email Already Taken!</p>";
       }
      ?>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times</span>
    </button>
    </div>

</div>
<?php
 }
?>

<!-- SignUpForm -->
<div class = "signup-form">
    <form action="backend/user.php" method="POST">
        <div class="form-header">
            <h2>Sign Up</h2><br>
        </div>
        <div class="form-group">
            <label>First name</label>
            <input type="text" class="form-control" name="fname" placeholder="Example: Michel" autocomplte="off" >
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" name="lname" placeholder="Example: Jaksan" autocomplte="off" >
        </div>
        <div class="form-group">
            <label>User Name</label>
            <input type="text" class="form-control" name="uname" placeholder="michelJacksan" autocomplte="off" >
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="user_email" placeholder="someone@site.com" autocomplte="off" >
        </div>
        <div class="form-group">
            <label>Contact number</label>
            <input type="text" class="form-control" name="user_contact" placeholder="071*******" autocomplte="off" >
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="user_password" placeholder="Password" autocomplte="off" >
        </div>
        <div class="form-group">
            <label>Confirm Your Password</label>
            <input type="password" class="form-control" name="con_password" placeholder="Confirm" autocomplte="off" >
        </div>


        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required> I accept the<a hef="#">Terms of User</a>
            &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button onclick="checking()" type="submit" class="btn btn-primary btn-block btn-lg"  name="sign_up" >Sign Up</button>
        </div>



    </form>
    <div class="text-center small text-light bg-dark">Already have an account?  <a class="text-success" href="login.php">SignIn here</a></div>
</div>

<?php

  include_once 'footer.php';

?>
