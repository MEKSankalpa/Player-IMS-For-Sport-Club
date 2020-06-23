<link rel="stylesheet" href="css/player.css">
         <div class="form-group  px-5 mt-4">
                         <div class="img-profile mb-3" ><img src=" images/user.png" onclick="profileImgClick()" id="default" class="profileDisplay" alt="profile image" width="100" height="100" >                  
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

                           <input type="radio" class="form-check-input mr-2" name="gender" id="male" value="Male">
                           <label for="male" >Male</label>
                         </div>
                         
                         <div class="form-check form-check-inline col-3">
                           <input type="radio" class="form-check-input mr-2" name="gender" id="female" value="Female">
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
                       <input type="submit" class="btn btn-info" name="submit" value="Register">
                      
              </div>