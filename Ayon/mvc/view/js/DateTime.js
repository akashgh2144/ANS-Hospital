function DateTime() {
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        document.getElementById('dt').innerHTML = this.responseText;
    }
    xhttp.open("GET", "http://view/Dashboard.php");
    xhttp.send();
}

setInterval(DateTime, 1000);
