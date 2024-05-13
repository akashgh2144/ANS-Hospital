<?php

require '../model/Data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $isValid = true;

    $admission_ID = sanitize($_POST['admission_ID']);
    $present_status = sanitize($_POST['present_status']);
    $released_date = !empty($_POST['released_date']) ? $_POST['released_date'] : date("Y-m-d");
    $amount = sanitize($_POST['amount']);

    if (empty($admission_ID)  || empty($released_date) || empty($amount)) {
        $isValid = false;
        $_SESSION['billing_error'] = "Please fill out all fields";
    }

    if (!is_numeric($admission_ID) || !is_numeric($amount)) {
        $isValid = false;
        $_SESSION['billing_error'] = "Admission ID and amount must be numeric";
    }

    $_SESSION['admission_ID'] = $admission_ID;
    $_SESSION['released_date'] = $released_date;
    $_SESSION['amount'] = $amount;

    if ($isValid) {
        // Check if the admission ID exists in the database
        $chk = check_id($admission_ID);

        if (!$chk) {
            // ID does not exist in the database
            $isValid = false;
            $_SESSION['billing_error'] = "Admission ID does not exist in the database";
        } else {

             $isValid = true;
            // ID exists, proceed with insertion
            $isInserted = insert_admission_bill($admission_ID, $present_status, $released_date, $amount);

            if ($isInserted) {
                $_SESSION['billing_success'] = "Admission billing added successfully";
                unset($_SESSION['admission_ID'], $_SESSION['released_date'], $_SESSION['amount'], $_SESSION['billing_error']);
            } else {
                $_SESSION['billing_error'] = "Failed to add admission billing";
            }
        }
    }

    header("Location: ../view/BillManagement.php");
    exit();
} else {
    echo "Invalid Request";
}

function sanitize($data) {
    return htmlspecialchars($data);
}

?>
