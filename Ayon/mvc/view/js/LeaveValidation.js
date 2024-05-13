function LeaveValidate() {
	// body...


	const  comm = document.getElementById("leave").value;
    const  date = document.getElementById("date").value;

    const res = document.getElementById("reason").value;

    
    if (comm  === "" || date === "" || res === "") {
        window.alert("*Submit Leave Application* \n Please fill up all fields");
        return false;
    } else {
        return true;
    }
}