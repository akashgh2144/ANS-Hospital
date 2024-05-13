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
  //  echo $staffID; 
    
    $result =display_attendance($staffID);
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance and leaave application ANS Hospital</title>



    <?php
    include('header.php');
    include('nav.php');
    ?>

    
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


      <script type="text/javascript" src="js/LeaveValidation.js"  ></script>


</head>
<body>
    <div class="container">
    <div class="left-div">
        <?php include('sidebar.php'); ?>
    </div><div class="right-div">
    <form id="leaveApplicationForm" method="POST" novalidate onsubmit=" return LeaveValidate();">
        <br><br><br><br>

        <center>
            <table>
                <tr>
                    
                    <th>Staff ID</th>
                    <th>Month</th>
                    <th>Working Day</th>
                    <th>Present Day</th>
                    
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['staff_ID']; ?></td>
                    <td><?php echo $row['month']; ?></td>
                    <td><?php echo $row['working_day']; ?></td>
                    <td><?php echo $row['present_day']; ?></td>
                    
                </tr>
                <?php
                }
                ?>
            </table>

            <br>

        

        <h4 style="color:red;">Leave Application :</h4>

                <label>Choose a Reason:</label>

				<select name="reason" id="reason">
                <option value="">Select</option>

				  <option value="Sickness">Sickness</option>
				  <option value="Emergency">Emergency</option>
				  <option value="Others">Others</option>
				  
				</select>
                 <h4 style="color:black;">Date for leave : </h4>

				<input type="date" id="date" name="date">

				<br><br>

              
            <textarea style="border: solid 3px ; border-radius: 8px; border-color: skyblue;" placeholder="write your issues" id="leave" name="cbox" rows="6" cols="50" ></textarea>

            <br><br>

            <button id="submitbtn" formaction="../controller/leaveApplicationAction.php" style="background-color:lightgreen; width: 100px ; height:30px; border-radius: 12px; border: 1px solid;" onclick="loadDoc()">submit</button>







            <button onclick="window.location.href='../controller/ApplicationCancelAction.php'; return false;"   style="background-color:pink; ; width: 100px ; height:30px; border-radius: 12px; border: 1px solid;" >cancel</button>

            <button onclick="window.location.href='../view/viewApplication.php'; return false;"    style="background-color:lightblue; width: 100px ; height:30px; border-radius: 12px; border: 1px solid;" >view</button>


          
             <button style="background-color:lightyellow; width: 100px; height:25px; border-radius: 12px; border: 1px solid;" onclick="window.location.href='../view/Dashboard.php'; return false;">Back</button>

            <br><br>

            <h3 style="color :crimson;">

            	<?php
                         if(isset($_SESSION['empty_box'])){
                           echo "<span >". $_SESSION['empty_box'] . "</span><br>";
                                   
                             }
                 ?>
            	



            </h3>


             
            
            

        </center>
           










    </form>

</div>
</div>
</body>


 <?php

            include('footer.php');

            ?>
</html>
