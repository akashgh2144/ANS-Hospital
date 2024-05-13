
<?php

    require '../model/Data.php';
    session_start();
    


if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $isValid = true;
       
        
        $name = sanitize($_POST['name']);
        $room= sanitize($_POST['room']);
        $status= sanitize($_POST['status']);
        //$admission=sanitize($_POST['admissiondate']);
        //$relese=sanitize($_POST['releseddate']);

        $admission = !empty($_POST['admissiondate']) ? $_POST['admissiondate'] : date("Y-m-d");



        $_SESSION['name'] = $name;

        $_SESSION['p_room']=$room;

        $_SESSION['admision_d']=$admission;

       
         

        
        if(empty($name) or empty($admission) or empty($room) or empty($status)){
             
               $isValid=false;
               
               $_SESSION['admit_val']="Please fill up the all fileds";

               header("Location: ../view/Admission.php");


        }

        else{

         
           $isValid=admission_submit($name, $room, $status, $admission);

        
        
          if ($isValid ) {

            
          header("Location: ../view/Admission.php");
        

           unset($_SESSION['name'],$_SESSION['admision_d'],$_SESSION['relesed_d'],$_SESSION['empty_error']);

          $_SESSION['admit_val']="Patient Admited succesfully";


          
        
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



