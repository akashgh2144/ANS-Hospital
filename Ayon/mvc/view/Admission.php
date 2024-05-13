
<?php
session_start();
require '../model/Data.php';

if (!isset($_SESSION['LoggedIn'])) {
    header("Location: UserLogin.php");
    exit();
}

$result = null;
$no_data_found = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $search_query = $_POST['search'];

    $result = search_admission($search_query);

    if (mysqli_num_rows($result) == 0) {
        $no_data_found = true;
    }

    else{

        
    }
} 

else {
    $result = display_admission();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission ANS Hospital</title>

    <?php

            include('header.php');
             include('nav.php');

            ?>


    <style>
        

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
    
    <script type="text/javascript"src="js/AdmissionValidation.js" ></script>

    <script type="text/javascript"src="js/AdmissionUpdateValidation.js" ></script>

        <script type="text/javascript"src="js/ajax_Search.js" ></script>


</head>
<body>

    <div class="container">
    <div class="left-div">
        <?php include('sidebar.php'); ?>
    </div><div class="right-div">

<center>

<form style="margin-top: 40px; margin-right: 500px;" onsubmit="return searchAdmission()" method="POST" novalidate>
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" aria-label="Search" placeholder="Enter search query">
    <button id="searchbtn" type="submit" name="submit" aria-label="Submit search">Search</button>
</form>

<div id="searchResult"></div>






<script>

</script>




</center>


   
    
<table>

    <tr>

        <td>

            <form  action="../controller/AdmissionAction.php" method="POST" novalidate onsubmit=" return AdmissionValidate(); " >

       <br><br> <br><br>
        
       
        
        <table>
            
                <tr> 
                                       
                    <td>

                        <fieldset id="insert" >
                            
                            <legend>Patient Admission : </legend>
                          
                        <table>
                 <tr><td><br></td></tr>
                            <tr>
                             
                                  <td><label for="name" >Patient Name </label></td>
                                  <td>: <input id="name" name="name" type="text" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>"  </td>
                                    
                                    <br>

                              
                          </tr>

                          
                          <tr><td><br></td></tr>

                          
          
                       
                          <tr>
                      
                    <td><label>Room No </label></td>

                    <td>:
                    
                    <select style="width: 175px;" name="room" id="room" >

                    <option value="">select</option>
                    <option value="101-AC">101-AC</option>
                    <option value="102-AC"> 102-AC</option>
                    <option value="103-AC"> 103-AC</option>
                    <option value="104-AC"> 104-AC</option>
                    <option value="105-AC"> 105-AC</option>
                    <option value="201-Non AC"> 102-Non AC</option>
                    <option value="202-Non AC"> 202-Non AC</option>
                    <option value="203-Non AC"> 202-Non AC</option>
                    <option value="204-Non AC"> 202-Non AC</option>
                    <option value="205-Non AC"> 202-Non AC</option>

        


                             </td>

                           

          
                          </tr>
                          <tr><td><br></td></tr>

        <tr>
                              
                        
                      
                    <td><label>Admission Status  </label></td>

                    <td>:
                    
                    <input readonly id="status" name="status" type="text" value="Admitted">
                   
                    
                   
                    

                </td>

                            
          
     </tr>




                             <tr><td><br></td></tr>

                               <tr>
                                   
                            <td> <label  for="admissiondate">Admission Date</label></td>
                            <td>: <input style="width: 175px;" id="admissiondate"  name="admissiondate" type="date" value="<?php echo isset($_SESSION['admision_d']) ? $_SESSION['admision_d'] : ''; ?>"> </td>

                                
                                         
                               

                                     </td>

                               </tr>





                                <tr><td><br></td></tr>

                          

                               <tr>
                                   
                                       <td> <td>

                                   <h4 style="color:crimson;">     

                                            <?php
                                if(isset($_SESSION['admit_val'])){
                                    echo "<span >". $_SESSION['admit_val'] . "</span><br>";
                                   
                                }
                                ?>

                            </h4>
                                            


                                       </td>  </td>

                               </tr>





                             
                                 <tr>

                                    <td></td>

                                <td>

                               
                            
                            <h4 style="color:crimson;">

                               
                                

                            </h4>

                                 

                            </td>



                                 </tr>
 

                          
                         <center>
                             

                            <tr>


                                <td><td>

                                    <input style="background-color:#333; color : white; width: 150px ; height: 25px; border-radius: 12px; border: 1px solid;" type="submit" value="Admit">


                                    

                                    <button style="background-color:lightyellow; width: 100px; height:25px; border-radius: 12px; border: 1px solid;" onclick="window.location.href='../view/Dashboard.php'; return false;">Back</button>


                                    

                                </td>
                                  
                                  <td>
                                    


                            </td>
                                

                               
                                    

                                
                            </tr>
                            
                        
                      
                  
                       </table>



    
                       
               

                    </fieldset>





                    </td>


                    <td>
                        

                     
                        


                    </td>


                </tr>
      
        </table>
        
           </center>
           
    

</form>

            

        </td>

        <td>

    <form method="POST" novalidate onsubmit=" return AdmissionUpdateValidate();">


       <fieldset id="update" >
                            
                            <legend>Patient Admission Update: </legend>
                          
                        <table>

                             
                            <tr>
                             
                                  <td><label for="id" >Admission ID </label></td>
                                  <td>: <input id="id" name="id" type="text" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">  </td>
                                    
                                    <br>

                              
                          </tr>




                 <tr><td><br></td></tr>
                            <tr>
                             
                                  <td><label for="pname" >Patient Name </label></td>
                                  <td>: <input id="pname" name="pname" type="text" value="<?php echo isset($_SESSION['pname']) ? $_SESSION['pname'] : ''; ?>"  </td>
                                    
                                    <br>

                              
                          </tr>

                          
                          <tr><td><br></td></tr>

                          
          
                       
                          <tr>
                      
                    <td><label>Room No </label></td>

                    <td>:
                    
                    <select style="width: 175px;" name="proom" id="proom" >

                    <option value="">select</option>
                    <option value="101-AC">101-AC</option>
                    <option value="102-AC"> 102-AC</option>
                    <option value="103-AC"> 103-AC</option>
                    <option value="104-AC"> 104-AC</option>
                    <option value="105-AC"> 105-AC</option>
                    <option value="201-Non AC"> 102-Non AC</option>
                    <option value="202-Non AC"> 202-Non AC</option>
                    <option value="203-Non AC"> 202-Non AC</option>
                    <option value="204-Non AC"> 202-Non AC</option>
                    <option value="205-Non AC"> 202-Non AC</option>

        


                             </td>

                           

          
                          </tr>
                          <tr><td><br></td></tr>

        <tr>
                              
                        
                      
                    <td><label>Admission Status  </label></td>

                    <td>:
                    
                    <input readonly id="pstatus" name="pstatus" type="text" value="Admitted">
                   
                    
                   
                    

                </td>

                            
          
     </tr>








                             <tr><td><br></td></tr>

                               <tr>
                                   
                            <td> <label  for="padmissiondate">Admission Date</label></td>
                            <td>: <input style="width: 175px;" id="padmissiondate"  name="padmissiondate" type="date" value="<?php echo isset($_SESSION['padmision_d']) ? $_SESSION['padmision_d'] : ''; ?>"> </td>

                                
                                         
                               

                                     </td>

                               </tr>











                                <tr><td><br></td></tr>

                          

                               <tr>
                                   
                                       <td> <td>

                                   <h4 style="color:crimson;">     

                                            <?php
                                if(isset($_SESSION['p_admit_val'])){
                                    echo "<span >". $_SESSION['p_admit_val'] . "</span><br>";
                                   
                                }
                                ?>


                                 <?php
                                if(isset($_SESSION['failed_update'])){
                                    echo "<span >". $_SESSION['failed_update'] . "</span><br>";
                                   
                                }
                                ?>

                            </h4>
                                            


                                       </td>  </td>

                               </tr>





                             
                                 <tr>

                                    <td></td>

                                <td>

                               
                            
                            <h4 style="color:crimson;">

                               
                                

                            </h4>

                                 

                            </td>



                                 </tr>
 

                          
                         <center>
                             

                            <tr>


                                <td><td>

                                    <button formaction="../controller/AdmissionUpdateAction.php" style="background-color:#333; color : white; width: 150px ; height: 25px; border-radius: 12px; border: 1px solid;" >Update</button>


                                    

                                    

                                    

                                </td>
                                  
                                  <td>

                                    
                            </td>
                                

                               
                            </tr>
                            
                        
                      
                  
                       </table>




                    </fieldset>



</form>



        



        </td>
        

    </tr>
    

</table>





<form method="POST" novalidate>




        <center>

             


           <table id="tb" style="margin-bottom: 100px;">
    <tr>
        <th>Admission ID</th>
        <th>Patient Name</th>
        <th>Room No</th>
        <th>Status</th>
        <th>Admission Date</th>
        <th>Operation</th>
    </tr>
    <?php
    if ($result !== null && !$no_data_found) { 
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row['admission_ID']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['room_no']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['admission_date']; ?></td>
                <td>
                    <form novalidate method="POST">
                        <input type="hidden" name="admission_ID" value="<?php echo $row['admission_ID']; ?>">
                        <button style="color:white; background-color:#f75d59 ; border-radius: 5px; margin-left: 20px;width: 150px ; height: 25px; " formaction="../controller/deletePatientAction.php" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
    <?php
        }
    } elseif ($no_data_found) { // If no data is found, display a message
    ?>
       
            
            
            <h2 style="color:red;";h4>No data found</h2>

    <?php
    }
    ?>
</table>

               



           </center>



    






</form>
   
    






</div>

</div>
                                    
</body>


 <?php

            include('footer.php');

            ?>
</html>



