

<?php
session_start();
require '../model/Data.php';

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}


$results = display_diagnosis();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update- Admission Billing</title>

      <style>
        

        .container {
            width: 100%;
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

    margin-right: 200px;


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


   margin-left: 200px; 
   margin-bottom: 85px; 
   background-color:skyblue; 
   border: 4px solid;

   height: 100%;
   width: 70%;
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





    </style>

     <?php

            include('header.php');
             include('nav.php');

            ?>
</head>
<body>


    <body>
    <div class="container">
        <div class="left-div">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="right-div">
            <form action="../controller/UpdateDiagnosis_Bill.php" method="POST">

                <br><br>
                <table id="tb" style="margin-left: 70px;">
                    <tr>
                        <th>Test ID</th>
                        <th>Patient Name</th>
                        <th>Patient Age</th>
                        <th>Mobile No</th>
                        <th>Doctor Reference</th>
                        <th>Test Name</th>
                        <th>Delivery Date</th>
                        <th>Test Fee (TK)</th>
                         <th>Update</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                        <tr>
                            <td><input readonly type="text" name="up_test_ID" value="<?php echo $row['test_ID']; ?>"></td>
                            <td><input  type="text" name="upatient_name" value="<?php echo $row['patient_name']; ?>"></td>
                            <td><input  type="text" name="upatient_age" value="<?php echo $row['patient_age']; ?>"></td>
                            <td><input  type="text" name="umobile_no" value="<?php echo $row['mobile_no']; ?>"></td>

                           



                            <td>


                                    <select id="udoc_ref" name="udoc_ref">
                                <option ><?php echo $row['doc_ref']; ?></option>
                                <option value="Dr.Hasem Ali Khan">Dr.Hasem Ali Khan</option>
                                <option value="Dr.Faria Binte Kamal">Dr.Faria Binte Kamal</option>
                                <option value="Dr.Altaf Hossion">Dr.Altaf Hossion</option>
                                <option value="Dr.Liakat Ali">Dr.Liakat Ali</option>

                                 <option value="Dr.Wasim Khan">Dr.Wasim Khan</option>
                                
                                        </select>


                                            </td>
                             <td><select id="udiagnosis" name="udiagnosis"  >

                                             <option ><?php echo $row['test_name']; ?></option>
                                            <option value="CBC">CBC</option>
                                            <option value="MRI">MRI</option>
                                            <option value="X-Ray">X-Ray</option>
                                            <option value="Ultrasound">Ultrasound</option>
                                            <option value="ECG">ECG</option>
                                            <option value="CT Scan">CT Scan</option>
                                            <option value="Endoscopy">Endoscopy</option>
                                            <option value="Biopsy">Biopsy</option>
                                            <option value="Blood Sugar Test">Blood Sugar Test</option>
                                            <option value="Urine Analysis">Urine Analysis</option>
                                            </select></td>


                            <td><input  type="date" name="udelivery_date" value="<?php echo $row['delivery_date']; ?>"></td>
                            <td><input  type="text" name="utest_fee" value="<?php echo $row['test_fee']; ?>"></td>

                            <td>
                        <button style="color:white; background-color:green; border-radius: 5px; width: 80px; height: 25px;" type="submit" name="update">Update</button>
                    </td>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <center><button style="background-color:lightyellow; width: 100px; height:25px; border-radius: 12px; border: 1px solid;" onclick="window.location.href='../view/BillManagement.php'; return false;">Back</button></center>
            </form>

            <h4 style="color:crimson;">
                <?php echo isset($_SESSION['update_error']) ? $_SESSION['update_error'] : ''; ?>
            </h4>
        </div>
    </div>
</body>
</body>
</html>
