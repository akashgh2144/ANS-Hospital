
<?php
session_start();

 require '../model/Data.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
   $isValid = true;
   
        $firstname = sanitize($_POST['fname']);
        $lastname = sanitize($_POST['lname']);
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $confirmpassword = sanitize($_POST['confirmpassword']);
        //$gender = sanitize($_POST['gender']);
        $email = sanitize($_POST['email']);
        $mobile = sanitize($_POST['mobile']);
        $region = sanitize($_POST['region']);
        $city = sanitize($_POST['city']);
        $address = sanitize($_POST['address']);
       // $profilePic = $_FILES['profile'];

        $_SESSION['fname']=$firstname;
        $_SESSION['lname']=$lastname;
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $_SESSION['confirmpassword']=$confirmpassword;
        $_SESSION['email']=$email;
        $_SESSION['mobile']=$mobile;
        $_SESSION['region']=$region;
        $_SESSION['city']=$city;
        $_SESSION['address']=$address;


    
         



        
        



        if (isset($_POST['gender'])) {
        $gender = sanitize($_POST['gender']);
        } 

        else {
            $_SESSION['empty_error_gender'] ="Please select your gender.";
            $isValid = false;
        }





        $fullname = $firstname . ' ' . $lastname;
        $area=$region . ',' . $city;
         

         if ($password !=$confirmpassword) {
             
             $_SESSION['not_match']="Password and confirm does not match";
             $isValid=false;
         }

         else {
                    
                  unset($_SESSION['not_match']);
                   
                   
                  
       }
      


     

    if (empty($firstname)) {
            $_SESSION['empty_error_firstname'] ="Please enter your firstname.";

           
            $isValid = false;


        }

         else {
                    
                  unset($_SESSION['empty_error_firstname']);
                   
                   
                  
       }

       if (empty($lastname)) {

             $_SESSION['empty_error_lastname'] ="Please enter your lastname.";

            $isValid = false;

        }

         else {
                    
                  unset($_SESSION['empty_error_lastname']);
                 
                  
       }


       if (empty($username)) {
        $_SESSION['empty_error_username'] ="Please enter your username.";
        $isValid = false;

    }

     else {
                
              unset($_SESSION['empty_error_username']);
               
               
   }


   if (empty($password)) {
        $_SESSION['empty_error_password'] ="Please enter your password.";
        $isValid = false;

    }

     else {
                
              unset($_SESSION['empty_error_password']);
             
               
   }



    if (strlen($password) < 6) {
        
        $isValid=false;

        $_SESSION['Invalid_password_length']="Password length at least 6";
    }

    else{

            unset($_SESSION['Invalid_password_length']);
    }

    // Check if password contains at least one letter and one number
    if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {

     $_SESSION['Invalid_password_format']="Password must be combination of letter and number ";

        $isValid=false;
    }

    else{

        unset($_SESSION['Invalid_password_format']);
    }








   if (empty($confirmpassword)) {
        $_SESSION['empty_error_confirmpassword'] ="Please enter your confirm password.";
        $isValid = false;

    }

     else {
                
              unset($_SESSION['empty_error_confirmpassword']);
              
   }


    if (empty($gender)) {
            $_SESSION['empty_error_gender'] ="Please select your gender.";
            //$_SESSION['gender'] ='';
            $isValid = false;

        }

         else {
                    
                  unset($_SESSION['empty_error_gender']);
                  
                  
       }


        if (empty($email)) {
            $_SESSION['empty_error_email'] ="Please enter your email address.";
            $isValid = false;

        }

         else {
                    
                  unset($_SESSION['empty_error_email']);

                  
                  
       }


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $_SESSION['invalid_email']= "Invalid email format ";
           

           $isValid=false;

        } 

        else{
          
          unset($_SESSION['invalid_email']);

        }



     
        

        if (empty($mobile)) {
            $_SESSION['empty_error_mobile'] ="Please enter your mobile number.";
            $isValid = false;

        }

         else {
                    
                  unset($_SESSION['empty_error_mobile']);
                 
                  
       }



  if (empty($address)) {
            $_SESSION['empty_error_address'] ="Please enter your full address .";
            $isValid = false;

        }

         else {
                    
                  unset($_SESSION['empty_error_address']);
                   

                  
       }

       


    
    
    $s=(string)$mobile;//mobile number validation  must be numeric and length is exact 11
      
      if (!is_numeric($mobile) || strlen($s)!=11 ) {
        
        $_SESSION['invalid_number']="Invalid Mobile number ";
         $isValid = false;
      }
     else{
          
          unset($_SESSION['invalid_number']);

        }





       

    $val=false;
    
    if ($isValid ) {

        $isValid=Registration($username, $fullname, $password, $gender, $email, $mobile, $area,$address);
      
        header("Location: ../view/UserLogin.php");

        //$val=true;

         unset(
        $_SESSION['fname'],
        $_SESSION['lname'],
        $_SESSION['username'],
        $_SESSION['password'],
        $_SESSION['confirmpassword'],
        $_SESSION['email'],
        $_SESSION['mobile'],
        $_SESSION['region'],
        $_SESSION['city'],
        $_SESSION['address']
    );
       

        exit();
        
    } 

    else {
        
       header("Location: ../view/Registration.php");
       //unset($_SESSION['error_firstname']);        
    }

  }
    

 else{

     echo "Invalid Request";
      
 }




 


 function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
  }
?>



