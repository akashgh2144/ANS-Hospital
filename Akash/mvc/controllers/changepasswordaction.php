<?php
session_start();
require '../model/data.php';



if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $valid=true;


//var

   $mobile=sanitize($_POST['phoneno']);

   $newpassword=sanitize($_POST['newpassword']);


   if(empty($mobile) || empty($newpassword)){



    $_SESSION['empty']="All the fileds must be filled up*";

    
            
    header("Location: ../views/changepassword.php");

    $valid=false;



   }

   elseif($valid=change_password($mobile,$newpassword)){
        
    


    $_SESSION['empty']="Password changed successfully*";

    header("Location: ../views/changepassword.php");




   }


   else{

    $_SESSION['empty']="Password changed failed *";

    header("Location: ../views/changepassword.php");

   }








    
} 



else {
    echo "Invalid password";
}

function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}
?>
