
<?php

    require '../model/Data.php';
    session_start();
    


if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $isValid = true;
       
        
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);

        $_SESSION['username_l'] = $username;

        $_SESSION['password_l']=$password;

        
        if(empty($username) or empty($password)){
             
               $isValid=false;
               
               $_SESSION['error_login']="Please fill up the all fileds";

               header("Location: ../view/UserLogin.php");


        }

        else{

         
           

         $isValid=login($username,$password);
        
          if ($isValid ) {

            

           $_SESSION['LoggedIn']=true;
           $_SESSION['user']=$username;
           header("Location: ../view/Dashboard.php");

           unset($_SESSION['username'],$_SESSION['password'],$_SESSION['error_login'],);

           exit();
        
       } 
       else {

           
         
         $_SESSION['error_login']="Username or password incorrect";

         


       }


        }
         
    header("Location: ../view/UserLogin.php");



}


         else{

             echo "Invalid Request";
             
         }
 


 function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
  }
?>



