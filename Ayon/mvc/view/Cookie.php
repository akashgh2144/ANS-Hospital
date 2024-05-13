<?php
// Function to set a cookie
function setLastVisitCookie() {
    $lastVisit = date('Y-m-d H:i:s'); // Current date and time
    setcookie('last_visit', $lastVisit, time() + (30 * 24 * 60 * 60)); // Expires in 30 days
}

// Function to display last visit date
function displayLastVisit() {
    if (isset($_COOKIE['last_visit'])) {
        $lastVisit = $_COOKIE['last_visit'];
        echo 'Your last visit was on: ' . $lastVisit;
    } else {
        echo 'Welcome to the page for the first time!';
    }
}

// Call the function to set the cookie when the page loads
setLastVisitCookie();
?>