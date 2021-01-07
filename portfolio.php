<?php
session_start();
$title = $_POST['title'];

if($title == ''){
		$_SESSION['msg'] = 'Insert the title of the research.<br>';
		header('location:portfolio_form.php');
		}	
	
//---- File Upload 
	$_SESSION['msg'] = '';
	$target_dir = "img/Portfolio/";
	$fileName = basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir . $fileName;
	
	$uploadOk = 1; // Flag
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$_SESSION['msg'] = "File is not an image.<br>";
			$uploadOk = 0;
		}
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
		$_SESSION['msg'] = "Sorry, file already exists.<br>";
		$uploadOk = 0;
	}
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
		$_SESSION['msg'] = "Sorry, your file is too large.<br>";
		$uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif") {
		$_SESSION['msg'] = "Sorry, only JPG,PNG,GIF and JPEG files are allowed.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$_SESSION['msg'] = "Sorry, your file was not uploaded.";
		header('location:portfolio_form.php');
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
	
	//---- End of File Upload

	include_once 'database_con.php';
	$conn = connect();
	
	$sql = "INSERT INTO portfolio(Title,Image)
			VALUES ('$title','$fileName')";
	
	if($conn->query($sql)){
		$_SESSION['msg'] = 'File added Successfully';
	}else{
		$_SESSION['msg'] = 'Not Added. '.$conn->error;
	}
	header('location:portfolio_form.php');


?>