<?php
session_start();

if (!isset($_SESSION['logged'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <style type="text/css">
        body{

            background-image: url("img10.jpg");
        }

    </style>
</head>
<body style="background-color: rgb(253 186 116);">
    <fieldset>
        <center>
            <div><header><h4 style="color: aqua;">ANS Hospital Management System</h4></header></div>
        </center>
        <fieldset>
            <nav style="background-color: aquamarine;">
                <center><td>

                    <div>
                        <table>
                            <tr>
                                <td><a href="../views/profile.php">Profile</a></td><td></td><td></td>
                                <td><a href="../views/changepassword.php">Change Password</a></td><td></td><td><td></td></td>
                                <td><a href="../controllers/logout.php">Logout</a></td>
                                <td><p>Welcome <?php if(isset($_SESSION['user'])){
                                    echo  $_SESSION['user'] ;
                                   
                                };?></p></td>
                            </tr>
                        </table>
                    </div>
                </center>
            </nav>
        </fieldset>
        <fieldset>
            <aside style="display: inline-grid;">
                <br> <br><br>
                <form action="../views/patientlist.php" method="get">
                    <button style="background-color:  rgb(74 222 128);" type="submit">Patient List</button><br><br>
                </form>
                <br>
                <form action="../views/DoctorSalary.php" method="get">
                    <button style="background-color: rgb(74 222 128);" type="submit">Check Account</button><br><br>
                </form>
                <br>
                <form action="../views/fee & followup.php" method="get">
                    <button style="background-color: rgb(74 222 128);" type="submit">Set Fee and Folloeup</button><br><br>
                </form>
                <br>
                <form action="../views/paitent_Record.php" method="get">
                    <button style="background-color: rgb(74 222 128);" type="submit">Plans</button><br><br>
                </form>
                <br><br>
            </aside>
        </fieldset>
    </fieldset>
</body>
</html>
