<?php
$server="localhost";
$password="";
$fullname="root";
$databasename="mydata";

$data = new mysqli($server, $fullname, $password, $databasename);

if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}
?>
