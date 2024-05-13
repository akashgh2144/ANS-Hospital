function RegistrationValidate() {



    const fname = document.getElementById("fname").value;

    const lname = document.getElementById("lname").value;

    const uname = document.getElementById("username").value;

    const password = document.getElementById("password").value;

    const confirmpasssword = document.getElementById("confirmpassword").value;

    const gender = document.getElementById("gender").value;

    const email = document.getElementById("email").value;

    const mobile = document.getElementById("mobile").value;

    const address = document.getElementById("address").value;


   

    if (fname === "" || lname === "" || uname === "" || password === "" || confirmpasssword === "" 

        || gender === "" || email === "" || mobile === "" || address === "" ) {

        window.alert("*Registration* \nPlease fill up all fields");
    
        return false;
    } else {
        return true;
    }
}
