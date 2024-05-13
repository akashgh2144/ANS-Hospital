<?php

require '../model/Data.php';
session_start();
$userData = profileView($_SESSION['user']);


if ($userData) {
  
    $staffID = $userData['staff_ID'];

     $isValid = cancel_application($staffID);

    
    
} 

  $isValid=true;

 $isValid = cancel_application($userData['staff_ID']);

  if($isValid ){


  	$_SESSION['empty_box'] = "Your Application has been Cancelled";
       header("Location: ../view/checkattendance.php");
       exit(); 




  }

  else{

    $_SESSION['empty_box'] = "You have no Application ";

      header("Location: ../view/checkattendance.php");
       exit();
  }








?>