function validate(){

const x=document.getElementById("phoneno");
const y=document.getElementById("password");
if(x.value ==="" && y.value === ""){
    window.alert("please fill up the form properly!")

}
else{
    return true;
}


return false;

}