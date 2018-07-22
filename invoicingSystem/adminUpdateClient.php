<?php

include("connection.php");

if(isset($_POST['createClientBtn'])){

		$getNewClient = $_POST['getNewClient'];

		$companyName = $_POST['companyName'];
		$companyEmail =  $_POST['companyEmail'];
		$companyContact = $_POST['companyContact'];
		$companyUsername = $_POST['companyUsername'];
		$companyPassword = $_POST['companyPassword'];

		$companyUpdate = "UPDATE adminmanageclient SET customerName = '$companyName', companyEmail = '$companyEmail', companyContact = '$companyContact', companyUsername = '$companyUsername', companyPassword = '$companyPassword' WHERE clientId = '$getNewClient' ";

		mysqli_query($database, $companyUpdate);

		header("location: adminManage.php");

	}
?>