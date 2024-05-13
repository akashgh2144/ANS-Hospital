<?php
session_start();
require '../model/Data.php';

$userData = profileView($_SESSION['user']);

if ($userData) {
    $CurrentPassword_db = $userData['password'];
    $staffID=$userData['staff_ID'];
} 




if ($_SERVER['REQUEST_METHOD'] === "POST") {


    $flag = true;

    $CurrentPassword = sanitize($_POST['currentpassword']);

    $NewPassword = sanitize($_POST['newpassword']);

    $ConfirmPassword = sanitize($_POST['confirmpassword']);

    $_SESSION['currentpassword']=$CurrentPassword;

     $_SESSION['newpassword']=$NewPassword;

      $_SESSION['confirmpassword_c']=$ConfirmPassword; 




    if (empty($CurrentPassword) || empty($NewPassword) || empty($ConfirmPassword)) {


        $_SESSION['error_change_password'] = "Please fill all the fields";
        $flag = false;
                 unset($_SESSION['successfull']);


    }



    if (strlen($NewPassword) < 6) {
        $_SESSION['Invalid_password_length'] = "Password length should be at least 6 characters";
        $flag = false;
                 unset($_SESSION['successfull']);

    }



    if (!preg_match('/[A-Za-z]/', $NewPassword) || !preg_match('/[0-9]/', $NewPassword)) {


        $_SESSION['Invalid_password_format'] = "Password must contain at least one letter and one number";
         unset($_SESSION['successfull']);


        $flag = false;
    }



    if ($CurrentPassword_db != $CurrentPassword) {
        $_SESSION['error_incorrect_password'] = "Current Password is incorrect";

                 unset($_SESSION['successfull']);

        $flag = false;
    }




    if ($NewPassword != $ConfirmPassword) {


        $_SESSION['error_not_match'] = "New password and confirm password do not match";
         unset($_SESSION['successfull']);

        $flag = false;
    }

    



    if ($flag) {
        $flag = ChangePassword($NewPassword,$CurrentPassword_db,$staffID);
        if ($flag) {
            //header("Location: ../controller/LogoutAction.php");
                    header("Location: ../view/ChangePassword.php");

                      $_SESSION['successfull'] = "Password Changed Successfully";

                      
                    unset($_SESSION['error_change_password'], $_SESSION['Invalid_password_length'], 

                          $_SESSION['Invalid_password_format'],$_SESSION['error_incorrect_password'],

                          $_SESSION['error_not_match'],$_SESSION['currentpassword'], $_SESSION['newpassword'], $_SESSION['confirmpassword']

                      );


            exit();
        } 
    } 

    else {
        header("Location: ../view/ChangePassword.php");
        exit();
    }

} 


else {
    echo "Invalid Request for change password";
}

function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}
?>


