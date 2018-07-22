<?php
	session_start();
	include("connection.php");

	if(isset($_POST['loginBtn'])){


		$username = $_POST['usersName'];
		$password = $_POST['usersPassword'];


			if (!empty($_POST['usersName']) && !empty($_POST['usersPassword'])) {
			

			$getUsers = "SELECT * FROM adminmanageclient WHERE companyUsername = '$username' AND companyPassword = '$password'";
			$query = mysqli_query($database, $getUsers);
			$row = mysqli_fetch_assoc($query);

			$_SESSION['userId'] = $row['clientId'];


			header("location:clientDashboard.php");

			} 

		}


	//admin login check
	if(isset($_POST['adminLoginBtn'])){

		$adminUsername = $_POST['adminUsername'];
		$adminPassword = $_POST['adminPassword'];

		if(!empty($adminUsername) && !empty($adminPassword)){

			$getAdmin = "SELECT * FROM adminaccount WHERE adminUsername = '$adminUsername' AND adminPassword = '$adminPassword'";

			$adminQuery = mysqli_query($database, $getAdmin);
			$adminRow = mysqli_fetch_assoc($adminQuery);


			$_SESSION['adminId'] = $adminRow['adminId'];

			echo $_SESSION['adminId'];

			header("location: adminDashboard.php");
			


		}

	}


?>