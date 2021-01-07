<?php
session_start();
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$price = $_POST['price'];
$topic = $_POST['topic'];

if($title == ''){
	$_SESSION['msg']= 'Not added.Insert the title of the book.<br>';
	header('location:book_entry_form.php');
	exit;
	}
	
if($author == ''){
	$_SESSION['msg']= 'Not added.Insert author full name.<br>';
	header('location:book_entry_form.php');
	exit;
	}

if($publisher == ''){
	$_SESSION['msg']= 'Not added.Insert publisher name.<br>';
	header('location:book_entry_form.php');
	exit;
	}

if($price == ''){
	$_SESSION['msg']= 'Not added.Insert a price of the book.<br>';
	header('location:book_entry_form.php');
	exit;
	}	

if($topic == "Select"){
	$_SESSION['msg']= 'Not added.Select a book type first.<br>';
	header('location:book_entry_form.php');
	exit;
	}
if(!preg_match("#[0-9]+#",$price)){
	$_SESSION['msg']= 'Not added.Price must be integer.<br>';
	header('location:book_entry_form.php');
	exit;
	}	
	
	//---- Image Upload 
	$_SESSION['msg'] = '';
	$target_dir = "img/Books/";
	$fileName= basename($_FILES["fileToUpload"]["name"]);
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
	if ($_FILES["fileToUpload"]["size"] > 500000000) {
		$_SESSION['msg'] = "Sorry, your file is too large.<br>";
		$uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		$_SESSION['msg'] = "Sorry, only JPG,PNG and JPEG files are allowed.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$_SESSION['msg'] = "Sorry, your file was not uploaded.";
		header('location:book_entry_form.php');
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
	
	//---- End of Image Upload

	include_once 'database_con.php';
	$conn = connect();
	
	$sql = "INSERT INTO book(Book_Title,Author,Publisher,Price,Book_Type,Image)
			VALUES ('$title','$author','$publisher','$price','$topic','$fileName')";
	
	if($conn->query($sql)){
		$_SESSION['msg']= 'Book added successfully.<br>';
		header('location:book_entry_form.php');
	}else{
		$_SESSION['msg']= 'Book not added..<br>';
		header('location:book_entry_form.php');
	}





?>