<?php
session_start();
require '../model/Data.php';

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}

$userData = profileView($_SESSION['user']);

if ($userData) {
    $staffID = $userData['staff_ID'];
    $result = display_account_status($staffID);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information ANS Hospital</title>

      <?php
    include('header.php');
    include('nav.php');
    ?>
    <link rel="stylesheet" href="css/external.css">

   

    <style>
        table {
            width: 75%;
            border-collapse: collapse;
            ba
        }

        th, td {
            border: 1px solid;
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: skyblue;
        }

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

        
    </style>
</head>
<body>

<div class="container">
    <div class="left-div">
        <?php include('sidebar.php'); ?>
    </div><div class="right-div">
        <form action="" method="POST" novalidate>
            <br><br><br><br>
            <center>
                <table >
                    <tr>
                        <th>Account ID</th>
                        <th>Staff ID</th>
                        <th>Salary</th>
                        <th>Credited Date</th>
                        <th>Credited Amount</th>
                        <th>Debited Date</th>
                        <th>Debited Amount</th>
                        <th>Current Balance</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['account_id']; ?></td>
                            <td><?php echo $row['staff_ID']; ?></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td><?php echo $row['credited_date']; ?></td>
                            <td><?php echo $row['credited_amount']; ?></td>
                            <td><?php echo $row['debited_date']; ?></td>
                            <td><?php echo $row['debited_amount']; ?></td>
                            <td><?php echo $row['current_balance']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <br><br>
                <button formaction="../view/Dashboard.php" style="background-color:lightyellow; width: 100px ; height:30px; border-radius: 12px; border: 1px solid;">Back</button>
            </center>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>
</body>
</html>
