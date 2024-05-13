<?php
include'database_connection.php';
//session_start();


function login($phone, $password){
    global $data; // Change $conn to $data
    $sql = "SELECT * FROM `doctor` WHERE `mobile`=? AND `password`=?";
    $stmt = $data->prepare($sql);

    if($stmt === false) {
        die('Error: ' . $data->error);  // Output any SQL error
    }

    $stmt->bind_param("ss", $phone, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $n = $result->num_rows;

    if($n > 0){
        return true; // If the query returns any rows, return true
    } else {
        return false; // If the query returns no rows, return false
    }
}


function Registration($fullname, $password,$email, $phoneno,$gender) {
    global $conn;    
 $stmt = $conn->prepare("INSERT INTO `doctor`( `full_name`, `password`,  `email`, `mobile`,`gender`) VALUES (?,?,?,?,?)");

 if ($stmt) {
     
     $stmt->bind_param("siuu",  $fullname, $password,  $email,$phoneno,$gender);
     if ($stmt->execute()) {
       
         return true;
     } else {
         
         return false;
     }
 } else {
    
     return false;
 }
}


function change_password($mobile,$newpassword){
    global $data;
    $sql = "UPDATE `doctor` SET `password` = ? WHERE `mobile` = ?";
    $stmt = $data->prepare($sql);

    if($stmt === false) {
        die('Error: ' . $data->error);
    }

    $stmt->bind_param("ss", $newpassword, $mobile);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        return true; // If password updated successfully
    } else {
        return false; // If password update failed
    }
}


function patientlist(){
    global $data;
    $sql = "SELECT * FROM `patient`";
    $result = $data->query($sql);

    if($result->num_rows > 0){
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as associative array
    } else {
        return []; // Return an empty array if no patients found
    }
}

function salarylist(){
    global $data;
    $sql = "SELECT * FROM `salary`";
    $result = $data->query($sql);

    if($result->num_rows > 0){
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as associative array
    } else {
        return []; // Return an empty array if no patients found
    }
}

function fees_followup(){
    global $data;
    $sql = "SELECT * FROM `fee_followup`";
    $result = $data->query($sql);

    if($result->num_rows > 0){
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as associative array
    } else {
        return []; // Return an empty array if no patients found
    }
}



function spatient_record(){
    global $data;
    $sql = "SELECT * FROM `patient_record`";
    $result = $data->query($sql);

    if($result->num_rows > 0){
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as associative array
    } else {
        return []; // Return an empty array if no patients found
    }
}






function profile($user) {
    global $data;

    // SQL query to fetch user data
    $sql = "SELECT * FROM `doctor` WHERE mobile = ?";
    
    $stmt = $data->prepare($sql);

    if (!$stmt) {
        return null; // Return null if preparation fails
    }

    // Bind parameter
    $stmt->bind_param("i", $user);

    // Execute statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch result as associative array
    $userData = $result->fetch_assoc();

    // Close statement
    $stmt->close();

    return $userData;
}


function update($fullname, $email, $phoneno, $password, $gender, $doctor_ID) {
    global $data;

    // SQL query to update user profile
    $sql = "UPDATE `doctor` SET doctorID =?,fullname = ?, email = ?, mobile = ?, password = ?, gender = ? WHERE mobile = ?";

    $stmt = $data->prepare($sql);

    // Check if the preparation of the statement was successful
    if (!$stmt) {
        return false; // If not, return false
    }

    // Bind parameters
    $stmt->bind_param("sssssi", $doctor_ID, $fullname, $email, $phoneno, $password, $gender );

    // Execute statement
    if ($stmt->execute()) {
        return true; // If execution succeeds, return true
    } else {
        return false; // If execution fails, return false
    }
}

function getDoctorPassword($email){
    // Assuming $data is your mysqli connection object
    global $data;

    // SQL query to select the doctor's password with the provided email
    $sql = "SELECT password FROM `doctor` WHERE email = ?";

    // Prepare the statement
    $stmt = $data->prepare($sql);

    // Bind parameters
    $stmt->bind_param("s", $email);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch the first row
    $row = $result->fetch_assoc();

    // Close statement
    $stmt->close();

    // Return the password value
    return $row['password'] ?? null; // Return the password if found, otherwise return null
}



?>