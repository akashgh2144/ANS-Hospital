
<?php
session_start();

require '../model/data.php';

if (!isset($_SESSION['logged'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data
$userData = profile($_SESSION['user']);

// Initialize variables


if ($userData) {
    // Extract user data
    $doctor_ID = $userData['doctorID'];
    $fullName = $userData['fullname'];
    $email = $userData['email'];
    $mobile = $userData['mobile'];
    $password = $userData['password'];
    $gender = $userData['gender'];
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Profile</title>
    <script type="text/javascript" src="js/profile.js"></script>
</head>
<body style="background-color: aquamarine;">
    <center>
        <h3>Profile</h3>
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend>Profile :</legend>
                        <form novalidate method="POST" onsubmit="return provalidate();">
                            <table>
                                <tr>
                                    <td><b><label for="doctor_ID">Doctor ID </label></b></td>
                                    <td>: <input readonly id="doctor_ID" name="doctor_ID" type="text" value="<?php echo $doctor_ID ?? ''; ?>"></td>
                                </tr>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="fullname">Full Name </label></b></td>
                                    <td>: <input readonly id="fullname" name="fullname" type="text" value="<?php echo $fullName ?? ''; ?>"></td>
                                </tr>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="email">Email</label></b></td>
                                    <td>: <input readonly id="email" name="email" type="text" value="<?php echo $email ?? ''; ?>"></td>
                                </tr>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="gender">Gender </label></b></td>
                                    <td>: <input readonly id="gender" name="gender" type="text" value="<?php echo $gender ?? ''; ?>"></td>
                                </tr>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="password">Password</label></b></td>
                                    <td>: <input readonly id="password" name="password" type="text" value="<?php echo $password ?? ''; ?>"></td>
                                </tr>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td><b><label for="mobile">Phone no</label></b></td>
                                    <td>: <input readonly id="mobile" name="mobile" type="text" value="<?php echo $mobile ?? ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button formaction="../views/updateprofile.php" name="update">Update</button></td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>

