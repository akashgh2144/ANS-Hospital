<?php

require '../model/Data.php';
$isDeleted = true;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['delete'])) {
        $appid = $_POST['appointment_ID']; 

        $isDeleted = delete_appiontment($appid);

        

        header("Location: ../view/Appointment.php");
           
         
    } 
} 

else {
    echo "Invalid request";
}

?>
