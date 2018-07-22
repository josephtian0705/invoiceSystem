<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "invoicingSystem";

$database = mysqli_connect($servername, $username, $password, $dbname);


if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}

?>