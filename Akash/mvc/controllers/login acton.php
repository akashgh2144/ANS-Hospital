<?php

session_start();
require '../model/data.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $isValid = true;
    $phone = sanitize($_POST['phoneno']);
    $password = sanitize($_POST['password']);

    if(empty($phone) || empty($password)){
        $isValid=false;
        $_SESSION['error_login']="Please fill up all fields";
        header("Location: ../views/login.php");
        exit();
    }
    else{
        $isValid=login($phone,$password);
        if ($isValid ) {
            $_SESSION['logged']=true;
            $_SESSION['user']=$phone;
            header("Location: ../views/dashbord.php");
            exit();
        } 
        else {

            $_SESSION['error_login']="Username or password incorrect";
            header("Location: ../views/login.php");
            exit();
        }
    }
}
else{
    $_SESSION['error_login']="Invalid Request";
    header("Location: ../views/login.php"); 
    exit();
}

function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}
?>
