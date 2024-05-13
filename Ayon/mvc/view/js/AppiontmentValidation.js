function AppiontmentValidate() {


    const  name = document.getElementById("aname").value;
    const  doc = document.getElementById("doctor").value;


    const age = document.getElementById("age").value;
    const mob = document.getElementById("mobile_no").value;
    const appdate = document.getElementById("appiontmentdate").value;


   


    
    if (name === "" || doc=== ""  || age === "" || mob === "" || appdate === "" ) {
        window.alert(" *Patient Aappiontment* \n\n Please fill up all fields");
        return false;
    } 

    
    else {
        return true;
    }
}


