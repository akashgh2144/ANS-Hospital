<?php
session_start();

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard ANS Hospital</title>
    <script type="text/javascript" src="js/ajaxDateTime.js"></script>

    <?php
        include('header.php');
        include('nav.php');
    ?>

    <style>
        .container {
            width: 100%;
        }

        .left-div {
            width: 15%; /* Adjusted width */
            display: inline-block;
            vertical-align: top;
        }

        .right-div {
            width: 70%; /* Adjusted width */
            display: inline-block;
            vertical-align: top;
        }

        .console-container {
 
  font-family:Khula;
  font-size:4em;
  text-align:center;
  height:200px;
  width:600px;
  display:block;
  position:absolute;
  color:lightgrey;
  top:0;
  bottom:0;
  left:0;
  right:0;
  margin:auto;


}

    </style>

    <script type="text/javascript"src="js/DateTime.js" ></script>

</head>

<body style="background-color: white;">
    <div class="container">
        <div class="left-div">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="right-div">
            <center>
                <br>
                <h1 class="console-container" style="font-size: 100px;">Dashboard</h1>
                <h1 style="color:purple;font-size: 50px;" id="dt"></h1>

                
                    
                
            </center>
        </div>
    </div>


    <script>
        function updateDateTime() {
            var now = new Date();
            var dateTimeString = now.toLocaleString(); // Get current date and time as a string
            document.getElementById('dt').innerText = dateTimeString; // Update the content of <h2> tag with id 'dt'
        }

        // Call the function to update date and time immediately
        updateDateTime();

        // Call the function to update date and time every second
        setInterval(updateDateTime, 1000);
    </script>

    <?php include('footer.php'); ?>




    
</body>
</html>
