<?php

require '../model/data.php'; 

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
        echo "Email : " . $email; // Debugging statement to check if email is received

        echo"<br>";
        $doctorPassword = getDoctorPassword($email);

        if ($doctorPassword !== null) {
            echo "Doctor's password: " . $doctorPassword;
        } else {
            echo "Doctor password not found!";
        }
    } else {
        echo "Email is not set or empty!";
    }
}
?>
