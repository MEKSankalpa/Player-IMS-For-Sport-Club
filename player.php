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
                 <form action="backend/playerback.php" method="POST" enctype="multipart/form-data">
                   
                   <?php
                    include 'playervalidation.php';
                   
                   ?>
                    
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