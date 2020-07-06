<?php

if(isset($_POST['submit'])){
   $fname=$_POST['fname'];
   $sname=$_POST['sname'];
   $bdate=$_POST['bdate'];
   $gender=$_POST['gender'];
   $mail=$_POST['mail'];
   $pnumber=$_POST['pnumber'];
   $address=$_POST['address'];
   $enumber=$_POST['enumber'];

   //this variables for the uploaded profile image
      $fileName=$_FILES['pro_img']['name'];
      $fileType=$_FILES['pro_img']['type'];
      $fileTempName=$_FILES['pro_img']['tmp_name'];
      $fileError=$_FILES['pro_img']['error'];
      $fileSize=$_FILES['pro_img']['size'];
      
      $fileExt=explode('.',$fileName);
      $fileActualExt=strtolower(end($fileExt));
   
      //allowed extentions
      $allowed=array('jpg','png','jpeg');



   include_once '../databaseConnection.php';

   if(empty($fname) || empty($sname) || empty($bdate) || empty($gender) || empty($mail) || empty($pnumber) || empty($address) || empty($enumber)|| empty($fileName)){
      header("Location:../player.php?regi=empty&fname=$fname&sname=$sname&bdate=$bdate&gender=$gender&mail=$mail&pnumber=$pnumber&address=$address&enumber=$enumber");
      exit();

   }else {
       if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        header("Location:../player.php?regi=mail&fname=$fname&sname=$sname&bdate=$bdate");
        exit();
       }else {
           $sql="SELECT * FROM player WHERE mail='$mail';";
           $result=mysqli_query($conn,$sql);
           $count=mysqli_num_rows($result);

             if($count > 0){
                header("Location:../player.php?regi=mailbefore&fname=$fname&sname=$sname&bdate=$bdate");
                exit();
             }else{

                if(!preg_match("/[1-9]/",$pnumber)){
                header("Location:../player.php?regi=phone&fname=$fname&sname=$sname&bdate=$bdate&gender=$gender&mail=$mail");
                 exit();
        }else {
            if(!preg_match("/[1-9]/",$enumber)){
                header("Location:../player.php?regi=ephone&fname=$fname&sname=$sname&bdate=$bdate&gender=$gender&mail=$mail&pnumber=$pnumber");
                exit();
           }else {
               if(!in_array($fileActualExt,$allowed)){
                  header("Location:../player.php?regi=NoAllow");
                  exit();
               }else{
                  if($fileError > 0){
                      header("Location:../player.php?regi=uploadError");
                      exit();
                  }else {
                      if($fileSize > 10000000){
                        header("Location:../player.php?regi=size");
                        exit();
                      }else {
                          $fileNewName=time().".".$fileName;
                          $fileLocation="../uploads/".$fileNewName;
                          move_uploaded_file($fileTempName,$fileLocation);
                          $sql="INSERT INTO player(fname,sname,bdate,gender,mail,pnumber,address,enumber,pro_img) VALUES (?,?,?,?,?,?,?,?,?);";

                          $stmt=mysqli_stmt_init($conn);
                          mysqli_stmt_prepare($stmt,$sql);
                          mysqli_stmt_bind_param($stmt,'sssssssss',$fname,$sname,$bdate,$gender,$mail,$pnumber,$address,$enumber,$fileNewName);
                          mysqli_stmt_execute($stmt);
                          header("Location:../Home.php?regi=success");
                          exit();
                         }
                      }
                  }
               }
            }
         }
       }
   }

}else {
    header("Location:../player.php?regi=error");
    exit();
}


?>
