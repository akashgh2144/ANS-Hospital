<?php

session_start();
require '../model/Data.php';


if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}


$userData = profileView($_SESSION['user']);


if ($userData) {
  
    $staffID = $userData['staff_ID'];
  //  echo $staffID; 
    
    $result =display_application($staffID);
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application View</title>
 <?php
    include('header.php');
    include('nav.php');
    ?>
   
       <style>
        table {
            width: 75%;
            border-collapse: collapse;
            ba
        }

        th, td {
            border: 1px solid;
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: skyblue;
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
    <form action="" method="POST" novalidate>
        <br><br><br><br>

        <center>
            <table>
                <tr>
                    <th>Reason</th>
                   
                    <th>Date for leave</th>
                    
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>  
                <tr>
                    <td><?php echo $row['reason']; ?></td>
                   
                    <td><?php echo $row['date_for_leave']; ?></td>
                    
                </tr>
                <?php
                
                $comments_value = $row['comments'];
                }
                ?>
            </table>

            <br>

            <h5 style="color:red;">Comments :</h5>
            <textarea readonly style="border: solid 3px ; border-radius: 8px; border-color: skyblue;" id="comments" name="comments" rows="6" cols="50"><?php echo isset($comments_value) ? $comments_value : ''; ?></textarea>

            <br><br>

            <button formaction="../view/Dashboard.php" style="background-color:lightyellow; width: 100px ; height:30px; border-radius: 12px; border: 1px solid;" >Back</button>
        </center>
    </form>

</div>

</div>

</body>

 <?php

            include('footer.php');

            ?>
</html>
