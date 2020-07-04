<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/player.css">
  </head>
  <body>
       
         <main role="main" class="container-fluid section1" >
          <?php 
             if(isset($_GET['regi'])){ ?>
               <div class="col-4 offset-4 alert alert-danger alert-dismissible fade show" role="button">
               <h4>Error!</h1>
              <button class="close" data-dismiss="alert" aria-lable="Close" type="button">
              <span aria-hidden="true">&times;</span>   </button> 
              <?php

              ///validation
                $msg=$_GET['regi'];
                 if($msg="empty"){
                    echo '<strong>Please Complete The All Fields!</strong>';
                 }elseif ($msg="mail") {
                  echo '<strong>Please Enter A Valid Email!</strong>';
                 }elseif ($msg="mailbefore") {
                  echo '<strong>This Email Allready Have Been Taken!</strong>';
                 }elseif ($msg="phone") {
                  echo '<strong>Please Enter A Valid Phone Number!</strong>';
                 }elseif ($msg="ephone") {
                  echo '<strong>Please Enter A Valid Emergency Number!</strong>';
                 }elseif ($msg="NoAllow") {
                  echo '<strong>You Cant Upload Like This Type File For Your Profile Image!</strong>';
                 }elseif ($msg="uploadError") {
                  echo '<strong>Having Some Problem Uploading This Image Try Another!</strong>';
                 }elseif ($msg="size") {
                  echo '<strong>This Profile Image Too Large!</strong>';
                 }
                
              ?>         
             
             </div>  

             <?php } ?>  
            
             <div class="form-box  card">
                <h1 class="text-center card-header ">Player Details</h1> 
                 <form action="backend/playereditback.php" method="POST" enctype="multipart/form-data">
                   
                 <link rel="stylesheet" href="css/player.css">
         <div class="form-group  px-5 mt-4">
         <?php 
          if(isset($_GET['pro_img'])){
              $pro_img = $_GET['pro_img'];
              $pro_img= "uploads/".$pro_img."";
          }else{
            $pro_img = "images/user.png";
          }
         ?>
          <div class="img-profile mb-3" ><img src="<?php echo $pro_img; ?>" onclick="profileImgClick()" id="default" class="profileDisplay" alt="profile image" width="100" height="100" >                  
        </div>  
        <label class="profile-label" for="">Profile Image</label>   
        <input type="file" name="pro_img" id="profile_input" onchange="changeImage(this)" style="display:none;">         
      </div>
        <div class="form-group  mt-4 px-5">
          
          <?php
            if(isset($_GET['fname'])){
              $fname=$_GET['fname'];
              echo '<input type="text" class="form-control input-my-0" id="fname" name="fname" required value="'.$fname.'">';  

            }else {
                echo '<input type="text" class="form-control input-my-0" id="fname" name="fname" required>';
            }
          
          
          ?> 
          
          <label for="fname" class="text-label">Full Name</label>
        </div>
        <div class="form-group px-5 ">
            
            <?php
            if(isset($_GET['sname'])){
              $sname=$_GET['sname'];
              echo '<input type="text" class="form-control input-lg" id="sname" name="sname" required value="'.$sname.'">';  

            }else {
                echo '<input type="text" class="form-control input-lg" id="sname" name="sname" required>';
            }
          
          
          ?> 
            <label for="sname" class="text-label">Name With Initials</label>
        </div>
        <div class="form-group row pt-3 pb-1 px-5">
            <label for="" class="date col-3">Birth Day</label>
            <?php
            if(isset($_GET['bdate'])){
              $bdate=$_GET['bdate'];
              echo '<input type="date" class="form-control col-4" name="bdate" placeholder="" value="'.$bdate.'">';  

            }else {
                echo ' <input type="date" class="form-control col-4" name="bdate" placeholder="">';
            }
          ?>   
        </div>
        <div class="form-group row px-5">
            <label for="" class="radio-label col-3">Gender</label>
            <div class="form-check form-check-inline col-1">
            <?php
            if(isset($_GET['gender'])){
              $gender = $_GET['gender'];
            }else{
              $gender = "";
            }
            ?>

              <input type="radio" class="form-check-input mr-2" name="gender" id="male" value="Male" <?php echo ($gender=='Male')?'checked':'' ?>>
              <label for="male" >Male</label>
            </div>
            
            <div class="form-check form-check-inline col-3">
              <input type="radio" class="form-check-input mr-2" name="gender" id="female" value="Female"<?php echo ($gender=='Female')?'checked':'' ?>>
              <label for="female">Female</label>
            </div>
        </div>

        <div class="form-group px-5">
          
          <?php
            if(isset($_GET['mail'])){
              $mail=$_GET['mail'];
              echo '<input type="text" class="form-control" id="mail" name="mail"  required value="'.$mail.'">';  

            }else {
                echo ' <input type="text" class="form-control" id="mail" name="mail"  required>';
            }
          
          
          ?> 
          <label for="mail" class="text-label">Email</label>
          
        </div>
        <div class="form-group px-5">
          
          <?php
            if(isset($_GET['pnumber'])){
              $pnumber=$_GET['pnumber'];
              echo '<input type="text" class="form-control" id="pnumber" name="pnumber"  required value="'.$pnumber.'">';  

            }else {
                echo '<input type="text" class="form-control " id="pnumber" name="pnumber" required>';
            }
          
          
          ?> 
          <label for="pnumber" class="text-label">Mobile</label>
          
        </div>
        <div class="form-group px-5">
          
          <?php
            if(isset($_GET['address'])){
              $address=$_GET['address'];
              echo '<input type="text" class="form-control" id="address" name="address"  required value="'.$address.'">';  

            }else {
                echo '<input type="text" class="form-control " id="address" name="address" required>';
            }
          
          
          ?> 
          <label for="address" class="text-label">Address</label>
          
        </div>
        <div class="form-group px-5">
          
          <?php
            if(isset($_GET['enumber'])){
              $enumber=$_GET['enumber'];
              echo '<input type="text" class="form-control" id="enumber" name="enumber"  required value="'.$enumber.'">';  

            }else {
                echo '<input type="text" class="form-control " id="enumber" name="enumber" required>';
            }
          
          
          ?> 
          <label for="enumber" class="text-label">Emergency Phone</label>
          
        </div>
        <div class="button-submit px-5">
          <input type="submit" class="btn btn-info" name="submit" value="Edit">
                      
              </div>
                    
                 </form>
             </div>
            
   </main> 
   <script src="profile_image.js"></script>
   
<!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>