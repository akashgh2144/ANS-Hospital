function provalidate(){

const ab=document.getElementById("doctor_ID");
const ac=document.getElementById("fullname");
const ad=document.getElementById("email");
const ae=document.getElementById("gender");
const af=document.getElementById("password");
if(ab.value ===""|| ac.value ==="" ||ad.value ==="" || ae.value === "" || af.value === ""){
window.alert("please fill up the form properly!")

}
else{
    return true;
}



    return false;
}