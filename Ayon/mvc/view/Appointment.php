
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

    $result = search_appiontment($search_query);

    if (mysqli_num_rows($result) == 0) {
        $no_data_found = true;
    }
} else {
    $result = display_appiontment();
}







?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appiontment ANS Hospital</title>

    <?php

            include('header.php');
             include('nav.php');

            ?>

        <style>
        

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
    
    <script type="text/javascript"src="js/AppiontmentValidation.js" ></script>

    <script type="text/javascript"src="js/AppiontmentUpdateValidation.js" ></script>

</head>


<body>  


     <div class="container">
    <div class="left-div">
        <?php include('sidebar.php'); ?>
    </div><div class="right-div">

<center>

<form style="margin-top: 40px; margin-right: 500px;" method="POST" novalidate>
    <label for="search">Search:</label>
    <input  type="text" id="search" name="search" aria-label="Search" placeholder="Enter search query">
    <button id="searchbtn" type="submit" name="submit" aria-label="Submit search">Search</button>

</form>



</center>


   
    
<table>

    <tr>

        <td>

             <form  action="../controller/AppiontmentAction.php" method="POST" novalidate onsubmit=" return AppiontmentValidate(); " >

       <br><br> <br><br>
        
       
        
        <table>
            
                <tr> 
                                       
                    <td>

                        <fieldset id="insert" >
                            
                            <legend>Patient Appiontment : </legend>
                          
                        <table>
                 <tr><td><br></td></tr>
                            <tr>
                             
                                  <td><label for="aname" >Patient Name </label></td>
                                  <td>: <input id="aname" name="aname" type="text" value="<?php echo isset($_SESSION['aname']) ? $_SESSION['aname'] : ''; ?>"  </td>
                                    
                                    <br>

                              
                          </tr>

                          
                          <tr><td><br></td></tr>

                          
          
                       
                          <tr>
                      
                    <td><label>Doctor Name </label></td>

                    <td>:
                    
                    <select style="width: 175px;" name="doctor" id="doctor" >

                    <option value="<?php echo isset($_SESSION['doctor']) ? $_SESSION['doctor'] : ''; ?>">select</option>
                    <option value="Dr.Hasem Ali Khan">Dr.Hasem Ali Khan</option>
                    <option value="Dr.Faria Binte Kamal">Dr.Faria Binte Kamal</option>
                    <option value="Dr.Altaf Hossion">Dr.Altaf Hossion</option>
                    <option value="Dr.Liakat Ali">Dr.Liakat Ali</option>

                     <option value="Dr.Wasim Khan">Dr.Wasim Khan</option>
                    

        


                             </td>

                           

          
                          </tr>
                          <tr><td><br></td></tr>

        <tr>
                              
                        
                      
                    <td><label>Patient Age :</label></td>

                    <td>:
                    
                    <input  id="age" name="age" type="text" value="<?php echo isset($_SESSION['age']) ? $_SESSION['age'] : ''; ?>">
                   
                    
                   
                    

                </td>

                 <tr><td><br></td></tr>

                  <tr>
                              
                        
                      
                    <td><label>Mobile No :</label></td>

                    <td>:
                    
                    <input  id="mobile_no" name="mobile_no" type="text" value="<?php echo isset($_SESSION['mobile_no']) ? $_SESSION['mobile_no'] : ''; ?>">
                   
                    
                   
                    

                </td>

                            
          
     </tr>




                             <tr><td><br></td></tr>

                               <tr>
                                   
                            <td> <label  for="appiontmentdate">Appiontment Date</label></td>
                            <td>: <input style="width: 175px;" id="appiontmentdate"  name="appiontmentdate" type="date" value="<?php echo isset($_SESSION['appiontmentdate']) ? $_SESSION['appiontmentdate'] : ''; ?>"> </td>

                                
                                         
                               

                                     </td>

                               </tr>





                                <tr><td><br></td></tr>

                          

                               <tr>
                                   
                                       <td> <td>

                                   <h4 style="color:crimson;">     

                                            <?php
                                if(isset($_SESSION['app_val'])){
                                    echo "<span >". $_SESSION['app_val'] . "</span><br>";
                                   
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

                                    <input style="background-color:#333; color : white; width: 150px ; height: 25px; border-radius: 12px; border: 1px solid;" type="submit" value="Appointment">


                                    

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

             

             <form  action="../controller/AppiontmentUpdateAction.php" method="POST" novalidate onsubmit=" return AppiontmentUpdateValidate(); " >

       <br><br> <br><br>
        
       
        
        <table>
            
                <tr> 
                                       
                    <td>

                        <fieldset id="update" >
                            
                            <legend>Patient Appiontment Update : </legend>
                          
                        <table>


                            <tr><td><br></td></tr>
                            <tr>
                             
                                  <td><label for="appointment_ID" >Appointment ID </label></td>
                                  <td>: <input id="appointment_ID" name="appointment_ID" type="text" value="<?php echo isset($_SESSION['appointment_ID']) ? $_SESSION['appointment_ID'] : ''; ?>"  </td>
                                    
                                    <br>

                              
                          </tr>







                            <tr><td><br></td></tr>
                            <tr>
                             
                                  <td><label for="upname" >Patient Name </label></td>
                                  <td>: <input id="upname" name="upname" type="text" value="<?php echo isset($_SESSION['upname']) ? $_SESSION['upname'] : ''; ?>"  </td>
                                    
                                    <br>

                              
                          </tr>

                          
                          <tr><td><br></td></tr>

                          
          
                       
                          <tr>
                      
                    <td><label>Doctor Name </label></td>

                    <td>:
                    
                    <select style="width: 175px;" name="updoctor" id="updoctor" >

                    <option value="<?php echo isset($_SESSION['updoctor']) ? $_SESSION['updoctor'] : ''; ?>">select</option>
                    <option value="Dr.Hasem Ali Khan">Dr.Hasem Ali Khan</option>
                    <option value="Dr.Faria Binte Kamal">Dr.Faria Binte Kamal</option>
                    <option value="Dr.Altaf Hossion">Dr.Altaf Hossion</option>
                    <option value="Dr.Liakat Ali">Dr.Liakat Ali</option>
                    <option value="Dr.Wasim Khan">Dr.Wasim Khan</option>
                    

        


                             </td>

                           

          
                          </tr>
                          <tr><td><br></td></tr>

        <tr>
                              
                        
                      
                    <td><label>Patient Age :</label></td>

                    <td>:
                    
                    <input  id="upage" name="upage" type="text" value="<?php echo isset($_SESSION['upage']) ? $_SESSION['upage'] : ''; ?>">
                   
                    
                   
                    

                </td>

                 <tr><td><br></td></tr>

                  <tr>
                              
                        
                      
                    <td><label>Mobile No :</label></td>

                    <td>:
                    
                    <input  id="upmobile_no" name="upmobile_no" type="text" value="<?php echo isset($_SESSION['upmobile_no']) ? $_SESSION['upmobile_no'] : ''; ?>">
                   
                    
                   
                    

                </td>

                            
          
     </tr>




                             <tr><td><br></td></tr>

                               <tr>
                                   
                            <td> <label  for="upappiontmentdate">Appiontment Date</label></td>
                            <td>: <input style="width: 175px;" id="upappiontmentdate"  name="upappiontmentdate" type="date" value="<?php echo isset($_SESSION['upappiontmentdate']) ? $_SESSION['upappiontmentdate'] : ''; ?>"> </td>

                                
                                         
                               

                                     </td>

                               </tr>





                                <tr><td><br></td></tr>

                          

                               <tr>
                                   
                                       <td> <td>

                                   <h4 style="color:crimson;">     

                                <?php
                                if(isset($_SESSION['upapp_val'])){
                                    echo "<span >". $_SESSION['upapp_val'] . "</span><br>";
                                   
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

                                    <input style="background-color:#333; color : white; width: 150px ; height: 25px; border-radius: 12px; border: 1px solid;" type="submit" value="Update">


                                    


                                    

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
        

    </tr>
    

</table>





<form method="POST" novalidate>




        <center>

             


           <table id="tb" style="margin-bottom: 100px;">
    <tr>
        <th>Appiontment ID</th>
        <th>Patient Name</th>
        <th>Doctor Name</th>
        <th>Patient Age</th>
        <th>Mobile No</th>

        <th>Appiontment Date</th>
        <th>Operation</th>
    </tr>
    <?php
    if ($result !== null && !$no_data_found) { // Check if there are results to display
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row['appointment_ID']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['doctor_name']; ?></td>
                <td><?php echo $row['patient_age']; ?></td>
                <td><?php echo $row['mobile_no']; ?></td>
                <td><?php echo $row['appiontment_date']; ?></td>
                <td>
                    <form novalidate method="POST">
                        <input type="hidden" name="appointment_ID" value="<?php echo $row['appointment_ID']; ?>">
                        <button style="color:white; background-color:#f75d59 ; border-radius: 5px; margin-left: 20px;width: 150px ; height: 25px; " formaction="../controller/dateteAppointment.php" name="delete">Delete</button>
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



