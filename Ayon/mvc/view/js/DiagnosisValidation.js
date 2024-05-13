function DiagnosisValidate() {
    const patientName = document.getElementById("test_patient_name").value;
    const patientAge = document.getElementById("test_patient_age").value;
    const mobileNo = document.getElementById("test_mobile_no").value;
    const doctorRef = document.getElementById("test_doctorRef").value;
    const diagnosis = document.getElementById("diagnosis").value;
    const deliveryDate = document.getElementById("delivery_date").value;
    const fee = document.getElementById("fee").value;

    if (patientName === "" || patientAge === "" || mobileNo === "" || doctorRef === "" || diagnosis === "" || deliveryDate === "" || fee === "") {
        window.alert("**Diagnosis validation**\n\nPlease fill in all fields.");
        return false;
    } else {
        return true;
    }
}
