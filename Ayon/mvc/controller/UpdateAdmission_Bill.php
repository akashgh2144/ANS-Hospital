<?php

require '../model/Data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $isValid = true;

    $upadmission_ID = sanitize($_POST['up_admission_ID']);

    $upreleased_date = !empty($_POST['up_released_date']) ? $_POST['up_released_date'] : date("Y-m-d");
    $upamount = sanitize($_POST['up_amount']);

    if ( empty($upreleased_date) || empty($upamount)) {
        $isValid = false;
        $_SESSION['update_billing_error'] = "Please fill out all fields";
        header("Location: ../view/updateAdmissionBill.php");

    }

    if ( !is_numeric($upamount)) {
        $isValid = false;
        $_SESSION['update_billing_error'] = " amount must be numeric";
                         header("Location: ../view/updateAdmissionBill.php");

    }

   
    if ($isValid) {
        // Check if the admission ID exists in the database

            $isValid = true;
            // ID exists, proceed with insertion
            $isUpdated = update_admission_bill($upadmission_ID, $upreleased_date, $upamount);

            if ($isUpdated) {
                $_SESSION['update_billing_error'] = "Admission billing updated successfully";
               

                 header("Location: ../view/updateAdmissionBill.php");
            } 

            else {
                $_SESSION['update_billing_error'] = "Failed to update admission billing";
                header("Location: ../view/updateAdmissionBill.php");

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
