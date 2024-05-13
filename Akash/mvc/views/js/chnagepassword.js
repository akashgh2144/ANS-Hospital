function changevalidate(){

    const aa=document.getElementById("phoneno");
    const bb=document.getElementById("newpassword");


    if(aa.value === "" && bb.value ===""){
        window.alert("please fill up the form properly!")

    }
    else{
        return true;
    }

    return false;
}