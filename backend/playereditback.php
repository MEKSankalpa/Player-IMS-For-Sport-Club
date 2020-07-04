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
   $id = $_GET['id'];

   //this variables for the uploaded profile image
if(isset($_FILES['pro_img'])){
    $fileName=$_FILES['pro_img']['name'];
    $fileType=$_FILES['pro_img']['type'];
    $fileTempName=$_FILES['pro_img']['tmp_name'];
    $fileError=$_FILES['pro_img']['error'];
    $fileSize=$_FILES['pro_img']['size'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    //allowed extentions
    $allowed=array('jpg','png','jpeg');
}
else{
    $fileName = $_GET['pro_img'];
}


   include_once '../databaseConnection.php';

   if(empty($fname) || empty($sname) || empty($bdate) || empty($gender) || empty($mail) || empty($pnumber) || empty($address) || empty($enumber)|| empty($fileName)){
      header("Location:../player.php?regi=empty&id=$id&fname=$fname&sname=$sname&gender=$gender&pro_img=$pro_img&bdate=$bdate&mail=$mail&pnumber=$pnumber&address=$address&enumber=$enumber");
      exit();

   }else {
       if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        header("Location:../player.php?regi=mail&id=$id&fname=$fname&sname=$sname&gender=$gender&pro_img=$pro_img&bdate=$bdate&pnumber=$pnumber&address=$address&enumber=$enumber","_self");
        exit();
       }else {
           $sql="select * from player where mail='$mail' and !id='$id'";
           $result=mysqli_query($conn,$sql);
           $count=mysqli_num_rows($result);
           
             if($count > 0){
                header("Location:../player.php?regi=mailbefore&id=$id&fname=$fname&sname=$sname&gender=$gender&pro_img=$pro_img&bdate=$bdate&pnumber=$pnumber&address=$address&enumber=$enumber","_self");
                exit();
             }else{
          
                if(!preg_match("/[1-9]/",$pnumber)){
                header("Location:../player.php?regi=phone&id=$id&fname=$fname&sname=$sname&bdate=$bdate&gender=$gender&mail=$mail");
                 exit();
        }else {
            if(!preg_match("/[1-9]/",$enumber)){
                header("Location:../player.php?regi=ephone&id=$id&fname=$fname&sname=$sname&bdate=$bdate&gender=$gender&mail=$mail&pnumber=$pnumber");
                exit();
           }else {
               if(!in_array($fileActualExt,$allowed)){
                  header("Location:../player.php?regi=NoAllow&id=$id");
                  exit();
               }else{
                  if($fileError > 0){
                      header("Location:../player.php?regi=uploadError&id=$id");
                      exit();
                  }else {
                      if($fileSize > 10000000){
                        header("Location:../player.php?regi=size&id=$id");
                        exit();
                      }else {
                          $fileNewName=time().".".$fileName;
                          $fileLocation="../uploads/".$fileNewName;
                          move_uploaded_file($fileTempName,$fileLocation);
                          $sql="UPDATE player SET fname=?,sname=?,bdate=?,gender=?,pnumber=?,mail=?,address=?,enumber=?,pro_img=? WHERE id=?";

                          $stmt=mysqli_stmt_init($conn);
                          mysqli_stmt_prepare($stmt,$sql);
                          mysqli_stmt_bind_param($stmt,'sssssssss',$fname,$sname,$bdate,$gender,$pnumber,$mail,$address,$enumber,$fileNewName,$id);
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