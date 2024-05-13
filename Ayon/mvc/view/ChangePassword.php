
<?php

session_start();

  require '../model/Data.php';


   
 if (!isset($_SESSION['LoggedIn'])) {
     
     header("Location: UserLogin.php");
     exit();
    
  }


$userData = profileView($_SESSION['user']);

if ($userData) {
    
    $CurrentPassword_db=$username = $userData['password'];
    $staffID=$userData['staff_ID'];
    
} 

echo $CurrentPassword_db;
echo $staffID;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password ANS Hospital</title>

    <?php

            include('header.php');
             include('nav.php');

            ?>
    
    <script type="text/javascript"src="js/ChangePassValidation.js" ></script>

     <style >



          input[type=text] {
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Larger text font */
            padding: 2px;
            box-sizing: border-box;
            border: 2px solid black;
        }

        input[type=password] {
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Larger text font */
            padding: 3px;
            box-sizing: border-box;
            border: 2px solid black;
        }

       

        label {
            font-size: 20px; /* Set font size to 16px */
            font-weight: bold; /* Make the font bold */
        }


       


fieldset{

    border:5px solid green;



}
                
legend{

    font-size: 20px; /* Set font size to 16px */
    font-weight: bold;




}

a{

font-size: 16px;

 /* Set font size to 16px */
    


}
a:hover {
  background-color: yellow;
}

input:hover {
    
    background-color: lightyellow;
   
}

.container {
            width: 100%;
        }

        .left-div {
            width:15%; /* Adjusted width */
            display: inline-block;
            vertical-align: top;
        }


         .right-div {
            width:85%; /* Adjusted width */
            display: inline-block;
            vertical-align: top;
        }

</style>
</head>
<body>

      <div class="container">
    <div class="left-div">
        <?php include('sidebar.php'); ?>
    </div><div class="right-div">
    

   
    <form style="margin-right: 400px;"  action="../controller/ChangePasswordAction.php" method="POST" novalidate onsubmit=" return ChangeValidate();" >

       <br><br> <br><br>
        <center>
       
        
        <table>
            
                <tr> 
                                       
                    <td>

                        <fieldset style="width: 100%;height: 100%; background-color:skyblue; ">
                            
                            <legend>Change Password : </legend>
                          
                        <table>
                 <tr><td><br></td></tr>
                            <tr>
                             
                                  <td><label for="currentpassword" >Current Password </label></td>
                                  <td>: <input id="currentpassword" name="currentpassword" type="password" value="<?php echo isset($_SESSION['currentpassword']) ? $_SESSION['currentpassword'] : ''; ?>"  </td>
                                    
                                    <br>

                                <?php
                                if(isset($_SESSION['error_incorrect_password'])){
                                    echo "<span >".  $_SESSION['error_incorrect_password'] . "</span><br>";
                                   
                                }
                                ?>

                        
                                
                                
                              
                             
                          </tr>

                          
                          <tr><td><br></td></tr>

                          
          
                       
                          <tr>
                      
                            <td> <label for="newpassword">New Password</label></td>
                            <td>: <input id="newpassword"  name="newpassword" type="password" value="<?php echo isset($_SESSION['newpassword']) ? $_SESSION['newpassword'] : ''; ?>">


                                <br>
                                <?php
                                if(isset($_SESSION['Invalid_password_length'])){
                                    echo "<span >".  $_SESSION['Invalid_password_length'] . "</span><br>";
                                   
                                }
                                ?>

                                <br>

                                <?php
                                if(isset($_SESSION['Invalid_password_format'])){
                                    echo "<span >".  $_SESSION['Invalid_password_format'] . "</span><br>";
                                   
                                }
                                ?>


                                






                             </td>

                           

                            

                           


                          

                             
          
                          </tr>
                             <tr><td><br></td></tr>

                               <tr>
                                   
                            <td> <label for="confirmpassword">ConfirmPassword</label></td>
                            <td>: <input id="confirmpassword"  name="confirmpassword" type="password" value="<?php echo isset($_SESSION['confirmpassword_c']) ? $_SESSION['confirmpassword_c'] : ''; ?>"> </td>

                                
                                         
                               

                                     </td>

                               </tr>

                             
                                 <tr>

                                    <td></td>

                                <td>

                                <?php
                                if(isset($_SESSION['error_change_password'])){
                                    echo "<span >".  $_SESSION['error_change_password'] . "</span><br>";
                                   
                                }
                                ?>


                                <?php
                                if(isset($_SESSION['error_not_match'])){
                                    echo "<span >".  $_SESSION['error_not_match'] . "</span><br>";
                                   
                                }
                                ?>
                            
                            <h4 style="color:crimson;">

                                <?php
                                if(isset($_SESSION['successfull'])){
                                    echo "<span >".  $_SESSION['successfull'] . "</span><br>";
                                   
                                }
                                ?>
                                

                            </h4>

                                 

                            </td>



                                 </tr>
 

                          
                         <center>
                             

                         </center>
                            <tr>


                                <td><td>

                                    <input style="background-color:#333; color : white; width: 150px ; height: 25px; border-radius: 12px; border: 1px solid;" type="submit" value="Change Password">


                                    

                                    <button style="background-color:lightyellow; width: 100px; height:25px; border-radius: 12px; border: 1px solid;" onclick="window.location.href='../view/Dashboard.php'; return false;">Back</button>


                                    

                                </td>
                                  
                                  <td>

                                    





                            </td>
                                

                               

                                    
                                       

                                   

                                

                       




                                    

                                
                            </tr>
                            
                        
                      
                  
                       </table>



        


    

                       
               

                    </fieldset>





                    </td>


                </tr>
      
        </table>
        
           </center>
    


    


         

                             


</form>
</div>

</div>

                                    
</body>


 <?php

            include('footer.php');

            ?>
</html>



