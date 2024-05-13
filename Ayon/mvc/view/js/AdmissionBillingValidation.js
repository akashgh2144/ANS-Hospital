function AdmissionBillValidate() {
    const admissionID = document.getElementById("admission_ID").value;
    const releasedDate = document.getElementById("released_date").value;
    const amount = document.getElementById("amount").value;

    if (admissionID === "" || releasedDate === "" || amount === "") {
        window.alert("**Admission Bill Insert**\n\nPlease fill in all fields.");
        return false;
    } else {
        return true;
    }
}
