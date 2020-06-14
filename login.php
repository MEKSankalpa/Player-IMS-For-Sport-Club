<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Home.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(filter_var($_POST["username"], FILTER_VALIDATE_EMAIL))){
        $username_err = "Please enter valid email.";
    } else{
        $username = $_POST["username"];
    }
    
    // Check if password is empty
    if(empty($_POST["password"])){
        $password_err = "Please enter your password.";
    } else{
        $password = $_POST["password"];
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: Home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?> 
            
<html>
    <head>
        <title>HomePage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
            body
            {
                background-color: aliceblue;
            }
            .wrapper
            {
                position: absolute;
                top: 60%;
                left: 50%;
                transform: translate(-50%,-50%);
            }

     .navcontainer{
     padding-right:0;
     padding-left:0;
     }
     
    </style>
  
  </head>
  <body>
    <div class="container-fluid navcontainer">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <a href="#" class="navbar-brand">Cric</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navi"><span class="navbar-toggler-icon"></span></button> 
            <div class="collapse navbar-collapse navi" >
             
            <ul class=" navbar-nav">
                <li class="nav-item  "><a href="http://localhost/git%20hub/Home.php" class="nav-link active">Home</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" type="button" data-toggle="dropdown">Matches</a>
                 <ul class="dropdown-menu bg-light ">
                   <li class="dropdown-item"><a href="" class="dropdown-link ">Up Coming Matches</a></li>
                   <li class="dropdown-item"><a href="" class="dropdown-link">Live Scores </a></li>
                   <li class="dropdown-item"><a href="" class="dropdown-link ">Previous Matches</a></li>
                   
                 </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Players</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
                
            </ul>
            
            </div>
            <div class="collapse navbar-collapse justify-content-end navi">
            <ul class="navbar-nav ">
                 <li class="nav-item "><a href="http://localhost/git%20hub/login.php" class="nav-link">Login</a></li>
                 <li class="nav-item " ><a href="#" class="nav-link">Sign In</a></li>
             </ul> 
            </div>
             
           
        </nav>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
      <center>
    <div class="wrapper">
        <h2>LOGIN</h2><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" >
                
                <input type="password" name="password" class="form-control" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="http://localhost/git%20hub/register.php">Sign up now</a>.</p>
        </form>
        <u>Forgot password</u><br><br>
    </div>
    </center>
  </body>
</html>