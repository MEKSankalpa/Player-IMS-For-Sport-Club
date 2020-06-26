<?php  
  include_once 'header.php';
?>
    <!-- custom css-->
    <link href="css/loginstyle.css" rel="stylesheet">

  <!-- Login Form -->
  <div class="container-fluid login-container ">
    <div class="row">
      <div class="col-md-6 side-bar">
        <div class="login-main-text text-center pt-5 text-light">
           <div>
              <h1>Welocome to<br>Player Information<br>Mangment System</h1>
              <p class="my-2 p-2">Login from here to access.</p>
           </div>
         </div>
      </div>
      <div class="col-md-6 login-form">
          <h3 class="my-1 text-dark mx-4">LogIn</h3>
          <form class="my-2 mx-4" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="email" class="form-control" placeholder="Username or Email" >   
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
            </div>
            <div class="form-group">
                <button class="btn btn-success" name="log_in" type="submit">Log In</button>
                <p>Don't have a account? <a href="sign_up.php" class="text-primary font-weight-bold">SignUp</a> here.</p>
            </div>
            <div class="form-group">
                <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
            </div>
            <?php include("backend/login_back.php");?>
          </form>
      </div>
    </div>
  </div>

<?php  
  include_once 'footer.php';
?>