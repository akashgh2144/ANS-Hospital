function AppiontmentUpdateValidate() {

     const  appid = document.getElementById("appointment_ID").value;
    const  nname = document.getElementById("upname").value;
    const  udoc = document.getElementById("updoctor").value;


    const uage = document.getElementById("upage").value;
    const umob = document.getElementById("upmobile_no").value;
    const uappdate = document.getElementById("upappiontmentdate").value;


   


    
    if (appid === "" || nname=== ""  || udoc === "" || uage === "" || umob === "" || uappdate === "") {
        window.alert(" *Patient Aappiontment Update* \n\n Please fill up all fields");
        return false;
    } 

    
    else {
        return true;
    }
}



