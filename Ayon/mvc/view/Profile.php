<?php
session_start();

require '../model/Data.php';

if (!isset($_SESSION['LoggedIn'])) {

     header("Location: UserLogin.php");
     exit();
    
  }

// Get the user's data
$userData = profileView($_SESSION['user']);

// Check if the user data exists
if ($userData) {
    // Extract user data
    $fullName = $userData['full_name'];
    $username = $userData['username'];
    $gender = $userData['gender'];
    $password = $userData['password'];
    $email=$userData['email'];
    $mobile=$userData['mobile_no'];
    $area = $userData['area'];
    $address = $userData['address'];
} 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff Profile</title>

    <?php

            include('header.php');
             include('nav.php');

            ?>
    
    <script type="text/javascript"src="js/ProfileUpdateValidation.js" ></script>

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

textarea:hover {
    
    background-color: lightyellow;
   
}

textarea {
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Larger text font */
            padding: 3px;
            box-sizing: border-box;
            border: 2px solid black;
            
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
    
    <center>
        <table>
            <tr>
                <td>
                    <fieldset style="background-color:skyblue;margin-right: 400px;">
                        <legend>Profile :</legend>
                        <form  novalidate method="POST"> 
                            <table>
                                <tr>
                                    <td><b><label for="fname" >Full Name </label></td>
                                    <td>: <input readonly id="fname" name="fname" type="text" value="<?php echo $fullName; ?>"></td>
                                </tr>



                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="uname" >Username</label></td>
                                    <td>: <input readonly id="uname" name="uname" type="text" value="<?php echo $username; ?>"></td>
                                </tr>


                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="password" >Password</label></td>
                                    <td>: <input  readonly id="password" name="password" type="text" value="<?php echo $password; ?>"></td>
                                </tr>





                                 <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="gender" >Gender </label></td>
                                    <td>: <input  readonly id="gender" name="gender" type="text" value="<?php echo $gender; ?>"></td>
                                </tr>





                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="email" >Email</label></td>
                                    <td>: <input readonly id="email" name="email" type="text" value="<?php echo $email; ?>"></td>
                                </tr>

                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="mobile" >Mobile</label></td>
                                  <td>: <input readonly id="mobile" name="mobile" type="text" value="<?php echo $mobile; ?>"></td>
                                </tr>





                                
                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="area" >Area</label></td>
                                    <td>: <input readonly id="area" name="area" type="text" value="<?php echo $area; ?>"></td>
                                </tr>



                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="address" >Address</label></td>
                                    <td><br><textarea readonly name="address" rows="5" cols="25" placeholder=""><?php echo $address; ?></textarea></td>  
                                </tr>

                                    
                                   
                               
                            </table>

                            <center>

                                 <button formaction=" ../view/UpdateProfile.php" name="update" style="background-color:lightgreen; width: 100px ; height:30px; border-radius: 12px; border: 1px solid;">Update</button>

                                    <button formaction="../view/Dashboard.php" style="background-color:lightyellow; width: 100px ; height:30px; border-radius: 12px; border: 1px solid;" >Back</button>
                                


                            </center>


                            
                        </form>
                    </fieldset>
                </td>
            </tr>
        </table>
    </center>

</div>
</div>
</body>


 <?php

            include('footer.php');

            ?>

</html>
