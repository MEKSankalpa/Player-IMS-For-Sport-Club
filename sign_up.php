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

<div class="container-fluid navcontainer pl-0 pr-0">
<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
    <a href="Home.php" class="navbar-brand">Cric</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navi"><span class="navbar-toggler-icon"></span></button> 
    <div class="collapse navbar-collapse navi" >
     
    <ul class=" navbar-nav">
        <li class="nav-item  "><a href="Home.php" class="nav-link active">Home</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" type="button" data-toggle="dropdown">Matches</a>
         <ul class="dropdown-menu bg-light ">
           <li class="dropdown-item"><a href="" class="dropdown-link ">Up Coming Matches</a></li>
           <li class="dropdown-item"><a href="" class="dropdown-link">Live Scores </a></li>
           <li class="dropdown-item"><a href="" class="dropdown-link ">Previous Matches</a></li>
           
         </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Players</a>
          <ul class="dropdown-menu bg-light">
            <li class="dropdown-item"><a href="" class="dropdowm-link">New Player</a></li>
            <li class="dropdown-item"><a href="" class="dropdowm-link">Player Info</a></li>
          </ul> 
        </li>
        <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
        
    </ul>
    
    </div>
    <div class="collapse navbar-collapse justify-content-end navi">
    <ul class="navbar-nav">
         <li class="nav-item "><a href="login.php" class="nav-link">Login</a></li>
         <li class="nav-item " ><a href="sign_up.php" class="nav-link">Sign Up</a></li>
     </ul> 
    </div>

</nav>
</div>
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
            <h2>Sign Up</h2>
            <p>Fill out this from and start chatting with yout friends</p>
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
            <input type="text" class="form-control" name="uname" placeholder="User Name" autocomplte="off" >
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
            <label>Conferm Your Password</label>
            <input type="password" class="form-control" name="con_password" placeholder="Conferm" autocomplte="off" >
        </div>
        
       
        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required> I acept the<a hef="#">Terms of User</a>
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

