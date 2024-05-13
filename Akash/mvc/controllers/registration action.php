<?php
session_start();

require '../model/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    function sanitize($res) {
        $res = htmlspecialchars($res);
        return $res;
    }

    $fullname = sanitize($_POST['fullename']);
    $email = sanitize($_POST['email']);
    $phoneno = sanitize($_POST['phoneno']);
    $password = sanitize($_POST['password']);
    $confirmpassword = sanitize($_POST['confirmpassword']);
    $gender = isset($_POST['gender']) ? sanitize($_POST['gender']) : '';

    if ($password != $confirmpassword) {
        $_SESSION['not_match'] = "password & confirmpassword not match";
        $isValid = false;
    } else {
        unset($_SESSION['not_match']);
    }

    if (empty($fullname)) {
        $_SESSION['empty_fullname'] = "please fill up fullname";
        $isValid = false;
    } else {
        unset($_SESSION['empty_fullname']);
    }

    if (empty($email)) {
        $_SESSION['empty_email'] = "please fill up email";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['invalid_email'] = "Invalid email format";
        $isValid = false;
    } else {
        unset($_SESSION['empty_email']);
        unset($_SESSION['invalid_email']);
    }

    if (empty($phoneno)) {
        $_SESSION['empty_phoneno'] = "please fill up Phone Number";
        $isValid = false;
    } elseif (!preg_match('/^\d{11}$/', $phoneno)) {
        $_SESSION['invalid_phoneno'] = "Please enter a valid 11-digit phone number";
        $isValid = false;
    } else {
        unset($_SESSION['empty_phoneno']);
    }

    if (empty($password)) {
        $_SESSION['empty_password'] = "please fill up password";
        $isValid = false;
    } else {
        unset($_SESSION['empty_password']);
    }

    if (strlen($password) < 4) {
        $_SESSION['Invalid_password_length'] = "Password length should be at least 4 characters";
        $isValid = false;
    } else {
        unset($_SESSION['Invalid_password_length']);
    }

    if ( !preg_match('/[0-9]/', $password)) {
        $_SESSION['Invalid_password'] = "Password must be a combination of letters and numbers";
        $isValid = false;
    } else {
        unset($_SESSION['Invalid_password']);
    }

    if (empty($confirmpassword)) {
        $_SESSION['empty_confirmpassword'] = "please fill up confirmpassword";
        $isValid = false;
    } else {
        unset($_SESSION['empty_confirmpassword']);
        unset($_SESSION['invalid_phoneno']);
    }

    if (empty($gender)) {
        $_SESSION['empty_gender'] = "Please select your gender";
        $isValid = false;
    } else {
        unset($_SESSION['empty_gender']);
    }

    if ($isValid) {
        $isValid=insert_doctor($fullname, $email, $phoneno, $password, $gender);
        header("Location: ../views/login.php");
        
    } else {
        header("Location: ../views/registration.php");
        
    }
} else {
    echo "Request not valid";
}
?>
