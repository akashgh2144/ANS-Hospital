function UpdateValidate() {



    const fname = document.getElementById("fname").value;

    const lname = document.getElementById("lname").value;

    const uname = document.getElementById("uname").value;



    const gender = document.getElementById("gender").value;

    const email = document.getElementById("email").value;

    const mobile = document.getElementById("mobile").value;

   const area = document.getElementById("area").value;


    const address = document.getElementById("address").value;


   

    if (fname === "" || lname === "" || uname === "" ||  

        gender === "" || email === "" || mobile === "" || area === "" || address === "" ) {

        window.alert("*Update Profile* \n\nPlease fill up all fields");
    
        return false;
    } else {
        return true;
    }
}
