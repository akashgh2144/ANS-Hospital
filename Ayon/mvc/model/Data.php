<?php
     
     include 'db_connection.php';



function login($username, $password) {
    global $conn;
    
    $sql = "SELECT * FROM `staff` WHERE `username` = ? AND `password` = ?";
    
    $stmt = $conn->prepare($sql);
    
   
    $stmt->bind_param("ss", $username, $password);
    
  
    $stmt->execute();
    
   
    $result = $stmt->get_result();
    
    
    $num_rows = $result->num_rows;
    
  
    $stmt->close();
    
    
    return $num_rows == 1;
}



       function Registration($username, $fullname, $password, $gender, $email, $mobile, $area, $address) {
       global $conn;
        
    $stmt = $conn->prepare("INSERT INTO `staff`(`username`, `full_name`, `password`, `gender`, `email`, `mobile_no`, `area`, `address`) VALUES (?,?,?,?,?,?,?,?)");


    if ($stmt) {
     
        $stmt->bind_param("ssssssss", $username, $fullname, $password, $gender, $email, $mobile, $area, $address);
        
      
        if ($stmt->execute()) {
            
            return true;
        } else {
           
            return false;
        }
    } else {
        
        return false;
    }
}
   



   function profileView($user){

        

    global $conn;
    
    
    $sql = "SELECT * FROM `staff` WHERE `username` = ?";
    
   
    $stmt = $conn->prepare($sql);
    
   
    $stmt->bind_param("s", $user);
    
    
    $stmt->execute();
    
    
    $result = $stmt->get_result();
    
    
    $userData = $result->fetch_assoc();
    
    
    $stmt->close();
    
    
    return $userData;
}





 function profile_view(){

        global $conn;
        
        $query="select * from AccountStatus";
        $result=mysqli_query($conn, $query);
          
          return $result;





    }




function updateProfile($staffID, $username, $fullName, $gender, $email, $mobile, $area, $address) {
    global $conn;

    // Prepare the SQL statement to update the user's profile including the username
    $sql = "UPDATE `staff` SET `username`=?, `full_name`=?, `gender`=?, `email`=?, `mobile_no`=?, `area`=?, `address`=? WHERE `staff_ID`=?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssssi", $username, $fullName, $gender, $email, $mobile, $area, $address, $staffID);

    // Execute the statement
    if ($stmt->execute()) {
        // Profile updated successfully
        return true;
    } else {
        // Error occurred while updating profile
        return false;
    }
}




function ChangePassword($NewPassword,$CurrentPassword_db,$staffID) {
    global $conn;

    // Prepare the SQL statement to update the user's profile including the username
    $sql = "UPDATE `staff` SET `password` = ? WHERE `password` = ? and `staff_ID` = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssi", $NewPassword,$CurrentPassword_db,$staffID);

    // Execute the statement
    if ($stmt->execute()) {
        // Profile updated successfully
        return true;
    } else {
        // Error occurred while updating profile
        return false;
    }
}


//forget par er code user check kora 
function user_find($username, $email) {
     global $conn;
    // Prepared statement to select records

     $qq="SELECT COUNT(*) as count FROM `staff` WHERE username = ? AND email = ?";
    $stm = $conn->prepare($qq);
    $stm->bind_param("ss", $username, $email);

    // Execute the statement
    $stm->execute();

    // Get the result
    $result = $stm->get_result();

    // Fetch the count
    $row = $result->fetch_assoc();
    $count = $row['count'];

    
    if($count == 1) {


        return true;
    }

    else{
       
       return false;

    }
}




function forget_password($username, $email, $NewPassword) {
    global $conn;
    
    $query = "UPDATE `staff` SET `password` = ? WHERE `username` = ? AND `email` = ?";

    $stmt = $conn->prepare($query);

    $stmt->bind_param("sss", $NewPassword,$username, $email);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

}









function display_account_status($staffID) {
    global $conn;
    
    $query = "SELECT * FROM `account` WHERE staff_ID = ?";
    $stmt = $conn->prepare($query);
    
   
    $stmt->bind_param("i",$staffID);
    
    
    $stmt->execute();
    
    
    $result = $stmt->get_result();
    
    return $result; 


}


function display_attendance($staffID) {
    global $conn;
    
    $query = "SELECT * FROM `attendance` WHERE staff_ID = ?";
    $stmt = $conn->prepare($query);
    
   
    $stmt->bind_param("i",$staffID);
    
    
    $stmt->execute();
    
    
    $result = $stmt->get_result();
    
    return $result; 


}


function display_application($staffID) {
    global $conn;
    
    $query = "SELECT  `reason`, `comments`, `date_for_leave` FROM `leave_applications` WHERE staff_ID = ?";
    $stmt = $conn->prepare($query);
    
   
    $stmt->bind_param("i",$staffID);
    
    
    $stmt->execute();
    
    
    $result = $stmt->get_result();
    
    return $result; 


}





function leave_application_submit($staffID, $reason, $cbox, $date) {
    global $conn;

    $query = "INSERT INTO leave_applications (staff_ID, reason, comments, date_for_leave) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    $stmt->bind_param("isss", $staffID, $reason, $cbox, $date);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}



function check_valid_application($staffID) {
    global $conn;
   
    // Query to check if the logged staff ID has more than 0 entries
    $query_logged_id = "SELECT COUNT(*) AS count FROM leave_applications WHERE staff_ID = ?";

    $stmt_logged_id = mysqli_prepare($conn, $query_logged_id);

    mysqli_stmt_bind_param($stmt_logged_id, "i", $staffID);

    mysqli_stmt_execute($stmt_logged_id);

    $result_logged_id = mysqli_stmt_get_result($stmt_logged_id);

    $row_logged_id = mysqli_fetch_assoc($result_logged_id);

    $logged_id_count = $row_logged_id['count'];

    
    $query_duplicate_ids = "SELECT staff_ID FROM leave_applications GROUP BY staff_ID HAVING COUNT(staff_ID) > 0";

    $stmt_duplicate_ids = mysqli_prepare($conn, $query_duplicate_ids);
    mysqli_stmt_execute($stmt_duplicate_ids);

    $result_duplicate_ids = mysqli_stmt_get_result($stmt_duplicate_ids);
    
    if (mysqli_num_rows($result_duplicate_ids) > 0 && $logged_id_count > 0) {
        $duplicate_ids = array();

        while ($row = mysqli_fetch_assoc($result_duplicate_ids)) {

            $duplicate_ids[] = $row['staff_ID'];
        }
        return true; // Return an array of duplicate staff IDs
    } else {
        return false;
    }
}







function cancel_application($staffID) {

    global $conn;
    $query = "DELETE FROM `leave_applications` WHERE staff_ID = ?";
    
    $stmt = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($stmt, "i", $staffID);
    
    if (mysqli_stmt_execute($stmt)) {
        

        return true;
    } 

    else {

        
        return false;
    }
}


//Admissons er function

function admission_submit($name, $room, $status, $admission) {
    global $conn;

    $query = "INSERT INTO `admission` (patient_name,room_no ,status,admission_date) VALUES (?, ?, ?, ?)";
    $st = $conn->prepare($query);

    if (!$st) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    $st->bind_param("ssss", $name, $room, $status, $admission);

    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
}



function display_admission() {
    global $conn;

    $query = "SELECT * FROM `admission`";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error; // Check for any errors in execution
        $stmt->close();
        return false;
    }

    $result = $stmt->get_result();
    $stmt->close(); // Close the statement after fetching the result

    return $result; // Return the result set
}



function update_admission($admit_id, $pname, $proom, $padmission) {
    global $conn;
    
    $query = "UPDATE `admission` SET `patient_name` = ?, `room_no` = ?, `admission_date` = ? WHERE `admission_ID` = ?";

    $stmt = $conn->prepare($query);

    // Assuming admission_ID is an integer, so use "i" type for the last parameter
    $stmt->bind_param("sssi", $pname, $proom, $padmission, $admit_id);

    if ($stmt->execute()) {

        $affected_rows = $stmt->affected_rows;
        return true;
    } 

    else {

        

            return false;
            
        
    }
}



function delete_patient($id) {
    global $conn;
    
    $query = "DELETE FROM admission WHERE admission_ID = ?";
    $stmt = $conn->prepare($query);
    
    
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
       
        return true;
    } else {
        
        return false;
    }
}


function search_admission($search_query) {
    // Initialize the SQL query
    global $conn;
    $sql = "SELECT * FROM admission WHERE 1 ";

    // Add conditions based on provided search query
    if (!empty($search_query)) {
        $sql .= "AND (patient_name LIKE '%$search_query%' OR admission_ID = '$search_query' OR admission_date = '$search_query') ";
    }

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    return $result;
}




//APPIONTEMT ER FUNCTIONS   insest,delete,view,search,update 5 ta


function appiontment_submit($name, $doctor, $age, $mobile_no,$appiontmentdate) {
    global $conn;

    $query = "INSERT INTO `appiontment` (patient_name,doctor_name, patient_age,mobile_no,appiontment_date) VALUES (?, ?, ?, ?,?)";
    $st = $conn->prepare($query);

    if (!$st) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    $st->bind_param("ssiss", $name, $doctor, $age, $mobile_no,$appiontmentdate);

    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
}

//display

function display_appiontment() {
    global $conn;

    $query = "SELECT * FROM `appiontment`";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error; // Check for any errors in execution
        $stmt->close();
        return false;
    }

    $result = $stmt->get_result();
    $stmt->close(); // Close the statement after fetching the result

    return $result; // Return the result set
}

    
    


    //delete


function delete_appiontment($appid) {
    global $conn;
    
    $query = "DELETE FROM appiontment WHERE appointment_ID = ?";
    $stmt = $conn->prepare($query);
    
    
    $stmt->bind_param("i", $appid);
    
    if ($stmt->execute()) {
       
        return true;
    } else {
        
        return false;
    }
}
   
    
   //search



function search_appiontment($search_query) {
    global $conn;
    $sql = "SELECT * FROM appiontment WHERE 1 ";

    if (!empty($search_query)) {
        // Assuming $search_query is the input from the user
        $search_query = mysqli_real_escape_string($conn, $search_query);
        $sql .= "AND (appointment_ID LIKE '%$search_query%' OR patient_name LIKE '%$search_query%' OR doctor_name LIKE '%$search_query%' OR patient_age = '$search_query' OR mobile_no = '$search_query' OR appiontment_date = '$search_query') ";
    }

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    return $result;
}

    
        //app_id,$upname,$updoctor,$upage,$upmobile_no,$upappiontmentdate




function update_appointment($app_id, $upname, $updoctor, $upage, $upmobile_no, $upappiontmentdate) {
    global $conn;
    
    $query = "UPDATE `appiontment` SET `patient_name`=?, `doctor_name`=?, `patient_age`=?, `mobile_no`=?, `appiontment_date`=? WHERE `appointment_ID`=?";
    
    $stmt = $conn->prepare($query);
    
    // Assuming appointment_ID is an integer, so use "issssi" type for the parameters
    $stmt->bind_param("sssssi", $upname, $updoctor, $upage, $upmobile_no, $upappiontmentdate, $app_id);
    
    if ($stmt->execute()) {
        $affected_rows = $stmt->affected_rows;
        return true;
    } else {
        return false;
    }
}



function display_admission_bill() {
    global $conn;

    $query = "SELECT admission.*, admission_bill.bill_ID, admission_bill.present_status, admission_bill.released_date, admission_bill.amount
              FROM admission
              JOIN admission_bill ON admission.admission_ID = admission_bill.admission_ID";

    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error; // Check for any errors in execution
        $stmt->close();
        return false;
    }

    $result = $stmt->get_result();
    $stmt->close(); // Close the statement after fetching the result

    return $result; // Return the result set
}


function check_id($admission_ID) {
    // Your database connection code
    global $conn;

    // Prepare your SQL statement
    $query = "SELECT admission_ID FROM admission WHERE admission_ID = ?";
    $st = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if (!$st) {
        echo "Error: " . $conn->error; // You can handle the error as you wish
        return false;
    }

    // Bind parameters to the prepared statement
    $st->bind_param("i", $admission_ID);

    // Execute the prepared statement
    if ($st->execute()) {
        // Store the result
        $st->store_result();

        // Check if any row exists
        if ($st->num_rows > 0) {
            return true; // ID exists
        } else {
            return false; // ID does not exist
        }
    } else {
        return false; // Error in executing the statement
    }
}



function insert_admission_bill($admission_ID, $present_status, $released_date, $amount) {
    // Your database connection code
    global $conn;

    // Prepare your SQL statement
    $query = "INSERT INTO admission_bill (admission_ID, present_status, released_date, amount) VALUES (?, ?, ?, ?)";
    $st = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if (!$st) {
        echo "Error: " . $conn->error; // You can handle the error as you wish
        return false;
    }

    // Bind parameters to the prepared statement
    $st->bind_param("isss", $admission_ID, $present_status, $released_date, $amount);

    // Execute the prepared statement
    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
}



function delete_admission_and_related($admission_ID) {
    global $conn;

    // Start a transaction to ensure atomicity
    $conn->begin_transaction();

    try {
        // Delete related records in admission_bill table
        $stmt1 = $conn->prepare("DELETE FROM admission_bill WHERE admission_ID = ?");
        $stmt1->bind_param("i", $admission_ID);
        $stmt1->execute();

        // Delete admission record
        $stmt2 = $conn->prepare("DELETE FROM admission WHERE admission_ID = ?");
        $stmt2->bind_param("i", $admission_ID);
        $stmt2->execute();

        // Commit the transaction if all queries succeed
        $conn->commit();
        return true;
    } catch (Exception $e) {
        // Rollback the transaction if any query fails
        $conn->rollback();
        return false;
    }
}



function update_admission_bill($upadmission_ID, $upreleased_date, $upamount) {
    global $conn;

    // Prepare the SQL statement
    $query = "UPDATE `admission_bill` SET `released_date`=?, `amount`=? WHERE `admission_ID`=?";
    $st = $conn->prepare($query);

    if (!$st) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    // Bind parameters
    $st->bind_param("ssi", $upreleased_date, $upamount, $upadmission_ID);

    // Execute the query
    if ($st->execute()) {
        return true; // Return true if successful
    } else {
        return false; // Return false if unsuccessful
    }
}




function insert_diagnosis($patient_name, $patient_age, $mobile_no, $doctorRef,  $diagnosis, $delivery_date, $fee) {
    // Your database connection code
    global $conn;

    // Prepare your SQL statement
    $query = "INSERT INTO diagnosis (patient_name, patient_age, mobile_no, doc_ref, test_name, delivery_date,test_fee) VALUES (?, ?, ?, ?, ?, ?,?)";
    $st = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if (!$st) {
        echo "Error: " . $conn->error; // You can handle the error as you wish
        return false;
    }

    // Bind parameters to the prepared statement
    $st->bind_param("sissssi", $patient_name, $patient_age, $mobile_no, $doctorRef, $diagnosis, $delivery_date,$fee);

    // Execute the prepared statement
    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
}



function display_diagnosis() {
    global $conn;

    // Prepare your SQL statement
    $query = "SELECT * FROM diagnosis";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if (!$stmt) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    // Execute the prepared statement
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error; // Check for any errors in execution
        $stmt->close();
        return false;
    }

    // Get the result set
    $result = $stmt->get_result();
    
    // Close the statement after fetching the result
    $stmt->close();

    return $result; // Return the result set
}

function update_diagnosis($test_ID, $patient_name, $patient_age, $mobile_no, $doctorRef, $diagnosis, $delivery_date, $fee) {
    global $conn;

    // Prepare the SQL statement
    $query = "UPDATE `diagnosis` SET `patient_name`=?, `patient_age`=?, `mobile_no`=?, `doc_ref`=?, `test_name`=?, `delivery_date`=?, `test_fee`=? WHERE `test_ID`=?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo "Error: " . $conn->error; // Check for any errors
        return false;
    }

    // Bind parameters
    $stmt->bind_param("sssssssi", $patient_name, $patient_age, $mobile_no, $doctorRef, $diagnosis, $delivery_date, $fee, $test_ID);

    // Execute the query
    if ($stmt->execute()) {
        return true; // Return true if successful
    } else {
        return false; // Return false if unsuccessful
    }
}


        
?>