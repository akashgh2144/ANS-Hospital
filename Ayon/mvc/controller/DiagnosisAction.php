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



    $patient_name = sanitize($_POST["test_patient_name"]);
    $patient_age = sanitize($_POST["test_patient_age"]);
    $mobile_no = sanitize($_POST["test_mobile_no"]);
    $doctorRef = sanitize($_POST["test_doctorRef"]);
    $diagnosis = sanitize($_POST["diagnosis"]);
    $delivery_date = sanitize(!empty($_POST['delivery_date']) ? $_POST['delivery_date'] : date("Y-m-d"));

    $fee = sanitize($_POST["fee"]);

// Store form field values in session variables
    $_SESSION['test_patient_name'] = $patient_name;
    $_SESSION['test_patient_age'] = $patient_age;
    $_SESSION['test_mobile_no'] = $mobile_no;
    $_SESSION['test_doctorRef'] = $doctorRef;
    $_SESSION['diagnosis'] = $diagnosis;
    $_SESSION['delivery_date'] = $delivery_date;

    $_SESSION['fee'] =  $fee ;


    $isValid=true;
    // Validate form fields
    if (empty($patient_name) || empty($patient_age) || empty($mobile_no) || empty($doctorRef)|| empty($fee) || empty($diagnosis) || empty($delivery_date)) {


        $_SESSION['test_error'] = "Please fill in all the fields.";

            $isValid=false;

    }

    // Validate mobile number
    if (!is_numeric($mobile_no) || strlen($mobile_no) != 11 ) {
        $_SESSION['test_error'] = "Mobile number must be numeric and exactly 11 digits.";
        
        $isValid=false;

    }

    if (!is_numeric($fee)  ) {
        $_SESSION['test_error'] = "Test fee must be numeric ";
        
        $isValid=false;

    }



    // Validate age
    if (!is_numeric($patient_age) || strlen($patient_age) >3 ) {
        $_SESSION['test_error'] = "Age must be numeric and Valid";
     $isValid=false;

    }

    if ($isValid) {

        //methdo call


       $isValid = insert_diagnosis($patient_name, $patient_age, $mobile_no, $doctorRef, $diagnosis, $delivery_date,$fee);

           if($isValid){

             $_SESSION['test_error'] = "Insert successfull";

                 header("Location: ../view/Diagnosis.php");


           }
        // code...
    }

    else{

    header("Location: ../view/Diagnosis.php");

    }

  
} 


else {
    
    echo "Invalid Request";
    
}


?>
