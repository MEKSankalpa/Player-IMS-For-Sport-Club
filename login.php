<?php  
  include_once 'header.php';
?>

    <!-- custom css-->
    <link href="css/loginstyle.css" rel="stylesheet">

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

  <!-- Login Form -->
  <div class="container-fluid login-container">
    <div class="row">
      <div class="col-md-6 side-bar">
        <div class="login-main-text text-center text-light">
            <h1>Welocome to<br>Player Information<br>Mangment System</h1>
            <p class="my-2 p-2">Login from here to access.</p>
         </div>
      </div>
      <div class="col-md-6 login-form">
          <h3 class="my-1 text-dark mx-4">LogIn</h3>
          <form class="my-2 mx-4">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username or Email">   
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Log In</button>
                <p>Don't have a account? <a href="sign_up.php" class="text-primary font-weight-bold">SignUp</a> here.</p>
            </div>
            <div class="form-group">
                <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
            </div>
          </form>
      </div>
    </div>
  </div>


<?php  
  include_once 'footer.php';
?>