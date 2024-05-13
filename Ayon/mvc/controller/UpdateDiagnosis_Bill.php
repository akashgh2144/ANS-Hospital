<?php
session_start();
require '../model/Data.php';

// Check if the user is logged in
if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}

// Function to sanitize user input
function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}









// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $test_ID=sanitize($_POST["up_test_ID"]);
    $patient_name = sanitize($_POST["upatient_name"]);
    $patient_age = sanitize($_POST["upatient_age"]);
    $mobile_no = sanitize($_POST["umobile_no"]);
    $doctorRef = sanitize($_POST["udoc_ref"]);
    $diagnosis = sanitize($_POST["udiagnosis"]);
    $delivery_date = sanitize(!empty($_POST['udelivery_date']) ? $_POST['udelivery_date'] : date("Y-m-d"));

    $fee = sanitize($_POST["utest_fee"]);

// 


    $isValid=true;
    // Validate form fields
    if (empty($patient_name) || empty($patient_age) || empty($mobile_no) || empty($doctorRef)|| empty($fee) || empty($diagnosis) || empty($delivery_date)) {


        $_SESSION['update_error'] = "Please fill in all the fields.";

            $isValid=false;

    }

    // Validate mobile number
    if (!is_numeric($mobile_no) || strlen($mobile_no) != 11 ) {
        $_SESSION['update_error'] = "Mobile number must be numeric and exactly 11 digits.";
        
        $isValid=false;

    }

    if (!is_numeric($fee)  ) {
        $_SESSION['update_error'] = "Test fee must be numeric ";
        
        $isValid=false;

    }



    // Validate age
    if (!is_numeric($patient_age) || strlen($patient_age) >3 ) {
        $_SESSION['update_error'] = "Age must be numeric and Valid";
     $isValid=false;

    }

    if ($isValid) {

        //methdo call


       $isValid = update_diagnosis($test_ID, $patient_name, $patient_age, $mobile_no, $doctorRef, $diagnosis, $delivery_date, $fee);

           if($isValid){

             $_SESSION['update_error'] = "data Update successfull";

                 header("Location: ../view/updateDiagnosisBill.php");


           }
        // code...
    }

    else{

    header("Location: ../view/updateDiagnosisBill.php");

    }

  
} 


else {
    
    echo "Invalid Request";
    
}


?>
