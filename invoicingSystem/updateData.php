<?php
	
	include("connection.php");

	if(isset($_POST['editCustomerButton'])){

		$getNewCustomer = $_POST['getNewCustomer'];

		$customerName = $_POST['customerName'];
		$customerEmail = $_POST['customerEmail'];
		$customerContact = $_POST['customerContact'];
		$customerAddressLine = $_POST['customerAddressLine'];
		$customerCity = $_POST['customerCity'];
		$customerPostal = $_POST['customerPostal'];
		$customerState = $_POST['customerState'];
		$customerCountry = $_POST['customerCountry'];


		$customerUpdate = "UPDATE clientcustomer SET customerName = '$customerName', customerEmail = '$customerEmail', customerContact = '$customerContact', customerAddressLine = '$customerAddressLine', customerCity = '$customerCity', customerPostal = '$customerPostal', customerState = '$customerState', customerCountry = '$customerCountry'WHERE customerId = '$getNewCustomer' ";

		mysqli_query($database, $customerUpdate);


		header("location:clientMaintenance.php");

	} else

	if(isset($_POST['editCustomerCancelBtn'])){

		header("location: clientMaintenance.php");

	} else

	//to update data of product from client maintenance product
	if(isset($_POST['editProductButton'])){

		$getNewProduct = $_POST['getNewProduct'];

		$productName = $_POST['productName'];
		$productPrice =  $_POST['productPrice'];
		$productDescription = $_POST['productDescription'];

		$productUpdate = "UPDATE clientproduct SET productName = '$productName', productPrice = '$productPrice', productDescription = '$productDescription' WHERE productId = '$getNewProduct' ";

		mysqli_query($database, $productUpdate);

		header("location: clientMaintenance.php");
	}else

	if(isset($_POST['editProductCancelBtn'])){

		header("location: clientMaintenance.php");

	}else

	//to update client detail from admin page (just admin can access)
	if(isset($_POST['createClientBtn'])){

		$getNewClient = $_POST['getNewClient'];

		$companyName = $_POST['companyName'];
		$companyEmail =  $_POST['companyEmail'];
		$companyContact = $_POST['companyContact'];
		$companyUsername = $_POST['companyUsername'];
		$companyPassword = $_POST['companyPassword'];

		$companyUpdate = "UPDATE adminmanageclient SET companyName = '$companyName', companyEmail = '$companyEmail', companyContact = '$companyContact', companyUsername = '$companyUsername', companyPassword = '$companyPassword' WHERE clientId = '$getNewClient' ";

		mysqli_query($database, $companyUpdate);

		header("location: adminManage.php");

	} else

	//to update client personal detail from settings
	if(isset($_POST['clientSettingBtn'])){

		$getNewClient = $_POST['clientSettingsGetId'];

		$companyName = $_POST['companyName'];
		$companyEmail =  $_POST['companyEmail'];
		$companyContact = $_POST['companyContact'];
		$companyUsername = $_POST['companyUsername'];
		$companyPassword = $_POST['companyPassword'];

		$companyUpdate = "UPDATE adminmanageclient SET companyName = '$companyName', companyEmail = '$companyEmail', companyContact = '$companyContact', companyUsername = '$companyUsername', companyPassword = '$companyPassword' WHERE clientId = '$getNewClient' ";

		mysqli_query($database, $companyUpdate);

		if(!empty($_FILES['fileToUpload'])){
		$file = $_FILES['fileToUpload'];

		$fileName = $_FILES['fileToUpload']['name'];
		$fileTmpName = $_FILES['fileToUpload']['tmp_name'];
		$fileSize = $_FILES['fileToUpload']['size'];
		$fileError = $_FILES['fileToUpload']['error'];
		$fileType = $_FILES['fileToUpload']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		//which type of image can upload by user
		$allowed = array('jpg', 'jpeg', 'png');

		if(in_array($fileActualExt, $allowed)){

			//to check the file error
			if($fileError === 0){

				//to check the file size
				if($fileSize < 1048576){

					//to create a new file name for the upload image
					$fileNameNew = "profile".$getNewClient.".".$fileActualExt;
					$fileDestination = "uploads/".$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					$sql = "UPDATE images SET uploadStatus = 1 WHERE clientId = '$getNewClient'";
					$result = mysqli_query($database, $sql);

				} else {

					echo "Your file is too big!";
				}

			} else{

				echo "There was an error of uploading your image!";
			}

		} else {

			echo "You cannot upload this type of image!";
		}
	}


		header("location: clientSettings.php");

	} else 

	//if user click cancel, the page will go back to client setting
	if(isset($_POST['clientSettingCancelBtn'])){ 

		header("refresh:1  url:clientSettings.php");

	}

	
?>
