
<?php

 session_start();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ANS Hospital</title>

    <script type="text/javascript" src="js/LoginValidation.js"></script>


    

    
<?php

            include('header.php');

        ?>

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

.col {
  background-color: white; 
  color: black; 
  border: 2px solid #04AA6D;
}




            </style>
            






</head>
<body>



    <br><br><br>
    
    <center>

   
    <form action="../controller/LoginAction.php" method="POST" novalidate onsubmit=" return IsValidate(); "  >
        
        
        <table>
            
                <tr> 
                                       
                    <td>

                        <fieldset style="background-color:skyblue;  width: 400px;height: 300px; ">
                            
                            <legend>User Login : </legend>
                          
                        <table>
                         <tr><td> <br></td></tr>
                            <tr>
                             
                                  <td><label for="username" >User name </label></td>
                              <td>: <input id="username" name="username" type="text" value="<?php echo isset($_SESSION['username_l']) ? $_SESSION['username_l'] : ''; ?>"></td>
                        
                                
                                
                              
                             
                          </tr>

                          <tr><td> <br></td></tr>
          
                       
                          <tr>
                      
                            <td> <label for="password">Password</label></td>
                            <td>: <input id="password" name="password" type="password" value="<?php echo isset($_SESSION['password_l']) ? $_SESSION['password_l'] : ''; ?>"></td>
                           
                          

                             
          
                          </tr>


                               <tr>
                                   
                                     <td><td>

                                <?php
                                if(isset($_SESSION['error_login'])){
                                    echo "<span >". $_SESSION['error_login'] . "</span><br>";
                                   
                                }
                                ?>
                                         
                               

                                     </td>

                               </tr>


                          <tr>
                            
                           <td><td> <button class="button col" style="background-color:#333; color : white; width: 180px ; height: 25px; border-radius: 12px; border: 1px solid;" >Login</button> </td> 


                        
          
                          </tr>

           
                          <tr>
                              <td></td>
                              <td>Do you have no account ?</td>

                              <td> <a href=" ../view/Registration.php">Registration</a> </td>

                          </tr>


                          <tr>
                              <td></td>
                              <td> <a href=" ../view/forgetPassword.php">Forgotten password?</a> </td>

                          </tr>



                  
                       </table>
                      
          
               

                    </fieldset>

                    <div>
                            <h3 style="background-color:lightgreen;">

                            <?php


                                    if(isset($_COOKIE['last_logout'])) {
                                    $lastLogoutTime = $_COOKIE['last_logout'];
                                    echo "Last Logout Time: " . $lastLogoutTime;
                                } else {
                                    echo "No last logout time recorded.";
                                }
                            ?>

                            </h3>
                                </div>



                    </td>


                </tr>
      
        </table>
        
          
    </form>

      </center>
</body>






 <?php

            include('footer.php');

            ?>



</html>



