<?php
$host = "localhost";
$username = "root";
$password = "";
$DB = "studect";
$conn =  mysqli_connect($host, $username, $password, $DB);

if (!$conn) {
    die("connect_fall" . mysqli_connect_error());
}

?>