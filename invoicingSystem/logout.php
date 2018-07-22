<?php
include("connection.php");

session_start();

if(isset($_SESSION['userId'])){

session_destroy();

header("location:clientlogin.php");

} else {

	echo "Cannot destroy";
}


//check admin log out
if(isset($_SESSION['adminId'])){

session_destroy();

header("location:adminlogin.php");

} else {

	echo "Cannot destroy";
}
?>