<!DOCTYPE html>
<html>
<head>
  <title>ANS HOSPITAL</title>
  <style>
    body { 
      background-image: url('bannerImg.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%; /* Added to cover the entire screen */
      position: relative; /* Needed for absolute positioning */
    }

    /* Style for h2 elements */
    #reg {
      position: absolute; /* Position absolutely */
      top: 10px; /* Adjust as needed */
      right: 100px; /* Adjust as needed */
      margin: 0px; /* Remove default margin */
    }

        #login {
      position: absolute; /* Position absolutely */
      top: 10px; /* Adjust as needed */
      right: 20px; /* Adjust as needed */
      margin: 0px; /* Remove default margin */
    }
  </style>
</head>
<body>

  <h2 id="login"><a href="UserLogin.php">Login</a></h2>
  <h2 id="reg"><a href="Registration.php">Registration</a></h2>

</body>

<?php
    include('footer.php');
?>
</html>
