<?php
    include_once 'header.php';
    include_once 'backend/connection.php';
    session_start();

    if (isset($_SESSION['auth'])) {

        $user = $_SESSION['auth'];
        $p_id = $user['id'];
        $sql = "SELECT * FROM user WHERE id='$p_id';";
        $result = mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
    }

?>

<!-- updateForm -->
<div class = "update-form">
    <form action="backend/profile_update.php" method="POST">
        <div class="form-header">
            <h2>Update</h2><br>
        </div>
        <div class="form-group">
            <label>First name</label>
            <input type="text" class="form-control" name="fname" value=<?php echo $row['fname'] ?> >
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" name="lname" value=<?php echo $row['lname'] ?>>
        </div>
        <div class="form-group">
            <label>User Name</label>
            <input type="text" class="form-control" name="uname" value=<?php echo $row['uname'] ?> >
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="user_email" value=<?php echo $row['user_email'] ?>>
        </div>
        <div class="form-group">
            <label>Contact number</label>
            <input type="text" class="form-control" name="user_contact" value=<?php echo $row['user_contact'] ?> >
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="user_password" autocomplete="off"  >
        </div>
        <div class="form-group">
            <label>Confirm Your Password</label>
            <input type="password" class="form-control" name="con_password" >
        </div>

        <div class="form-group">
            <button onclick="checking()" type="submit" class="btn btn-primary btn-block btn-lg"  name="update" >Update</button>
        </div>

    </form>
</div>
