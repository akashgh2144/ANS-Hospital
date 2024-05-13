function IsValidate() {
    const x = document.getElementById("username").value;
    const y = document.getElementById("password").value;

    console.log(x);
    console.log(y);

    if (x === "" || y === "") {
        window.alert(" *Login* \nPlease fill up all fields");
        return false;
    } else {
        return true;
    }
}
