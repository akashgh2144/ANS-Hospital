<?php
session_start();

require '../model/data.php';

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch user data
    $userData = update($_SESSION['user']);
    
    if ($userData) {
        // Extract user data
        $doctor_ID = $userData['doctorID'];
        $fullName = $userData['fullname'];
        $email = $userData['email'];
        $mobile = $userData['mobile'];
        $password = $userData['password'];
        $gender = $userData['gender'];
    }


    if (empty($doctor_ID)) {
      $_SESSION['empty_error_doctor_ID'] ="Please enter your Doctor id.";
    
      $isValid = false;

  }

   else {
              
     unset($_SESSION['empty_error_doctor_ID']);                                
 }


    if (empty($firstname)) {
      $_SESSION['empty_error_fullname'] ="Please enter your fullname.";
    
      $isValid = false;

  }

   else {
              
     unset($_SESSION['empty_error_fullname']);                                
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



if (empty($gender)) {
  $_SESSION['empty_gender'] = "Please select your gender";
  $isValid = false;
} else {
  unset($_SESSION['empty_gender']);
}


if ($isValid) {
  $isValid=update( $doctor_ID,$fullname, $email, $phoneno, $password, $gender);
  header("Location:../views/dashbord.php ");
  
} else {
  header("Location:../views/updateprofile ");
  
}
}
else {
echo "Request not valid";
}







?>
