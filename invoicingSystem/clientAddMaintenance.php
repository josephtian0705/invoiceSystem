<?php
session_start();

include("connection.php");

$dateNow = date("Y-m-d");
$currentUser = $_SESSION["userId"];

if (isset($_POST['formDataType']) && $_POST['formDataType'] == "newCustomerForm")
{

	$customerName = $_POST['customerName'];
	$customerEmail = $_POST['customerEmail'];
	$customerContact = $_POST['customerContact'];
	$customerAddress = $_POST['customerAddress'];
	$customerCity = $_POST['customerCity'];
	$customerPostal = $_POST['customerPostal'];
	$customerState = $_POST['customerState'];
	$customerCountry = $_POST['customerCountry'];

	$insertNewCustomerSql = "INSERT INTO clientcustomer(customerName, customerEmail, customerContact, customerAddressLine, customerCity, customerPostal, customerState, customerCountry, clientId) VALUES ('$customerName', '$customerEmail', '$customerContact', '$customerAddress', '$customerCity', '$customerPostal', '$customerState', '$customerCountry', '$currentUser')";

	if ($database->query($insertNewCustomerSql) === TRUE) 

	    echo "db_success";
	else 
	    echo "Error: " . $database->error;

	$database->close(); 
}

else if (isset($_POST['formDataType']) && $_POST['formDataType'] == "newProductForm")
{
	$productName = $_POST['productName'];
	$productPrice = floatval($_POST['productPrice']);
	$productQuantity = intval($_POST['productQuantity']);
	$productDescription = $_POST['productDescription'];

	$insertNewProductSql = "INSERT INTO clientproduct(productName, productQuantity, productPrice, productDescription, clientId) VALUES ('$productName', '$productQuantity', '$productPrice', '$productDescription', '$currentUser');";

	if ($database->query($insertNewProductSql) === TRUE) 
	    echo "db_success";
	else 
	    echo "Error: " . $database->error;

	$database->close(); 
}

else
{
	echo "No data received!";
}


?>