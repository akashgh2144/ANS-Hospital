<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("Location: login.php");
    exit();
}

require '../model/data.php';

$plans = spatient_record();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
</head>
<body style="background-color: rgb(192 132 252);">
    <form method="post" novalidate>
        <br><br><br><br><br>
        <center><h4>view Records</h4></center>
        <center>
            <table border="1">
                <thead>
                    <tr>
                        <th>Record ID </th>
                        <th>test Result</th>
                        <th>treatment plan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($plans as $patient_record): ?>
                    <tr>
                        <td><?php echo $patient_record['record_id']; ?></td>
                        <td><?php echo $patient_record['test_result']; ?></td>
                        
                        <td><?php echo $patient_record['plans']; ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br><br><br>
        </center>
    </form>
</body>
</html>
