function searchAdmission() {
    const searchQuery = document.getElementById("search").value.trim();

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (xhttp.status === 200) {
            document.getElementById("searchResult").innerHTML = xhttp.responseText;
        } else {
            alert("Error: Unable to perform search.");
        }
    };

    xhttp.open("POST", "SJ.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const encodedSearchQuery = "search=" + encodeURIComponent(searchQuery);
    xhttp.send(encodedSearchQuery);

    return false;
}