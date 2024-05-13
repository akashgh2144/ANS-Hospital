<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Registarion</title>
    <style>
        body{
            background-image: url("res.jpg");
        }
    </style>
     <script type="text/javascript" src="js/registration.js"></script>	
</head>
<body>
<center><head><h3 style="color: aliceblue;">ANS Hospital Management System</h3> </head></center>
<center>

<table>
            
            <tr>

                <td>

                        <fieldset >

                                 <legend style="color: aliceblue;"><i><b>Doctor Registration :</b></i></legend>
            
            <form method="POST" novalidate onsubmit="return Regvalidate();" >

      <center>
        

        <table>


       <tr>                        
                   <td><b><label style="color: orangered;" for="fullename" >Fullname</label></td>
                   <td>: <input id="fullename" name="fullename" type="text" value=""</td>  



            <?php
            if(isset($_SESSION['empty_error_fullname'])){
                echo "<span >". $_SESSION['empty_error_fullname'] . "</span><br>";
               
            }
      ?>                                  
                             
       </tr>

<!-- email start -->
        
    <tr>

                             
<td><b><label style="color: orangered;" for="email" >Email </label></td>
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

<!-- //email end  -->

<!-- #mobile start -->

<tr>

                             
<td><b><label style="color: orangered;" for="phoneno" >Mobile No</label></td>
<td>: <input id="phoneno" name="phoneno" type="phoneno" value=""</td>


<?php
if(isset($_SESSION['empty_error_mobile'])){
echo "<span >". $_SESSION['empty_error_mobile'] . "</span><br>";

}

if(isset($_SESSION['invalid_number'])){
echo "<span >". $_SESSION['invalid_number'] . "</span><br>";

}


?>      


</tr> 

<!-- #mobile end -->

<br/>

<!-- password start -->
       <tr>
                             
                  <td><b><label style="color: orangered;" for="password" >Password</label></td>
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

                             
                   <td><b><label style="color: orangered;" for="confirmpassword" >Confirm Password</label></td>
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
        <td><br><b><label style="color: orangered;">Gender</label></b> </td>
            <td>
            <br>:
            <input type="radio" name="gender" value="male" id="gender">
            <label style="color: red;" for="male">Male</label
            </td>


        <br>

        <br>
         
                  <?php
            if(isset($_SESSION['empty_error_gender'])){
                echo "<span >". $_SESSION['empty_error_gender'] . "</span><br>";
               
            }
      ?> 
        <td>
          
      <input type="radio" name="gender" value="female" id="gender">
      <label style="color: red;" for="female">Female</label
      </td>                

       
      </tr>

      <td><br><button class="button button2" type="submit" name="register"  value="Register" formaction="../controllers/registration action.php" >Register</button></td>
      
    </tr>

      </table>


       <table>
                   
           <tr>

            <td><label style="	color: rgb(253 224 71);">Do you have an account?</label></td>

            <td> <a style="color: red;" href="../views/login.php">Login</a></td>

      
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