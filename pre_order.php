<?php
session_start();
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$country = $_POST['country'];
$language = $_POST['language'];
$edition = $_POST['edition'];
$cname = $_POST['cname'];
$cemail = $_POST['cemail'];
$cphone = $_POST['cphone'];
$caddress = $_POST['caddress'];
$userId = $_SESSION['user_id'];

if($title == ''){
	$_SESSION['msg']= 'Insert the title of the book.<br>';
	header('location:pre_order_form.php');
	exit;
	}
	
if($author == ''){
	$_SESSION['msg']= 'Insert author full name.<br>';
	header('location:pre_order_form.php');
	exit;
	}

if($language == ''){
	$_SESSION['msg']= 'Insert the language of the book.<br>';
	header('location:pre_order_form.php');
	exit;
	}

if($cname == ''){
	$_SESSION['msg']= 'Insert your full name first.<br>';
	header('location:pre_order_form.php');
	exit;
	}	

if($cemail == ""){
	$_SESSION['msg']= 'Insert your email address first.<br>';
	header('location:pre_order_form.php');
	exit;
	}	
if($cphone == ""){
	$_SESSION['msg']= 'Insert your contact number first.<br>';
	header('location:pre_order_form.php');
	exit;
	}
if($caddress == ""){
	$_SESSION['msg']= 'Insert your address first.<br>';
	header('location:pre_order_form.php');
	exit;
	}


	include_once 'database_con.php';
	$conn = connect();
	
	$sql = "INSERT INTO pre_order(Book_Title,Author,Publisher,Country,Language,Edition,Customer_Name,Customer_Email,Customer_Phone,Customer_Address,Member_ID)
			VALUES ('$title','$author','$publisher','$country','$language','$edition','$cname','$cemail','$cphone','$caddress','$userId')";
	
	if($conn->query($sql)){
		$_SESSION['msg']= 'Order submitted successfully. We will contact you as soon as the book arrive.<br>';
		header('location:pre_order_form.php');
	}else{
		$_SESSION['msg']= 'Order not submitted.<br>';
		header('location:pre_order_form.php');
	}





?>