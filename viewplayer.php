<?php
  session_start();
  include_once 'header.php';
  include_once 'databaseConnection.php';
?>

    <link href="css/profilecss.css" rel="stylesheet">

    <div class="container-fluid navcontainer pl-0 pr-0 mb-5">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a href="#" class="navbar-brand">Cric</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navi"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse navi" >

            <ul class=" navbar-nav">
                <li class="nav-item  "><a href="#" class="nav-link active">Home</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" type="button" data-toggle="dropdown">Matches</a>
                 <ul class="dropdown-menu bg-light ">
                   <li class="dropdown-item"><a href="" class="dropdown-link ">Up Coming Matches</a></li>
                   <li class="dropdown-item"><a href="" class="dropdown-link">Live Scores </a></li>
                   <li class="dropdown-item"><a href="" class="dropdown-link ">Previous Matches</a></li>

                 </ul>
                </li>
                <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Players</a>
                  <ul class="dropdown-menu bg-light">
                    <li class="dropdown-item"><a href="player.php" class="dropdowm-link">New Player</a></li>
                    <li class="dropdown-item"><a href="" class="dropdowm-link">Player Info</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>

            </ul>

            </div>
            <div class="collapse navbar-collapse justify-content-end navi">
            <ul class="navbar-nav">
              <?php
                if (isset($_SESSION['auth'])) {
                  $user = $_SESSION['auth'];
                  echo '<li class="nav-item dropdown mr-5 px-5">
                       <a href="" class="nav-link dropdown-toggle  font-weight-bold"  style="color:#a3a375;" data-toggle="dropdown" type="button" >'.$user['uname'].'</a>
                       <ul class="dropdown-menu">
                       <li class="dropdown-item"><a href="profile.php" class="dropdown-link">Profile</a></li>
                       <li class="dropdown-item"><a href="backend/logout.php" class="dropdown-link">Logout</a></li>
                       </ul>
                       </li>';
                }else {
                  echo '<li class="nav-item "><a href="login.php" class="nav-link">Login</a></li>
                         <li class="nav-item " ><a href="sign_up.php" class="nav-link">Sign Up</a></li>';
                }
               ?>
             </ul>
            </div>
        </nav>
    </div>

<!--VIEWprofile -->
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM player WHERE id='$id'";
  $result = mysqli_query($conn,$sql);
  $resultCheck = mysqli_num_rows($result);
} else {
  header("Location: playerinfo.php");
}
?>

<div class="container mb-5 w-50 w-sm-75">
      <div class="row">
      <div class="col-12 mt-3">
          <div class="card border">
            <div class="card">
              <?php
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $image = $row['pro_img'];
                  echo "<div class='img-square-wrapper mx-auto my-1'>
                      <img class='justify-content-center img-thumbnail' src='uploads/$image' alt='$image'>
                      </div>";
              ?>
                  <div class="card-body m-3 p-2 text-wrap">
                      <h2 class="card-title font-weight-bold cyan-text text-center mx-1 bg-light">View Player Profile</h2>
              <?php
                  echo "<p class='card-text font-weight-bold h-5'>Player ID: ".$row['id']."</p><br>";
                  echo "<p class='card-text font-weight-bold h-5'>First Name: ".$row['fname']."</p><br>";
                  echo "<p class='card-text font-weight-bold h-5'>Last Name: ".$row['sname']."</p><br>";
                  echo "<p class='card-text font-weight-bold h-5'>Last Name: ".$row['gender']."</p><br>";
                  echo "<p class='card-text font-weight-bold h-5'>Last Name: ".$row['bdate']."</p><br>";
                  echo "<p class='card-text font-weight-bold h-5'>Last Name: ".$row['address']."</p><br>";
                  echo "<p class='card-text font-weight-bold h-5'>Email: ".$row['mail']."</p><br>";
                  echo "<p class='card-text font-weight-bold h-5'>Contact: ".$row['pnumber']."</p><br>";
                }
              }
              ?>

                </div>
            </div>
            <div class="card-footer">
              <button class="bg-success border-0 rounded text-white mt-1 p-2 px-3" type="button" name="edit">
                Edit profile
              </button>
            </div>
        </div>
      </div>
    </div>
</div>

<?php
  include_once 'footer.php';
?>
