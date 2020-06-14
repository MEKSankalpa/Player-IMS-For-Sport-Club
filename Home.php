<?php  
  session_start();
  include_once 'header.php';
?>

    <!-- custom css-->
    <link href="css/custom_home.css" rel="stylesheet">

    <div class="container-fluid navcontainer pl-0 pr-0">
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
                <?php
                  if(isset($_SESSION['auth'])){  ?>
                    <li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" type="button" style="color:#a3a375;">
                      <?php echo $_SESSION['auth']; ?>  
                    
                      </a>
                     <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="" class="dropdown-link">Your Profile</a></li>
                         <li class="dropdown-item"><a href="" class="dropdown-link">Logout</a></li>
                       </ul>
                 
                     </li>
                  <?php
                     }
                   ?>
                 
                 <li class="nav-item "><a href="login.php" class="nav-link">Login</a></li>
                 <li class="nav-item " ><a href="sign_up.php" class="nav-link">Sign Up</a></li>
             </ul> 
            </div>
             
           
        </nav>
    </div>

    <div class="container-fluid">
      <div class="text-dark text-center bg-primary font-weight-bold font-size-md">IT's Working!</div>
    </div>


<?php  
  include_once 'footer.php';
?>

