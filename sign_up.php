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

<!DOCTYPE html>
<html>
    <head>
        <title>Create new Accout</title>
        <meta charset='utf-8'>
        <meta http-equiv = "X-UA-Compatible" content="IE-edge">
        <meta namw="viewport" content="with=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Nunito|pacifico:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">></script>

        <link  rel="stylesheet" text="text/css" href="css/signup.css">
    </head>
    <body>
        <div class = "signup-form">
            <form action="" method="POST">
                <div class="form-header">
                    <h2>Sign Up</h2>
                    <p>Fill out this from and start chatting with yout friends</p>
                </div>
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control" name="fname" placeholder="Example: Michel" autocomplte="off" required>
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" name="lname" placeholder="Example: Jaksan" autocomplte="off" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="user_password" placeholder="Password" autocomplte="off" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="user_email" placeholder="someone@site.com" autocomplte="off" required>
                </div>
                <div class="form-group">
                    <label>Contact number</label>
                    <input type="text" class="form-control" name="user_contact" placeholder="someone@site.com" autocomplte="off" required>
                </div>
                <div class="form-group">
                    <label class="checkbox-inline"><input type="checkbox" required> I acept the<a hef="#">Terms of User</a>
                    &amp; <a href="#">Privacy Policy</a></label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
                </div>

                <!-- <?php //include("signup_user.php"); ?> -->

            </form>
            <div class="text-center small" style="color: #000080;">Already have an accoount?  <a hef="signin.php">SignIn here</a></div>
        </div>
    </body>
</html>