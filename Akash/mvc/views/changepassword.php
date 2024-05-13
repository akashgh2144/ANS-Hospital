<?php
session_start();

require '../model/Data.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ANS Hospital</title>
    <script type="text/javascript" src="js/chnagepassword.js"></script>
</head>
<body style="background-color:  rgb(13 148 136);">
    <form action="changepasswordActionfile.php" method="POST" novalidate onsubmit=" return changevalidate();">

<br><br><br><br><br><br>
<div>


<center>
    <br><br>

    <table>
  
                        
           <tr>
             <td>
             <fieldset>
                <center>
                    <table>
                        <tr>
                            <td>


                                            
                                    <label style=" color: rgb(251 146 60)" for="phoneno">Mobile Number:</label><br>
                                    <input type="text" id="phoneno" name="phoneno"><br>
                               
                            <tr>
                                <td>
                                    <label style="color: rgb(251 146 60)" for="newpassword">New Password:</label><br>
                                    <input type="password" id="newpassword" name="newpassword"><br>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    
                                <button style="background-color: rgb(131 24 67); color:whitesmoke" formaction="../controllers/changepasswordaction.php" >submit</button>
                                </td>
                            </tr>



                          


                            
                            <h4 style="color: blue;" >



     <?php
         if(isset($_SESSION['empty'])){
            echo "<span >". $_SESSION['empty'] . "</span><br>";
                           
             }
                        ?>




</h4>





                        </td>
                    </tr>
                    </table>
                    
                </center>
                   






                            

</fieldset>
</td>
     </tr>
    </table>

    </center>












</div>

  </form>
</body>
</html>
