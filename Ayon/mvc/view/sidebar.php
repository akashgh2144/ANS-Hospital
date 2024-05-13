
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard ANS Hospital</title>
    <script type="text/javascript" src="js/LoadPage.js"></script>
    <style>
        .sidebar-link {
            display: block;
            text-decoration: none;
            color: #333;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 8px;
            font-size: 14px;
             font-weight: bold;
        }
        .sidebar-link:hover {
            color: black;
            background-color: yellow;
        }
        .button {
            background-color: lightgreen;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 4px;
            cursor: pointer;
            
            width: 310px; /* Adjust the width as needed */
            height: 39px; /* Adjust the height as needed */
        }
    </style>
</head>
<body>
    <section>
        <nav>
            <button class="button"><a href="../view/checkAccount.php" class="sidebar-link">1. Check account status</a></button>
            <button class="button"><a href="../view/checkattendance.php" class="sidebar-link">2. Check Attendance & Leave Application</a></button>
            <button class="button"><a href="../view/Admission.php" class="sidebar-link">3. Patient Admission</a></button>
            <button class="button"><a href="../view/Appointment.php" class="sidebar-link">4. Patient Appointment</a></button>
            <button class="button"><a href="../view/Diagnosis.php" class="sidebar-link">5. Patient Diagnosis</a></button>
            <button class="button"><a href="../view/BillManagement.php" class="sidebar-link">6. Billing System</a></button>
        </nav>
        <article id="pageContent">
            <!-- Your content here -->
        </article>
    </section>
    <?php include('footer.php'); ?>
</body>
</html>
