
<?php

session_start();

  require '../model/Data.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget password ANS Hospital</title>

    <script type="text/javascript" src="js/ForgetPassValidation.js" ></script>
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
    

   
    <form  action="../controller/forgetAction.php" method="POST" novalidate onsubmit=" return ForgetValidate();">

       <br><br> <br><br>
        <center>
        
        
        <table>
            
                <tr> 
                                       
                    <td>

                        <fieldset style="background-color:skyblue;">
                            
                            <legend>Forget Password : </legend>
                          
                        <table>
                 
                            <tr>
                             
                                  <td><label for="username" >Username </label></td>
                                  <td>: <input id="username" name="username" type="text" value="<?php echo isset($_SESSION['username_f']) ? $_SESSION['username_f'] : ''; ?>"</td>


                                  <?php
                                if(isset($_SESSION['inccorret_username'])){
                                    echo "<span >". $_SESSION['inccorret_username'] . "</span><br>";
                                   
                                   }
                                 ?>   
         
                         </tr>

                          
          
                       
                          <tr>

                            <tr><td><br></td></tr>

                            <td> <label for="email">email</label></td>
                            <td>: <input id="email"  name="email" type="text" value="<?php echo isset($_SESSION['email_f']) ? $_SESSION['email_f'] : ''; ?>" </td>

                     

                                 <?php
                                if(isset($_SESSION['invalid_email'])){
                                    echo "<span >". $_SESSION['invalid_email'] . "</span><br>";
                                   
                                   }
                                 ?>  


                          </tr>
                            

                            <tr>

                                 <tr><td><br></td></tr>



                                   
                            <td> <label for="newpassword">New Password</label></td>
                            <td>: <input id="newpassword"  name="newpassword" type="password" value="<?php echo isset($_SESSION['newpassword_f']) ? $_SESSION['newpassword_f'] : ''; ?>" </td>
                              
                           
                                
                                 <?php
                                if(isset($_SESSION['Invalid_password_format'])){
                                    echo "<span >". $_SESSION['Invalid_password_format'] . "</span><br>";
                                   
                                   }
                                 




                                   
                                if(isset($_SESSION['Invalid_password_length'])){
                                    echo "<span >". $_SESSION['Invalid_password_length'] . "</span><br>";
                                   
                                   }
                                 
                                  
                                  


                                
                                if(isset($_SESSION['error_empty'])){
                                    echo "<span >". $_SESSION['error_empty'] . "</span><br>";
                                   
                                   }

                                    ?> 
                               

                               <h4 style="color:crimson;">
                                
                                <?php 

                                if(isset($_SESSION['reset'])){
                                    echo "<span >". $_SESSION['reset'] . "</span><br>";
                                   
                                   }


                                 ?>
                                   

                                    </h4>
                                 




                                  
                                 


                        

                               </tr>



                          
                            
                            
                        
          
                          
                      
                  
                       </table>


                       <center>
                           


                            <button formaction="../controller/forgetAction.php" style="background-color:lightgreen; width: 100px ; height:30px; border-radius: 12px; border: 1px solid;">Submit</button> 


                            <button style="background-color:lightyellow; width: 100px; height:25px; border-radius: 12px; border: 1px solid;" onclick="window.location.href='../view/UserLogin.php'; return false;">Back</button>


                      
          
               

                    </fieldset>

 
      
        </table>
        
           </center>



    </form>
</body>

 <?php

            include('footer.php');

            ?>
</html>



