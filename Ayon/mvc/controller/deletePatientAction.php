<?php

require '../model/Data.php';
$isDeleted = true;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['delete'])) {
        $admission_ID = $_POST['admission_ID']; 

        $isDeleted = delete_admission_and_related($admission_ID);

        

        header("Location: ../view/Admission.php");
           
         
    } 
} 

else {
    echo "Invalid request";
}

?>
