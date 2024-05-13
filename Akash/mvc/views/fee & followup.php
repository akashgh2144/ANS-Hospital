<?php
session_start();
require '../model/data.php';
 
$fees = fees_followup();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data here
    // For example, you can access form data like this:
    $followupID = $_POST['followupID'];
    $doctorID = $_POST['doctorID'];
 
    // Add your processing code here
    // For example, you can call a function to filter the data based on followupID and doctorID
    // filtered_fees_followup($followupID, $doctorID);
}
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
<center>
<h4>Filter Salary List</h4>
<input type="text" name="followupID" placeholder="Enter Followup ID">
<input type="text" name="doctorID" placeholder="Enter Doctor ID">
<button type="submit">Filter</button>
</center>
</form>
<center>
<table border="1">
<thead>
<tr>
<th>FeeID</th>
<th>Dortor ID</th>
<th>fee</th>
<th>FollowUp Fee</th>
</tr>
</thead>
<tbody>
<?php foreach($fees  as $fee_followup): ?>
<tr>
<td><?php echo $fee_followup['followupID']; ?></td>
<td><?php echo $fee_followup['doctorID']; ?></td>
<td><?php echo $fee_followup['fee']; ?></td>
<td><?php echo $fee_followup['followup_fee']; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<br><br><br>
</center>
</body>
</html>