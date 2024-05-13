<?php

require '../model/Data.php';
session_start();

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();


}



$userData = profileView($_SESSION['user']);

if ($userData) {
    $staffID = $userData['staff_ID'];
}



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $isValid = true;
    
    $cbox = sanitize($_POST['cbox']);
    $reason = sanitize($_POST['reason']);
    

    $date = !empty($_POST['date']) ? $_POST['date'] : date("Y-m-d");


            if (empty($cbox) || empty($date)) {
                
                
                $isValid = false;
                
                $_SESSION['empty_box'] = "Please fill up the textarea and date";
                header("Location: ../view/checkattendance.php");
                exit(); 


            }

            if ($isValid=check_valid_application($staffID)) {

                $_SESSION['empty_box'] = "You have already applied";

                header("Location: ../view/checkattendance.php");
                exit(); 



                }



            else{


             $isValid = leave_application_submit($staffID, $reason, $cbox, $date);



            if ($isValid) {
                $_SESSION['empty_box'] = "Application Submitted";
                header("Location: ../view/checkattendance.php");
                exit(); 
            } 


            }





    
} else {
    echo "Invalid Request";
}



function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}

?>
