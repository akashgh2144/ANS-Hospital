<?php
session_start();
require '../model/Data.php';

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}

$result = display_admission_bill();

// Check if the print button is clicked and Test ID is set
if (isset($_POST['print']) && isset($_POST['admission_ID'])) {
    $admission_ID_to_print = $_POST['admission_ID'];
    // Fetch the row with the specified Admission ID
    $row_to_print = null;
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['admission_ID'] == $admission_ID_to_print) {
            $row_to_print = $row;
            break; // Stop looping once the desired row is found
        }
    }

    // Display the row to print
    if ($row_to_print !== null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Print Admission Bill</title>
            <style>
                 body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .hospital-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .bill-details {
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .value {
            margin-bottom: 10px;
            color: #333;
        }
        .print-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .print-button:hover {
            background-color: #0056b3;
        }

            </style>
        </head>
        <body>

            <center>
                <h1 class="hospital-name">ANS Hospital Ltd</h1>
            <h2>Admission Bill</h2>

                
            </center>
       <fieldset style="margin-left: 100px;margin-right: 100px ;color: green; border: 3px solid;">
<center>
        <div class="bill-details">
            <div class="details">
                <p class="label">Admission ID: <?php echo $row_to_print['admission_ID']; ?></p>
                <p class="label">Patient Name: <?php echo $row_to_print['patient_name']; ?></p>
                <p class="label">Room No: <?php echo $row_to_print['room_no']; ?></p>
                <p class="label">Previous Status: <?php echo $row_to_print['status']; ?></p>
                <p class="label">Admission Date: <?php echo $row_to_print['admission_date']; ?></p>
                <p class="label">Bill ID: <?php echo $row_to_print['bill_ID']; ?></p>
                <p class="label">Present Status: <?php echo $row_to_print['present_status']; ?></p>
                <p class="label">Released Date: <?php echo $row_to_print['released_date']; ?></p>
                <p class="label">Amount (TK): <?php echo $row_to_print['amount']; ?></p>
            </div>
        </div>
</center>
      </fieldset>  

            

                <div class="button-container" style="text-align: center;">
            <button class="print-button" onclick="window.print()">Print</button>
            <button style="background-color: crimson;" class="print-button" onclick="window.location.href='../view/Billmanagement.php'; return false;">Back</button>
        </div>

        </body>
        </html>
        <?php
        exit(); // Exit after printing the bill
    }
}
?>
<!-- The rest of your HTML code goes here -->
