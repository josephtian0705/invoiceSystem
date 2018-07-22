<?php

session_start();

include("connection.php");

$currentAdmin = $_SESSION['adminId'];


if (isset($_POST['createClientBtn'])){

	$companyName = $_POST['companyName'];
	$companyEmail = $_POST['companyEmail'];
	$companyContact = $_POST['companyContact'];
	$companyUsername = $_POST['companyUsername'];
	$companyPassword = $_POST['companyPassword'];

	if(empty($companyName) || empty($companyEmail) || empty($companyName) || empty($companyName) || empty($companyName)){

		header("location:createClientPage.php?signup=empty");
		exit();

	} else 

	if(!filter_var($companyEmail, FILTER_VALIDATE_EMAIL)){

		header("location: createClientPage.php?signup=email&companyName=$companyName&companyUsername=$companyUsername&companyContact=$companyContact");

	}

	 else{

	$insertNewCompanySql = "INSERT INTO adminmanageclient(adminId, companyName, companyEmail, companyContact, companyUsername, companyPassword) VALUES ('$currentAdmin','$companyName', '$companyEmail', '$companyContact', '$companyUsername', '$companyPassword')";

	mysqli_query($database, $insertNewCompanySql);


	$sql = "SELECT * FROM adminmanageclient WHERE companyName = '$companyName'";
	$result = mysqli_query($database, $sql);


	//to set the profile image status as default
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$clientId = $row['clientId'];
			$imageSql = "INSERT INTO images(clientId, uploadStatus) VALUES ('$clientId', 0)";
			mysqli_query($database, $imageSql);

		
		}

	}

	header("location:adminManage.php");

}
	
}


$database->close();

?>