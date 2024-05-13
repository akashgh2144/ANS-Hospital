
<?php

    require '../model/Data.php';
    session_start();
    


if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $isValid = true;
       
        
        $name = sanitize($_POST['aname']);
        $doctor = sanitize($_POST['doctor']);
        $age = sanitize($_POST['age']);
        //$admission=sanitize($_POST['admissiondate']);
        //$relese=sanitize($_POST['releseddate']);
        $mobile_no = sanitize($_POST['mobile_no']);
        $appiontmentdate = !empty($_POST['appiontmentdate']) ? $_POST['appiontmentdate'] : date("Y-m-d");



        $_SESSION['aname'] = $name;

        $_SESSION['doctor']=$doctor;

        $_SESSION['age']=$age;

         $_SESSION['mobile_no']=$mobile_no;

         $_SESSION['appiontmentdate']=$appiontmentdate;


       
         

        
        if(empty($name) or empty($doctor) or empty($age) or empty($mobile_no) or empty($appiontmentdate)  ){
             
               $isValid=false;
               
               $_SESSION['app_val']="Please fill up the all fileds";

               header("Location: ../view/Appointment.php");


        }



        elseif (!is_numeric( $mobile_no) || strlen( $mobile_no) !== 11) {
    

            $_SESSION['app_val'] = "Mobile number must be numeric and exactly 11 digits";
            

            header("Location: ../view/Appointment.php");
            

            exit; // Ensure script stops execution after redirect
    


    } 


    elseif (!is_numeric($age) || strlen($age) >2) {
    

            $_SESSION['app_val'] = "Invalid age ";
            

            header("Location: ../view/Appointment.php");
            

            exit; // Ensure script stops execution after redirect
    


    } 







        else{

         
          $isValid=appiontment_submit($name, $doctor, $age, $mobile_no,$appiontmentdate);

        
        
          if ($isValid ) {

            
          header("Location: ../view/Appointment.php");
        

           unset($_SESSION['aname'],$_SESSION['age'],$_SESSION['doctor'],$_SESSION['mobile_no'],$_SESSION['appiontmentdate']);

          $_SESSION['app_val']="Patient Appointment insert succesfull";


          
        
       } 
       


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



