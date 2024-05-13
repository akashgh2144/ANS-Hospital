<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("Location: login.php");
    exit();
}

require '../model/data.php';

$salarys = salarylist();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient List</title>
</head>
<body style="background-color: rgb(192 132 252);">
    <form method="post" novalidate>
        <br><br><br><br><br>
        <center><h4>Salary List List</h4></center>
        <center>
            <table border="1">
                <thead>
                    <tr>
                        <th>Dortor ID</th>
                        <th>View Salary</th>
                        <th>Current Balance</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($salarys as $salary): ?>
                    <tr>
                        <td><?php echo $salary['doctorID']; ?></td>
                        <td><?php echo $salary['view_salary']; ?></td>
                        
                        <td><?php echo $salary['current_balance']; ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br><br><br>
        </center>
    </form>
</body>
</html>
