function AdmissionUpdateValidate() {


    const  pname = document.getElementById("pname").value;
    const  proom = document.getElementById("proom").value;


    const padmission = document.getElementById("padmissiondate").value;

    const paid = document.getElementById("id").value;


   


    
    if (pname === "" || proom === ""  || padmission === "" || paid === "" ) {
        window.alert(" *Upadte Patient Admission* \n\n Please fill up all fields");
        return false;
    } 

    
    else {
        return true;
    }
}
