<!DOCTYPE html>
<html>
<head>


</head>
<body>
    <br>

        <fieldset style="background-color: lightyellow; border-radius: 6px; border: solid 3px; padding: 0px;">
        <nav>
            <center>
                <div>
                    <table>
                        <tr>
                            <td>
                                <button style=" background-color: #333; color: white; width: 180px; height: 35px; border-radius: 12px; border: 1px solid;">
                                    <a style="color: white; font-weight: bold;" href="../view/Profile.php">Profile</a>
                                </button>
                            </td>
                            <td>
                                <button style="background-color: #333; color: white; width: 180px; height: 35px; border-radius: 12px; border: 1px solid;">
                                    <a style="color: white; font-weight: bold;"href="../view/ChangePassword.php ">Change Password</a>
                                </button>
                            </td>
                            <td>
                                <button style="background-color: #333; color: white; width: 180px; height: 35px; border-radius: 12px; border: 1px solid;">
                                    <a style="color: white; font-weight: bold;" href="../controller/LogoutAction.php">Logout</a>
                                </button>
                            </td>
                            <td>
                                <p style="color: chocolate; font-weight: bold;">Welcome, <?php if (isset($_SESSION['user'])) {
                                        echo $_SESSION['user'];
                                    }; ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </center>
        </nav>
    </fieldset>



</body>
</html>