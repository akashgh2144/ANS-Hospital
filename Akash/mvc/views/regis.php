<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Staff Registarion</title>
	<center><head><h3>ANS Hospital Management System</h3> </head></center>
</head>
<body>

<center>

<table>
            


            <tr>

                <td>

                        <fieldset>

                                 <legend><i><b>Staff Registration :</b></i></legend>
            
            <form method="POST" novalidate >

      <center>
        

        <table>


      <tr>

                             
                   <td><b><label for="fname" >First Name </label></td>
                   <td>: <input id="fname" name="fname" type="text" value=""</td> 





            <?php
            if(isset($_SESSION['empty_error_firstname'])){
                echo "<span >". $_SESSION['empty_error_firstname'] . "</span><br>";
               
            }
      ?>                           
                             
       </tr>
                    
              <tr><td><br></td></tr>

       <tr>


                             
                   <td><b><label for="lname" >Last Name </label></td>
                   <td>: <input id="lname" name="lname" type="text" value=""</td>     



        <?php
            if(isset($_SESSION['empty_error_lastname'])){
                echo "<span >". $_SESSION['empty_error_lastname'] . "</span><br>";
               
            }
      ?>                                 
                             
       </tr>




          <tr><td><br></td></tr>

       <tr>


                             
                   <td><b><label for="username" >Username</label></td>
                   <td>: <input id="username" name="username" type="text" value=""</td>  



            <?php
            if(isset($_SESSION['empty_error_username'])){
                echo "<span >". $_SESSION['empty_error_username'] . "</span><br>";
               
            }
      ?>                                  
                             
       </tr>



        <tr><td><br></td></tr>

       <tr>

                             
                   <td><b><label for="password" >Password</label></td>
                   <td>: <input id="password" name="password" type="password" value=""</td>  

                  <?php
            if(isset($_SESSION['empty_error_password'])){
                echo "<span >". $_SESSION['empty_error_password'] . "</span><br>";
               
            }


       

                 
            if(isset($_SESSION['Invalid_password_length'])){
                echo "<span >". $_SESSION['Invalid_password_length'] . "</span><br>";
               
            }


                
            if(isset($_SESSION['Invalid_password_format'])){
                echo "<span >". $_SESSION['Invalid_password_format'] . "</span><br>";
               
            }
      ?>                                  
                             
       </tr>


        <tr><td><br></td></tr>

       <tr>

                             
                   <td><b><label for="confirmpassword" >Confirm Password</label></td>
                   <td>: <input id="confirmpassword" name="confirmpassword" type="password" value=""</td>


                  <?php
            if(isset($_SESSION['empty_error_confirmpassword'])){
                echo "<span >". $_SESSION['empty_error_confirmpassword'] . "</span><br>";
               
            }


            if(isset($_SESSION['not_match'])){
                echo "<span >". $_SESSION['not_match'] . "</span><br>";
               
            }
      ?>                  



        </tr>                            
                             
        <tr>
        <td><br><b><label>Gender</label></b> </td>
        

            <td>
            <br>:
            <input type="radio" name="gender" value="male" id="male">
            <label for="male">Male</label
            </td>


        <br>

        <br>
         
                  <?php
            if(isset($_SESSION['empty_error_gender'])){
                echo "<span >". $_SESSION['empty_error_gender'] . "</span><br>";
               
            }
      ?>                  

       

          <td>
          <br>
          <input type="radio" name="gender" value="female" id="female">
          <label for="female">Female</label
          </td>

            

      </tr>
    


    <tr><td><br></td></tr>
  
   
    <tr>

                             
                   <td><b><label for="email" >Email address</label></td>
                   <td>: <input id="email" name="email" type="text" value=""</td>


                  <?php
            if(isset($_SESSION['empty_error_email'])){
                echo "<span >". $_SESSION['empty_error_email'] . "</span><br>";
               
            }




                 
            if(isset($_SESSION['invalid_email'])){
                echo "<span >". $_SESSION['invalid_email'] . "</span><br>";
               
            }
      ?>                  


        </tr>  




        <tr><td><br></td></tr>
  
   
        <tr>

                             
                   <td><b><label for="mobile" >Mobile No</label></td>
                   <td>: <input id="mobile" name="mobile" type="mobile" value=""</td>


                  <?php
            if(isset($_SESSION['empty_error_mobile'])){
                echo "<span >". $_SESSION['empty_error_mobile'] . "</span><br>";
               
            }

            if(isset($_SESSION['invalid_number'])){
                echo "<span >". $_SESSION['invalid_number'] . "</span><br>";
               
            }
                 


        
            ?>      


        </tr>  


         <tr><td><br></td></tr>
  
        <tr>
              
            
                   <td><label><b> Area </label></td>

                    <td>:
                    <label>Select Region</label><br>
                    <select name="region"  >
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chattogram">Chattogram</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Barishal">Barishal</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Sylhet">Sylhet</option>

        
                  </select>


                  </td>


                    <td>
                    <label>Select City</label><br>
                    <select name="city"  >
                    <option value="Dhaka North">Dhaka North</option>
                     <option value="Dhaka Sought">Dhaka Sought</option>

                     <option value="Cox's Bazar">Cox's Bazar</option>
                     <option value="Rangamati">Rangamati</option>


                     <option value="Natore">Natore</option>
                     <option value="Joypurhat">Joypurhat</option>

                     <option value="Jessore">Jessore</option>
                     <option value="Satkhira">Satkhira</option>

                  

                     <option value="Dinajpur">Dinajpur</option>
                     <option value="Thakurgaon">Thakurgaon</option>

                     <option value="Patuakhali">Patuakhali</option>
                     <option value="Bhola">Bhola</option>

                     <option value="Jamalpur">Jamalpur</option>
                     <option value="Netrokona">Netrokona</option>

                      <option value="Moulvibazar">Moulvibazar</option>
                     <option value="Habiganj">Habiganj</option>


                     
        
                  </select>


                  </td>
        


    </tr>






         <tr><td></td></tr>
  
   
        <tr>

                <td><b><label for="address" >Address</label></td>

                             
                  <td><br><textarea  name="address" rows="5" cols="25" placeholder="house No/building/street/area"  ></textarea </td>  

                <?php
            if(isset($_SESSION['empty_error_address'])){
                echo "<span >". $_SESSION['empty_error_address'] . "</span><br>";
               
            }
      ?>                  

        </tr>  




    <tr><td><br></td></tr>
  
   
        <tr>


                             
                   <td><b><label for="profile" >Profile Picture</label></td>
                   <td>: <input id="profile" name="profile" type="file" value=""
                   </td>
               <br>
            <?php
            if(isset($_SESSION['error_size'])){
                echo "<span >". $_SESSION['error_size'] . "</span><br>";
               
            }


             if(isset($_SESSION['error_ext'])){
                echo "<span >". $_SESSION['error_ext'] . "</span><br>";
               
            }


            if(isset($_SESSION['success'])){
                echo "<span >". $_SESSION['success'] . "</span><br>";
               
            }


            if(isset($_SESSION['error_upload'])){
                echo "<span >". $_SESSION['error_upload'] . "</span><br>";
               
            }
      ?>            



        </tr>  



      </table>


       <table>
           
          

          <tr>


              

                    <td><br><button type="submit" name="register"  value="Register" formaction="../controller/RegistrationAction.php" >Register</button></td>
                    
                    
                   
                    <td><br><button type="submit" name="sad" value="" formaction="" >Save as Draft</button></td>
                    
                    


          </tr>





           <tr>

            <td><label>Do you have an account?</label></td>

            <td> <a href=" ../view/UserLogin.php">Login</a></td>

      

        </tr>  


       </table> 



      </center>
      
        



 </form>

                     

 </fieldset>



                </td>
                


            </tr>





</table>







	



</center>

</body>
</html>