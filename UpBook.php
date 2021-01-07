<?php 

session_start();
if($_POST){
	$title      = $_POST['title'];
	$author     = $_POST['author'];
	$publisher  = $_POST['publisher'];
	$price      = $_POST['price'];
	$topic      = $_POST['topic'];
	$bookid      = $_POST['bookid'];
	$qty      = $_POST['qty'];
	

if($topic == "Select"){
	$_SESSION['msg']= 'Not updated.Select a book type first.<br>';
	header("location:update_book.php?bookid='$bookid'");
	exit;
	}

	include_once 'database_con.php';
	$conn = connect();

	$sql = "UPDATE `book` SET `Book_Title`='$title',`Author`='$author',`Publisher`='$publisher',`Price`='$price',`Book_Type`='$topic',`qty`='$qty' WHERE Book_Id=$bookid";

	if($conn->query($sql)){
			$_SESSION['msg']= 'Book details updated successfully.<br>';
			header('location:update_book.php');
	}else{
			$_SESSION['msg']= 'Book details not updated.<br>';
			header('location:update_book.php');
	}

	header('location:update_book.php?bookid='.$bookid);
}
?>