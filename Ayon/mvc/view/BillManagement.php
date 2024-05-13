
<?php
session_start();
require '../model/Data.php';

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}


$result = display_admission_bill();

$results = display_diagnosis();



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing ANS Hospital</title>

    <?php

            include('header.php');
             include('nav.php');

            ?>


    <style>
        

        .container {
            width: 100%;
            background-color: white;
        }

        .left-div {
            width:15%; /* Adjusted width */
            display: inline-block;
            vertical-align: top;
        }


         .right-div {
            width:85%; /* Adjusted width */
            display: inline-block;
            vertical-align: top;
        }

        
    

    
    

        #tb {
    width: 60%;
    border-collapse: collapse;
    margin-top:0px ;

    margin-right: 0px;


}

#tb th, #tb td {
    border: 1px solid;
    text-align: left;
    padding: 5px;
}

#tb th {
    background-color: skyblue;
}






 input[type=text] {
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Larger text font */
            padding: 2px;
            box-sizing: border-box;
            border: 2px solid black;
        }

        input[type=date] {
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Larger text font */
            padding: 3px;
            box-sizing: border-box;
            border: 2px solid black;
        }

         select {
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Larger text font */
            padding: 3px;
            box-sizing: border-box;
            border: 2px solid black;
        }

       

        label {
            font-size: 20px; /* Set font size to 16px */
            font-weight: bold; /* Make the font bold */
        }


       


fieldset{

    border:5px solid green;



}
                
legend{

    font-size: 20px; /* Set font size to 16px */
    font-weight: bold;




}

a{

font-size: 16px;

 /* Set font size to 16px */
    


}
a:hover {
  background-color: yellow;
}


select:hover {
    
    background-color: lightyellow;
   
}
 
input:hover {
    
    background-color: lightyellow;
   
}

#insert{


   margin-left: 400px; 
   margin-bottom: 85px; 
   background-color:skyblue; 
   border: 4px solid;

   height: 600%;
   width: 50%;
}


#update{


   margin-left: 100px; 
   margin-bottom: 60px; 
   background-color:skyblue; 
   border: 4px solid;

   height: 100%;
   width: 80%;
}

#searchbtn{


   
  color:black; 
  background-color:lightgreen ;
   border-radius: 5px ;
    margin-left: 2px;
    padding: 5px;

    width: 5%;

}


h4{

    color: blue;
}


    </style>
   
<script type="text/javascript  " src="js/AdmissionBillingValidation.js"></script>
</head>
<body>

    <div class="container">
    <div class="left-div">
        <?php include('sidebar.php'); ?>
    </div><div class="right-div">

    

<form action="../controller/InsertAdmission_bill.php" method="POST" novalidate onsubmit="return AdmissionBillValidate();">

   <br>

   <table>
         
         <tr>
              <td>
                <fieldset id="insert">
        <legend>Insert Admission - Bill:</legend>

        <table>

   


            <tr>
                <td><br></td>
            </tr>

            <tr>

                <td><label for="admission_ID"> ID:</label></td>
                <td>: <input id="admission_ID" name="admission_ID" type="text" value="<?php echo isset($_SESSION['admission_ID']) ? $_SESSION['admission_ID'] : ''; ?>"></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td><label for="present_status">Present Status:</label></td>
                <td>: <input readonly id="present_status" name="present_status" type="text" value="Released"></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td><label for="released_date">Released Date:</label></td>
                <td>: <input id="released_date" name="released_date" type="date" value="<?php echo isset($_SESSION['released_date']) ? $_SESSION['released_date'] : ''; ?>" ></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td><label for="amount">Amount:</label></td>
                <td>: <input id="amount" name="amount" type="text" value="<?php echo isset($_SESSION['amount']) ? $_SESSION['amount'] : ''; ?>"></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input style="background-color:#333; color:white; width:150px; height:25px; border-radius:12px; border:1px solid;" type="submit" value="Insert">
                    <button style="background-color:lightyellow; width:100px; height:25px; border-radius:12px; border:1px solid;" onclick="window.location.href='../view/Dashboard.php'; return false;">Back</button>
                </td>
            </tr>




            <tr>
                <td></td>
                <td>
                    <h4 style="color:crimson;">
                        <?php echo isset($_SESSION['billing_error']) ? $_SESSION['billing_error'] : ''; ?>

                    


                    </h4>
                    
                    
                </td>
            </tr>

        </table>



    </fieldset>
                  


              </td>

         </tr>


   </table>
    

</form>








<form method="POST" novalidate>

<h4 style="margin-left:700px">Admission Billing Table</h4>


        <center>

             


           <table id="tb" style="margin-bottom: 20px;">

    <tr>

        <th>Admission ID</th>
        <th>Patient Name</th>
        <th>Room No</th>
        <th>Privous Status</th>
        <th>Admission Date</th>
        <th>Bill ID</th>
        <th>Present Status</th>
        <th>Released Date</th>
        <th>Amount (TK)</th>
        <th>Delete</th>
        
        <th>Update</th>
        <th>Print</th>
    </tr>
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row['admission_ID']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['room_no']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['admission_date']; ?></td>
                <td><?php echo $row['bill_ID']; ?></td>
                 <td><?php echo $row['present_status']; ?></td>
                 <td><?php echo $row['released_date']; ?></td>

                 <td><?php echo $row['amount']; ?></td>
                <td>
                    <form novalidate method="POST">
                        <input type="hidden" name="admission_ID" value="<?php echo $row['admission_ID']; ?>">
                        <button style="color:white; background-color:#f75d59 ; border-radius: 5px; width: 80px ; height: 25px; " formaction="../controller/deteteInfo_2.php" name="delete">Delete</button>


                    </form>
                </td>




                  <td>
                    <form novalidate method="POST">
                        <input type="hidden" name="admission_ID" value="<?php echo $row['admission_ID']; ?>">
                        <button style="color:white; background-color:green ; border-radius: 5px; width: 80px ; height: 25px; " formaction="../view/updateAdmissionBill.php" id="print" name="update">Update</button>

                        
                    </form>
                </td>



                 <td>
                    <form novalidate method="POST">
                        <input type="hidden" name="admission_ID" value="<?php echo $row['admission_ID']; ?>">
                        <button style="color:white; background-color:blue ; border-radius: 5px; width: 80px ; height: 25px; " formaction="../view/PrintBill.php" id="print" name="print">Print</button>

                        
                    </form>
                </td>




            </tr>
    <?php
        }
    
    ?>
    


   
            

   
</table>

               



           </center>



    






</form>



 <form action="" method="POST" novalidate>
            <br><br><br><br>
            <center>
                <h4 style="margin-left: px;">Diagnosis Billing Table </h4>
                <table id="tb" style="margin-bottom: 100px;">
                    <tr>
                        <th>Test ID</th>
                        <th>Patient Name</th>
                        <th>Patient Age</th>
                        <th>Mobile No</th>
                        <th>Reference</th>
                        <th>Test</th>
                        <th>Delivery Date</th>
                        <th>Test Fee(Tk)</th>
                        

                        <th>Update</th>

                        <th>Print</th>
                    </tr>
                    <?php
                    if ($results !== false && $results->num_rows > 0) {
                        while ($row = $results->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['test_ID']; ?></td>
                                <td><?php echo $row['patient_name']; ?></td>
                                <td><?php echo $row['patient_age']; ?></td>
                                <td><?php echo $row['mobile_no']; ?></td>
                                <td><?php echo $row['doc_ref']; ?></td>
                                <td><?php echo $row['test_name']; ?></td>
                                <td><?php echo $row['delivery_date']; ?></td>
                                <td><?php echo $row['test_fee']; ?></td>



                                  <td>


                    <form novalidate method="POST">
                        <input type="hidden" name="test_ID" value="<?php echo $row['test_ID']; ?>">
                        <button style="color:white; background-color:green ; border-radius: 5px; width: 80px ; height: 25px; " formaction="../view/updateDiagnosisBill.php" id="" name="">Update</button>

                        
                    </form>



                </td>











                     <td>


                    <form novalidate method="POST">
                        <input type="hidden" name="test_ID" value="<?php echo $row['test_ID']; ?>">
                        <button style="color:white; background-color:blue ; border-radius: 5px; width: 80px ; height: 25px; " formaction="../view/PrintDiagnosisBill.php" id="print" name="print"> Print</button>

                        
                    </form>



                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7">No data found</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                
            </center>
        </form>

   
    






</div>

</div>
                                    
</body>


 <?php

            include('footer.php');

            ?>
</html>



