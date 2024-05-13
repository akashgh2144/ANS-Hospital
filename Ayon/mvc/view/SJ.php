<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        #searchResultTable {
            width: 60%;
            border-collapse: collapse;
            margin-top: 0px;
            margin-right: 200px;
        }

        #searchResultTable th, #searchResultTable td {
            border: 1px solid;
            text-align: left;
            padding: 5px;
        }

        #searchResultTable th {
            background-color: skyblue;
        }
    </style>
</head>
<body>
<?php
session_start();
require '../model/Data.php';

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}

$result = null;
$no_data_found = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_query = $_POST['search'];

    if (!empty($search_query)) {
        $result = search_admission($search_query);

        if (mysqli_num_rows($result) == 0) {
            $no_data_found = true;
        }
    } else {
        $no_data_found = true; // Set flag to indicate no data found when search query is empty
    }
}
?>

<?php if ($result !== null && !$no_data_found) { ?>
    <table id="searchResultTable">
        <tr>
            <th>Admission ID</th>
            <th>Patient Name</th>
            <th>Room No</th>
            <th>Status</th>
            <th>Admission Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['admission_ID']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['room_no']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['admission_date']; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } elseif ($no_data_found) { ?>
    <p>No data found</p>
<?php } ?>
</body>
</html>
