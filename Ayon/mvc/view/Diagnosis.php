<?php
session_start();
require '../model/Data.php';

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();


}


$result = display_diagnosis();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis ANS Hospital</title>

    <?php
    include('header.php');
    include('nav.php');
    ?>

    <style>
        /* Your CSS Styles */


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

   align-content: center;



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



 

    </style>

    <script type="text/javascript" src="js/DiagnosisValidation.js"></script>
</head>
<body>

 <div class="container">
    <div class="left-div">
        <?php include('sidebar.php'); ?>
    </div><div class="right-div">

        <form action="../controller/DiagnosisAction.php" method="POST" novalidate onsubmit="return DiagnosisValidate();">
            <br>
            <table>
                <tr>
                    <td>
                        <fieldset id="insert">
                            <legend >Patient Diagnosis :</legend>
                            <table>
                                <tr>
                                    <td><label for="test_patient_name">Patient Name:</label></td>
                                    <td>: <input id="test_patient_name" name="test_patient_name" type="text" value="<?php echo isset($_SESSION['test_patient_name']) ? $_SESSION['test_patient_name'] : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td><label for="test_patient_age">Patient Age:</label></td>
                                    <td>: <input id="test_patient_age" name="test_patient_age" type="text" value="<?php echo isset($_SESSION['test_patient_age']) ? $_SESSION['test_patient_age'] : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td><label for="test_mobile_no">Mobile No:</label></td>
                                    <td>: <input id="test_mobile_no" name="test_mobile_no" type="text" value="<?php echo isset($_SESSION['test_mobile_no']) ? $_SESSION['test_mobile_no'] : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td><label for="test_doctorRef">Doctor Ref:</label></td>
                                    <td>:
                                        <select id="test_doctorRef" name="test_doctorRef">
                                <option >select</option>
                                <option value="Dr.Hasem Ali Khan">Dr.Hasem Ali Khan</option>
                                <option value="Dr.Faria Binte Kamal">Dr.Faria Binte Kamal</option>
                                <option value="Dr.Altaf Hossion">Dr.Altaf Hossion</option>
                                <option value="Dr.Liakat Ali">Dr.Liakat Ali</option>

                                 <option value="Dr.Wasim Khan">Dr.Wasim Khan</option>
                                
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td><label for="diagnosis">Diagnosis:</label></td>
                                    <td>:
                                        <select id="diagnosis" name="diagnosis" >

                                             <option value="">Select Test</option>
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
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td><label for="delivery_date">Delivery Date:</label></td>
                                    <td>: <input id="delivery_date" name="delivery_date" type="date" value="<?php echo isset($_SESSION['delivery_date']) ? $_SESSION['delivery_date'] : ''; ?>" ></td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>



                                 </tr>
                                <tr>
                                    <td><label for="fee">Test Fee(Tk) :</label></td>
                                    <td>: <input id="fee" name="fee" type="text" value="<?php echo isset($_SESSION['fee']) ? $_SESSION['fee'] : ''; ?>" ></td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>






                                <tr>
                                    <td></td>
                                    <td>
                                        <input style="background-color:#333; color:white; width:150px; height:25px; border-radius:12px; border:1px solid;" type="submit" value="Save">
                                        <button style="background-color:lightyellow; width:100px; height:25px; border-radius:12px; border:1px solid;" onclick="window.location.href='../view/Dashboard.php'; return false;">Back</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <h4 style="color:crimson;">
                                            <?php echo isset($_SESSION['test_error']) ? $_SESSION['test_error'] : ''; ?>
                                        </h4>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </form>
</div>
</div>


     <form action="" method="POST" novalidate>
            <br><br><br><br>
            <center>
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
                    </tr>
                    <?php
                    if ($result !== false && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
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


<?php
include('footer.php');
?>
</body>
</html>
