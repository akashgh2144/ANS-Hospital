function ForgetValidate() {


    const  username = document.getElementById("username").value;
    const  email = document.getElementById("email").value;

    const newpass = document.getElementById("newpassword").value;

    
    if (username === "" || email === "" || newpass === "") {
        window.alert("*Forget Password* \n Please fill up all fields");
        return false;
    } else {
        return true;
    }
}
