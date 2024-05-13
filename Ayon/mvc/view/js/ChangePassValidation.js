function ChangeValidate() {


    const  currpass = document.getElementById("currentpassword").value;
    const  newpass = document.getElementById("newpassword").value;

    const conpass = document.getElementById("confirmpassword").value;

    
    if (currpass === "" || newpass === "" || conpass === "") {
        window.alert(" *Change Password* \n\n Please fill up all fields");
        return false;
    } 

    
    else {
        return true;
    }
}
