<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(filter_var($_POST["username"], FILTER_VALIDATE_EMAIL))){
        $username_err = "Please enter valid email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $_POST["username"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = $_POST["username"];
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty($_POST["password"])){
        $password_err = "Please enter a password.";     
    } elseif(strlen($_POST["password"]) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = $_POST["password"];
    }
    
    // Validate confirm password
    if(empty($_POST["confirm_password"])){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = $_POST["confirm_password"];
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
     .navcontainer{
     padding-right:0;
     padding-left:0;
     }
            body
            {
                background-color: aliceblue;
            }
            .wrapper
            {
                position: absolute;
                top: 70%;
                left: 50%;
                transform: translate(-50%,-50%);
            }
        </style>
        <script>
            function validateForm() {
  var username = document.forms["register"]["username"].value;
  if (username == "") {
    alert("Name must be filled out");
    return false;
  }
}
        </script>
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
      
      <center>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</center>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <center>
    <div class="wrapper">
        <h2>REGISTER</h2><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()" name="register">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="http://localhost/git%20hub/login.php">Login here</a>.</p>
        </form>
        
    </div>
    </center>

</body>
</html>







 



