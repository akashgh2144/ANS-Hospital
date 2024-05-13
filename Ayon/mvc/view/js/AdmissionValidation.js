function AdmissionValidate() {


    const  name = document.getElementById("name").value;
    const  room = document.getElementById("room").value;


    const admission = document.getElementById("admissiondate").value;


   


    
    if (name === "" || room === ""  || admission === "" ) {
        window.alert(" *Patient Admission* \n\n Please fill up all fields");
        return false;
    } 

    
    else {
        return true;
    }
}


