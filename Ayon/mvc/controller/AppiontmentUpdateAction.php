
<?php

    require '../model/Data.php';
    session_start();
    


if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $isValid = true;
       

        $app_id = sanitize($_POST['appointment_ID']);
        $upname = sanitize($_POST['upname']);
        $updoctor = sanitize($_POST['updoctor']);
        $upage = sanitize($_POST['upage']);
        //$admission=sanitize($_POST['admissiondate']);
        //$relese=sanitize($_POST['releseddate']);
        $upmobile_no = sanitize($_POST['upmobile_no']);
        $upappiontmentdate = !empty($_POST['upappiontmentdate']) ? $_POST['upappiontmentdate'] : date("Y-m-d");

         
         $_SESSION['appointment_ID'] = $app_id;

        $_SESSION['upname'] = $upname;

        $_SESSION['updoctor']=$updoctor;

        $_SESSION['upage']=$upage;

         $_SESSION['upmobile_no']=$upmobile_no;

         $_SESSION['upappiontmentdate']=$upappiontmentdate;


      // $upname,$updoctor,$upage,$upmobile_no,$upappiontmentdate
         

        
        if( empty($app_id) or  empty($upname) or empty($updoctor) or empty($upage) or empty($upmobile_no) or empty($upappiontmentdate)){
             
               $isValid=false;
               
               $_SESSION['upapp_val']="Please fill up the all fileds";

               header("Location: ../view/Appointment.php");


        }


         elseif (!is_numeric( $app_id)) {
            $isValid=false;

            $_SESSION['upapp_val'] = "Invalid Appointment ID";
            

            header("Location: ../view/Appointment.php");
            

            exit; // Ensure script stops execution after redirect
    


    } 



        elseif (!is_numeric( $upmobile_no) || strlen( $upmobile_no) !== 11) {
    
                  $isValid=false;
            $_SESSION['upapp_val'] = "Mobile number must be numeric and exactly 11 digits";
            

            header("Location: ../view/Appointment.php");
            

            exit; // Ensure script stops execution after redirect
    


    } 


    elseif (!is_numeric($upage) || strlen($upage) >2) {
             $isValid=false;

            $_SESSION['upapp_val'] = "Invalid age ";
            

            header("Location: ../view/Appointment.php");
            

            exit; // Ensure script stops execution after redirect
    


    } 







        else{

         
          $isValid=update_appointment($app_id, $upname, $updoctor, $upage, $upmobile_no, $upappiontmentdate);

        
        
          if ($isValid ) {

            
          header("Location: ../view/Appointment.php");
        

           unset($_SESSION['appointment_ID'],$_SESSION['upname'],$_SESSION['upage'],$_SESSION['updoctor'],$_SESSION['upmobile_no'],$_SESSION['upappiontmentdate']);

          $_SESSION['upapp_val']="Appointment data update succesfull";


          
        
       } 

       else{


        header("Location: ../view/Appointment.php");
        

          $_SESSION['upapp_val']="Appointment data update *failed";



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



