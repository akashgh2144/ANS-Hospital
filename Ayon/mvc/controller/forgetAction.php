<?php
session_start();
require '../model/Data.php';




if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;

    $username = sanitize($_POST['username']);

    $email = sanitize($_POST['email']);

    $NewPassword= sanitize($_POST['newpassword']);

    $_SESSION['username_f']=$username;

    $_SESSION['email_f']=$email;

    $_SESSION['newpassword_f']=$NewPassword;






    if (empty($username) || empty($email) || empty($NewPassword)) {
        $_SESSION['error_empty'] = "Please fill all the fields";
        $flag = false;
    }

    else{

        unset($_SESSION['error_empty']);
    }

    if (strlen($NewPassword) < 6) {
        $_SESSION['Invalid_password_length'] = "Password length should be at least 6 characters";
        $flag = false;
    }

    else{


            unset($_SESSION['Invalid_password_length']);

    }

    if (!preg_match('/[A-Za-z]/', $NewPassword) || !preg_match('/[0-9]/', $NewPassword)) {
        $_SESSION['Invalid_password_format'] = "Password must contain at least one letter and one number";
        $flag = false;
    }

    else{

        unset($_SESSION['Invalid_password_format']);
    }



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $_SESSION['invalid_email']= "Invalid email format ";
           

           $flag=false;

        } 

        else{
          
          unset($_SESSION['invalid_email']);

        }

      $f=true;
     $f=user_find($username, $email);


        if (!$f) {
           
                   $_SESSION['error_empty']="Username or email incorrect";

                    header("Location: ../view/forgetPassword.php");     



        }
        else{



              if ($flag) {

                $flag=forget_password($username,$email,$NewPassword);
                

                if ($flag) {
                    header("Location: ../view/forgetPassword.php");     

                    $_SESSION['reset']= "Your Password Reset successfully ";

                    unset($_SESSION['username'],$_SESSION['email'],$_SESSION['newpassword'],);
                    exit();
                } 


            } else {

                header("Location: ../view/forgetPassword.php");
                exit();
            }





        }





  

  
  





} 

else {
    echo "Invalid Request";
}

function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}
?>


