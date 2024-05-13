
<?php
session_start();

 require '../model/Data.php';



$userData = profileView($_SESSION['user']);

// Check if the user data exists
if ($userData) {
    
    $staffID=$username = $userData['staff_ID'];
    
} 

echo $staffID;








if ($_SERVER['REQUEST_METHOD'] === "POST") {
   $isValid = true;
   
        $fullName = sanitize($_POST['fname']);
        

        $username = sanitize($_POST['uname']);
        $gender = sanitize($_POST['gender']);
        $email = sanitize($_POST['email']);
        $mobile = sanitize($_POST['mobile']);
        $area = sanitize($_POST['area']);
        $address = sanitize($_POST['address']);
        

      
        
         

         

     

    if (empty($fullName)) {
            $_SESSION['empty_error_firstname'] ="Please enter your firstname.";

           
            $isValid = false;


        }

         else {
                    
                  unset($_SESSION['empty_error_firstname']);
                   
                   
                  
       }
      


        if (!is_string($fullName)) {

            $_SESSION['empty_error_firstname'] ="Please enter correct name";

           
            $isValid = false;


        }

         else {
                    
                  unset($_SESSION['empty_error_firstname']);
                   
                   
                  
       }



       


       if (empty($username)) {
        $_SESSION['empty_error_username'] ="Please enter your username.";
        $isValid = false;

    }

     else {
                
              unset($_SESSION['empty_error_username']);
               
               
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






        if (empty($area)) {
            $_SESSION['empty_error_area'] ="Please enter your area";
            $isValid = false;

        }

         else {
                    
                  unset($_SESSION['empty_error_area']);
                          
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

//male female

if (!in_array($gender, array('male', 'female'))) {
    $_SESSION['empty_error_gender'] = "Invalid gender input";
    $isValid = false;
} else {
    unset($_SESSION['empty_error_gender']);
}




       

    
    
    if ($isValid ) {

        $isValid=updateProfile($staffID, $username, $fullName, $gender, $email, $mobile, $area, $address);
      
        //header("Location: ../controller/LogoutAction.php");

       // header("Location: ../controller/LogoutAction.php");

            header("Location: ../view/UpdateProfile.php");

             $_SESSION['empty_error_address'] ="**Profile Updated successfully**";

        exit();
        
    }

    else{

         header("Location: ../view/UpdateProfile.php");

         $_SESSION['empty_error_address'] ="**Profile Updated Failed**";

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



