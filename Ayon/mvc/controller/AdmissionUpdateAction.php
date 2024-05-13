<?php
require '../model/Data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $check = true;
    $pname = sanitize($_POST['pname']);
    $proom = sanitize($_POST['proom']);
    $pstatus = sanitize($_POST['pstatus']);
    $admit_id = sanitize($_POST['id']);
    $padmission = !empty($_POST['padmissiondate']) ? $_POST['padmissiondate'] : date("Y-m-d");


    $_SESSION['id'] = $admit_id;
    $_SESSION['pname'] = $pname;
    $_SESSION['p_room_p'] = $proom;
    $_SESSION['padmision_d'] = $padmission;

    if (!is_numeric($admit_id)) {
        $_SESSION['p_admit_val'] = "Admission id must be numeric";
        header("Location: ../view/Admission.php");
        $check = false;
        exit; 
    }

    

    if (empty($pname) || empty($padmission) || empty($proom) || empty($pstatus) || empty($admit_id)) {
        $check = false;
        $_SESSION['p_admit_val'] = "Please fill up all fields";
        header("Location: ../view/Admission.php");
        exit; // Stop further execution
    }

   else{


   $cc=true;

    if ($check) {
        // code...

       $cc = update_admission($admit_id, $pname, $proom, $padmission);

         if ($cc) {

        header("Location: ../view/Admission.php");

        $_SESSION['p_admit_val'] = "Data updated successfully";

        unset($_SESSION['pname'], $_SESSION['p_room_p'], $_SESSION['id'], $_SESSION['padmision_d']);


        
    } 

    else {
        $_SESSION['failed_update'] = "Data update failed";



    }




    }


     } 

 }


else {
    echo "Invalid Request";
}

function sanitize($data) {
    return htmlspecialchars($data);
}
?>
