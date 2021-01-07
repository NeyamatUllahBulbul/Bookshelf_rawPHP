<?php
session_start();
$title = $_POST['title'];
$author = $_POST['author'];

if($title == ''){
	$_SESSION['msg']= 'Insert the title of the book.<br>';
	header('location:doc_input_form.php');
	exit;
}
		
if($author == ''){
	$_SESSION['msg']= 'Insert author full name.<br>';
	header('location:doc_input_form.php');
	exit;
}
			
//---- File Upload 
	$_SESSION['msg'] = '';
	$target_dir = "documents/";
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
	if($imageFileType != pdf  ) {
		$_SESSION['msg'] = "Sorry, only PDF files are allowed.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0){
		$_SESSION['msg']= 'Sorry, your file was not uploaded.<br>';
		header('location:doc_input_form.php');
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
	
	//---- End of File Upload
	
	//---- Image Upload 
	$_SESSION['msg'] = '';
	$target_dir = "documents/image/";
	$fileName1 = basename($_FILES["fileToUpload1"]["name"]);
	$target_file = $target_dir . $fileName1;
	
	$uploadOk = 1; // Flag
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
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
	if ($_FILES["fileToUpload1"]["size"] > 5000000) {
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
		$_SESSION['msg']= 'Sorry, your file was not uploaded.<br>';
		header('location:doc_input_form.php');
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
	
	//---- End of Image Upload

	include_once 'database_con.php';
	$conn = connect();
	
	$sql = "INSERT INTO free_books(Title,Author,File,Image)
			VALUES ('$title','$author','$fileName','$fileName1')";
	
	if($conn->query($sql)){
		$_SESSION['msg']= 'File added Successfully.<br>';
		header('location:doc_input_form.php');
	}else{
		$_SESSION['msg']= 'File not added.<br>';
		header('location:doc_input_form.php');
	}


?>