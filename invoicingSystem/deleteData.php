<?php
	
	include("connection.php");

	
	//customer maintenance delete data
	$getCustomerId = $_GET['deleteCustomer'];
	$getProductId = $_GET['deleteProduct'];

	$getClientId = $_GET['deleteClient'];

	if(isset($getCustomerId)){

		$deleteQuery = "DELETE FROM clientcustomer WHERE customerId = '$getCustomerId'";
		mysqli_query($database, $deleteQuery);
		header("location: clientMaintenance.php");

	} else

	//product maintenance delete data
	if(isset($getProductId)){

		$deleteQuery = "DELETE FROM clientproduct WHERE productId = '$getProductId'";
		mysqli_query($database, $deleteQuery);
		header("location: clientMaintenance.php");

	} else

	if(isset($getClientId)){

		$deleteQuery = "DELETE FROM adminmanageclient WHERE clientId = '$getClientId' ";
		mysqli_query($database, $deleteQuery);
		header("location: adminManage.php");

	} else {

		echo "Cannot delete data!";
	}

		
?>